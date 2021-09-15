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
            $this->contact=Contact::select('name','email','phone_no')->where('id',$id)->first();

            $this->messages=Contact::where('name',$this->contact->name)
                                     ->where('email',$this->contact->email)
                                     ->get();

            //updates the collection for the message is read
            foreach ($this->messages as $message) {
                //if message was not read
               if ( ! $message->read) {
                   $message->update(['read' => true]);
               }
            }

            //updates the unread count
            $this->getUnreadCount();

            $this->showMessage=true;
    }

    protected function getUnreadCount()
    {
       $this->unreadCount=Contact::where('read',false)->count();

    }

    public function render()
    {
         //if user does not have the permissions
         if (! auth()->user()->can('manage contacts')) {
            abort(403, 'Unauthorized.');
        }
        return view('livewire.app.admin.contacts');
    }
}
