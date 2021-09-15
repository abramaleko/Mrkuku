<?php

namespace App\Http\Livewire\App\Admin\Support;

use App\Models\Support;
use App\Models\SupportChat;
use Illuminate\Support\Facades\Auth;


use Livewire\Component;

class AssignedMessages extends Component
{
    public $assignedMessages=[];

    public function mount()
    {
        $messages=Support::where('servitor_id',Auth::user()->id)
        ->orderBy('id','desc')
        ->get();

        foreach ($messages as $message) {
            array_push($this->assignedMessages,$message->chats->last());
        }
    }

    public function render()
    {
        return view('livewire.app.admin.support.assigned-messages');
    }
}
