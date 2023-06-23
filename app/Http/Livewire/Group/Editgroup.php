<?php

namespace App\Http\Livewire\Group;

use App\Models\Groups;
use Livewire\Component;
use Illuminate\Support\Facades\Auth; // Menggunakan library Auth

class Editgroup extends Component
{
    // Data yang di simpan
    public $user_id;
    public $group;
    public $group_id;

    public function mount($group_id)
    {
        $group = Groups::find($group_id);
        $group->user_id = Auth::guard('web')->user()->id;
        $this->group = $group->group;
        $this->group_id = $group->id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'group' => 'required',
        ],[
            'group.required' => 'Data group wajib di isi',
        ]);
    }

    public function ubahGroup()
    {
        // proses validasi data untuk menambah data
        $this->validate([
            'group' => 'required',
        ],[
            'group.required' => 'Data group wajib di isi',
        ]);

        $group = Groups::find($this->group_id);
        $group->user_id = Auth::guard('web')->user()->id;
        $group->group = $this->group;
        $group->save();

        return redirect()->route('user.group')->with('success','Data grup berhasil diubah');
    }

    public function render()
    {
        return view('livewire.group.editgroup')->layout('layouts.base');
    }
}
