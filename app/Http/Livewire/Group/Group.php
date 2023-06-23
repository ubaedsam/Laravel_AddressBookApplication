<?php

namespace App\Http\Livewire\Group;

use App\Models\Groups;
use Livewire\Component;
use Livewire\WithPagination;

class Group extends Component
{
    public $search;

    public function hapusGroup($id)
    {
        $group = Groups::find($id);
        $group->delete();
        return redirect()->route('user.group')->with('success','Data grup berhasil di hapus');
    }

    // public function updatingSearch()
    // {
    //     $this->resetPage();
    // }

    public function render()
    {
        return view('livewire.group.group',[
            'groups' => Groups::where('user_id', auth()->user()->id)
            ->search(trim($this->search))
            ->paginate(5)
        ])->layout('layouts.base');
    }
}
