<?php

namespace App\Http\Livewire\Contact;

use App\Models\Groups;
use Livewire\Component;
use App\Models\Contacts;
use Illuminate\Support\Facades\Auth; // Menggunakan library Auth

class Addcontact extends Component
{
    // Data yang di simpan
    public $user_id;
    public $group_id;
    public $name;
    public $address;
    public $phone;

    // proses validasi data untuk menambah data
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'group_id' => 'required',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ],[
            'group_id.required' => 'Data group wajib di isi',
            'name.required' => 'Data name wajib di isi',
            'address.required' => 'Data address wajib di isi',
            'phone.required' => 'Data phone wajib di isi',
        ]);
    }

    public function AddContact()
    {
        // proses validasi data untuk menambah data
        $this->validate([
            'group_id' => 'required',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ],[
            'group_id.required' => 'Data group wajib di isi',
            'name.required' => 'Data name wajib di isi',
            'address.required' => 'Data address wajib di isi',
            'phone.required' => 'Data phone wajib di isi',
        ]);

        $contact = new Contacts();
        $contact->user_id = Auth::guard('web')->user()->id;
        $contact->group_id = $this->group_id;
        $contact->name = $this->name;
        $contact->address = $this->address;
        $contact->phone = $this->phone;

        $contact->save();

        return redirect()->route('user.contact')->with('success','Data contact berhasil ditambahkan');
    }

    public function render()
    {
        $groups = Groups::where('user_id', auth()->user()->id)->get();

        return view('livewire.contact.addcontact',['groups'=>$groups])->layout('layouts.base');
    }
}
