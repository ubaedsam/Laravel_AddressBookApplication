<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContactResource;
use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contacts::where('user_id', auth()->user()->id)->paginate(100);

        return ContactResource::collection($contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $contact = new Contacts();
        $contact->user_id = $user_id;
        $contact->group_id = $request->group_id;
        $contact->name = $request->name;
        $contact->address = $request->address;
        $contact->phone = $request->phone;
        if($contact->save())
        {
            return new ContactResource($contact);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contacts::findOrFail($id);
        return new ContactResource($contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacts $contacts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $contact = Contacts::findOrFail($id);
        $contact->user_id = $user_id;
        $contact->group_id = $request->group_id;
        $contact->name = $request->name;
        $contact->address = $request->address;
        $contact->phone = $request->phone;
        if($contact->save())
        {
            return new ContactResource($contact);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contacts::findOrFail($id);
        if($contact->delete())
        {
            return new ContactResource($contact);
        }
    }

    public function filter($data)
    {
        return Contacts::where([["name","like","%".$data."%"],['user_id', auth()->user()->id]])
        ->orWhere([["address","like","%".$data."%"],['user_id', auth()->user()->id]])
        ->orWhere([["phone","like","%".$data."%"],['user_id', auth()->user()->id]])
        ->orWhere([["group_id","like","%".$data."%"],['user_id', auth()->user()->id]])
        ->get();
    }

    public function list(Request $request)
    {
        $blog_query = Contacts::with('group');
        if($request->keyword){
            $blog_query->where([['name','LIKE','%'.$request->keyword.'%'],['user_id', auth()->user()->id]]);
        }

        if($request->group){
            $blog_query->whereHas('group',function($query) use($request){
                $query->where([['group',$request->group],['user_id', auth()->user()->id]]);
            });
        }

        $blogs = $blog_query->get();

        return response()->json([
            'message' => 'contact berhasil ditampilkan',
            'data' => $blogs
        ], 200);
    }
}
