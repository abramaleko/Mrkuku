<?php

namespace App\Http\Livewire\App\Support;

use App\Models\Support;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class InvWaitingRequest extends Component
{
    public $investorRequests;

    public function mount()
    {
        $this->investorRequests=Support::where('investor_id',Auth::user()->id)
        ->where('servitor_id',null)
        ->orderBy('id','desc')
        ->get();

    }

    public function render()
    {
        return view('livewire.app.support.inv-waiting-request');
    }
}
