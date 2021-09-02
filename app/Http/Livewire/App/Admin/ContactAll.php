<?php

namespace App\Http\Livewire\App\Admin;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;


use Livewire\Component;

class ContactAll extends Component
{
    public $allMessages;

    public function mount()
    {
        $this->allMessages=Contact::orderBy('id','desc')
        ->get()->groupBy('email','name')
        ->all();

    }

    public function render()
    {
        return view('livewire.app.admin.contact-all');
    }
}
