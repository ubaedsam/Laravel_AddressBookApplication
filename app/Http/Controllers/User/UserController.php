<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\VerifyUser;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // Sistem Login (Register)
    function create(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password'
        ],[
            'name.required'=>'Nama wajib di isi',
            'email.unique'=>'Email ini sudah tersedia',
            'email.required'=>'Email wajib di isi',
            'password.required'=>'Password wajib di isi',
            'password.min'=>'Isi password minimal 5 kata',
            'password.max'=>'Isi password maksimal 30 kata',
            'cpassword.required'=>'Konfirmasi password wajib di isi',
            'cpassword.min'=>'Isi konfirmasi password minimal 5 kata',
            'cpassword.max'=>'Isi konfirmasi password maksimal 30 kata',
            'cpassword.same'=>'Isi password dan konfirmasi password harus sama',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $save = $user->save();

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

        if( $save ){
            return redirect()->back()->with('success','Anda harus verifikasi akun terlebih dahulu. kami telah mengirimkan pesan link aktivasi akun anda, tolong cek email anda.');
        }else{
            return redirect()->back()->with('fail','Ada data yang error, gagal membuat akun');
        }
    }

    // Sistem Login (verifikasi email setelah register)
    public function verify(Request $request)
    {
        $token = $request->token;
        $verifyUser = VerifyUser::where('token', $token)->first();
        if(!is_null($verifyUser)){
            $user = $verifyUser->user;

            if(!$user->email_verified){
                $verifyUser->user->email_verified = 1; // Jika belum verifikasi maka nilai akan di ubah dari 0 menjadi 1
                $verifyUser->user->save();

                return redirect()->route('user.login')->with('info','Email anda berhasil diverifikasi. Anda bisa login sekarang')->with('verifiedEmail', $user->email);
            }else{
                return redirect()->route('user.login')->with('info','Email anda sudah di verifikasi. Anda bisa login sekarang')->with('verifiedEmail', $user->email);
            }
        }
    }

    // Sistem Login (Login)
    function check(Request $request)
    {
        // Validasi Input
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:5|max:30'
        ],[
            'email.exists'=>'Email ini belum tersedia di tabel user',
            'email.required'=>'Email wajib di isi',
            'password.required'=>'Password wajib di isi',
            'password.min'=>'Isi password minimal 5 kata',
            'password.max'=>'Isi password maksimal 30 kata',
        ]);

        $account = $request->only('email','password');
        if(Auth::guard('web')->attempt($account)){
            return redirect()->route('user.home');
        }else{
            return redirect()->route('user.login')->with('fail','Data akun yang anda masukan salah');
        }
    }

    // Sistem login (Logout)
    function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

    // Sistem login (Forgot Password (Halaman View Forgot Password))
    public function showForgotForm()
    {
        return view('dashboard.user.forgot');
    }

    // Sistem login (Forgot Password (Proses mengirimkan link forgot password))
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:users,email'
        ],[
            'email.exists'=>'Email ini belum terdaftar',
            'email.required'=>'Email wajib di isi',
        ]);

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email'=>$request->email,
            'token'=>$token,
            'created_at'=>Carbon::now(),
        ]);

        $action_link = route('user.reset.password.form',[
            'token'=>$token,
            'email'=>$request->email
        ]);
        $body = "Kami menerima permintaan untuk mengatur ulang kata sandi untuk akun nama aplikasi Anda yang terkait dengan ".$request->email.". Anda dapat mengatur ulang kata sandi Anda dengan mengklik tautan di bawah ini";

        Mail::send('email-forgot',['action_link'=>$action_link,'body'=>$body], function($message) use ($request){
            $message->from('noreply@example.com','Address Book Application');
            $message->to($request->email,'Your Name')->subject('Reset Password');
        });

        return back()->with('success','Kami telah mengirimkan pesan link ke email anda untuk mengatur ulang kata sandi akun anda');
    }

    // Sistem Login (Forgot Password (Halaman mengatur ulang kata sandi))
    public function showResetForm(Request $request, $token = null)
    {
        return view('dashboard.user.reset')->with(['token'=>$token,'email'=>$request->email]);
    }

    // Sistem Login (Forgot Password (Proses mengatur ulang kata sandi))
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:5|max:30|confirmed',
            'password_confirmation'=>'required',
        ],[
            'email.exists'=>'Email ini belum tersedia di tabel user',
            'email.required'=>'Email wajib di isi',
            'password.required'=>'Password wajib di isi',
            'password.min'=>'Isi password minimal 5 kata',
            'password.max'=>'Isi password maksimal 30 kata',
            'password_confirmation.required'=>'Password konfirmasi wajib di isi',
        ]);

        $check_token = DB::table('password_resets')->where([
            'email'=>$request->email,
            'token'=>$request->token,
        ])->first();

        if(!$check_token){
            return back()->withInput()->with('fail','Token salah');
        }else{

            User::where('email', $request->email)->update([
                'password'=>Hash::make($request->password)
            ]);

            DB::table('password_resets')->where([
                'email'=>$request->email
            ])->delete();

            return redirect()->route('user.login')->with('info','Password anda berhasil di ubah! Anda bisa login dengan password baru')->with('verifiedEmail', $request->email);
        }
    }
}
