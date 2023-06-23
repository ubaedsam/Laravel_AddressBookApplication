<?php

namespace App\Http\Livewire\Group;

use App\Models\Groups;
use Livewire\Component;
use Illuminate\Support\Facades\Auth; // Menggunakan library Auth

class Addgroup extends Component
{
    // Data yang di simpan
    public $user_id;
    public $group;

    // proses validasi data untuk menambah data
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'group' => 'required',
        ],[
            'group.required' => 'Data group wajib di isi',
        ]);
    }

    public function AddGroup()
    {
        // proses validasi data untuk menambah data
        $this->validate([
            'group' => 'required',
        ],[
            'group.required' => 'Data group wajib di isi',
        ]);

        $group = new Groups();
        $group->user_id = Auth::guard('web')->user()->id;
        $group->group = $this->group;

        $group->save();

        return redirect()->route('user.group')->with('success','Data grup berhasil ditambahkan');
    }

    public function render()
    {
        return view('livewire.group.addgroup')->layout('layouts.base');
    }
}
