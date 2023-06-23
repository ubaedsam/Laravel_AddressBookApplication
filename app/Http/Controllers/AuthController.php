<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VerifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password'
        ]);

        if($validator->fails())
        {
            return response()->json(['status_code'=> 400, 'message'=>'Bad Request']);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $last_id = $user->id;
        $token = $last_id.hash('sha256', Str::random(120));
        $verifyURL = route('user.verify',['token'=>$token,'service'=>'Email_verification']);
        VerifyUser::create([
            'user_id' => $last_id,
            'token' => $token,
        ]);

        $nama = 'Dear <b>'.$request->name.'</b>';
        $message = 'Terima kasih telah registrasi akun, silahkan verifikasi alamat email anda untuk melengkapi konfigurasi aktivasi data akun anda.';

        $mail_data = [
            'recipent'=>$request->email,
            'fromEmail'=>$request->email,
            'fromName'=>$request->email,
            'name'=>$nama,
            'subject'=>'Verifikasi Email',
            'body'=>$message,
            'actionLink'=>$verifyURL,
        ];

        Mail::send('email-template', $mail_data, function($message) use ($mail_data){
            $message->to($mail_data['recipent'])
            ->from($mail_data['fromEmail'], $mail_data['fromName'])
            ->subject($mail_data['subject']);
        });

        return response()->json([
            'status_code' => 200,
            'message' => 'Regristrasi berhasil, Anda harus verifikasi akun terlebih dahulu. kami telah mengirimkan pesan link aktivasi akun anda, tolong cek email anda.'
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:5|max:30'
        ]);

        if($validator->fails())
        {
            return response()->json(['status_code'=> 400, 'message'=>'Bad Request']);
        }

        $credentials = request(['email','password']);

        if(!Auth::attempt($credentials))
        {
            return response()->json([
                'status_code' => 500,
                'message' => 'Gagal Login'
            ]);
        }

        $user = User::where('email',$request->email)->first();

        $tokenResult = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'status_code' => 200,
            'token' => $tokenResult
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status_code' => 200,
            'message' => 'Token berhasil dihapus'
        ]);
    }
}
