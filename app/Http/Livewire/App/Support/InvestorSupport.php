<?php

namespace App\Http\Livewire\App\Support;

use App\Events\NewMessage;
use App\Models\Support;
use App\Models\SupportChat;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class InvestorSupport extends Component
{

    public $issueRequests,$support_messages;

    //chats properties
    public $showChats = false,$request,$messageInput;

    //modals
    public $newRequest=false,$issueDetail;

    public $waitingList=false,$waitingRequests;

    public function mount()
    {
        //load issue request which are already allocated
        $this->issueRequests = Support::with('chats')
            ->where('investor_id', Auth::user()->id)
            ->where('servitor_id', '!=', null)
            ->orderBy('id', 'desc')
            ->get();

            $this->getWaitingRequests();
    }


    //this are issue requests which has not yet been assigned to servitor
    public function getWaitingRequests()
    {
        $this->waitingRequests=Support::where('investor_id',Auth::user()->id)
        ->where('servitor_id',null)
        ->orderBy('id','desc')
        ->get();
    }
    public function deleteRequest(Support $support)
    {
        $support->delete();

        //updates the table
        $this->getWaitingRequests();

        $this->reset('waitingList');

    }

    public function selectedChat(Support $support)
    {
        $this->request=$support;

        $this->getSupportMessagesProperty();

        //listens for new message in a broadcasting channel
        $this->emit('ListenForMessage',$this->request->id);

        //show chats
        $this->showChats = true;

    }

    //returns the chats for a particular issue request
    public function getSupportMessagesProperty()
    {
        return $this->support_messages=SupportChat::with('user')
        ->where('support_id',$this->request->id)
        ->get();
    }

    public function sendMessage()
    {
        //there is messageInput
      if ($this->messageInput !== '')
      {
        $message=SupportChat::create([
            'support_id' => $this->request->id,
            'context' => $this->messageInput,
            'sender_id' => Auth::user()->id
        ]);

        /*
        Clears the input and updates the chat messages
        */
        $this->messageInput= '';
        $this->getSupportMessagesProperty();

        //broadcasts to other users in the current channel
        broadcast(new NewMessage($message))->toOthers();
      }

    }

    public function issueRequest()
    {
        $this->validate([
            'issueDetail' => 'required|string'
        ]);

        $setSupport=new Support();
        $setSupport->investor_id=Auth::user()->id;
        $setSupport->issue_detail=$this->issueDetail;
        $setSupport->save();

        $this->reset(['issueDetail']);

        $this->getWaitingRequests();

        return session()->flash('message', 'We have received your request successfully, Please wait shortly and our team will contact you');

    }


    public function render()
    {
        //if user does not have the permissions
        if (!auth()->user()->can('live support')) {
            abort(403, 'Unauthorized.');
        }
        return view('livewire.app.support.investor-support');
    }
}
