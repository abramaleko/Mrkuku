<?php

namespace App\Http\Livewire\App\Support;

use Illuminate\Support\Facades\Auth;



use App\Models\Support;


use Livewire\Component;

class NewIssue extends Component
{

    public $issueDetail;

    public function issueRequest()
    {
        $this->validate([
            'issueDetail' => 'required|string'
        ]);

        $setSupport=new Support();
        $setSupport->investor_id=Auth::user()->id;
        $setSupport->issue_detail=$this->issueDetail;
        $setSupport->save();

        return redirect()->route('investor.support');

    }


    public function render()
    {
        return view('livewire.app.support.new-issue');
    }
}
