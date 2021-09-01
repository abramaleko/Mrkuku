<?php

namespace App\Http\Livewire\App\Admin;

use App\Models\Contact;



use Livewire\Component;

class Contacts extends Component
{

    public $unreadCount, $messages,$contact,$contact_messages;
    public $showMessage=false;

    protected $listeners = ['selectMessage'];

    public function mount()
    {
       $this->getUnreadCount();
    }

    public function selectMessage($id)
    {
            $this->contact=Contact::select('name','email')->where('id',$id)->first();

            $this->messages=Contact::where('name',$this->contact->name)
                                     ->where('email',$this->contact->email)
                                     ->get();

            $this->showMessage=true;
    }

    protected function getUnreadCount()
    {
       $this->unreadCount=Contact::where('read',false)->count();

    }

    public function render()
    {
        return view('livewire.app.admin.contacts');
    }
}
