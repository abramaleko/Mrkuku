<?php

namespace App\Http\Livewire\App\Support;

use App\Models\Support;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class SupportAll extends Component
{

    public $investorRequests=[];

    public function mount()
    {
        $messages=Support::where('investor_id',Auth::user()->id)
        ->orderBy('id','desc')
        ->get();
        foreach ($messages as $message) {
            if ($message->chats->last()) {
                array_push($this->investorRequests,$message->chats->last());
            }
        }

    }
    public function render()
    {
        return view('livewire.app.support.support-all');
    }
}
