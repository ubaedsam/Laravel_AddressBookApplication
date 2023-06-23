<?php

namespace App\Http\Livewire\Contact;

use App\Models\Groups;
use Livewire\Component;
use App\Models\Contacts;

class Contact extends Component
{
    public $from;
    public $to;

    public $group = null;
    public $perPage = 5;
    public $search;

    public function hapusContact($id)
    {
        $contact = Contacts::find($id);
        $contact->delete();
        return redirect()->route('user.contact')->with('success','Data contact berhasil di hapus');
    }

    public function render()
    {
        $groups = Groups::where('user_id', auth()->user()->id)->get();

        return view('livewire.contact.contact',[
            'groups'=>$groups,
            'contacts'=>Contacts::where('user_id', auth()->user()->id)
            ->when($this->group, function($query){
                $query->where('group_id', $this->group);
            })
            ->search(trim($this->search))
            ->paginate($this->perPage)
            ]
        )->layout('layouts.base');
    }
}
