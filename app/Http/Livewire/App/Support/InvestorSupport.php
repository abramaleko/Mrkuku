<?php

namespace App\Http\Livewire\App\Support;

use App\Events\NewMessage;
use App\Models\Support;
use App\Models\SupportChat;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class InvestorSupport extends Component
{
    public $mountNewIssue=false,$newRequest=false,$issueDetail;

    public $messageInput;
    public $showMessage=false;
    public $investorRequests=[],$support_messages,$request;
    public $WaitingList=false,$WaitingRequests;


    protected $listeners = ['selectMessage'];

    protected $messages = [
        'issueDetail.required' => 'Please fill this field in order to request support from our team',
    ];

    public function mount()
    {
        /*
        check if user has previous issues if true
        show previous issues if not show new issue
        component
        */
        if (Support::where('investor_id',Auth::user()->id)->count() == 0) {
            $this->mountNewIssue=true;
        }

        $this->getWaitingRequests();

    }

    public function getWaitingRequests()
    {
        $this->WaitingRequests=Support::where('investor_id',Auth::user()->id)
        ->where('servitor_id',null)
        ->orderBy('id','desc')
        ->get();
    }

    public function selectMessage(Support $support)
    {
            $this->request=$support;

            $this->getSupportMessages();

            // updates the collection for the message is read
            foreach ($this->support_messages as $message) {
                //if message was not read and if not the author of the message then update
               if ( (! $message->read) && $message->sender_id != Auth::user()->id) {
                   $message->update(['read' => true]);
               }
            }
            $this->emit('ListenForMessage',$this->request->id);

            $this->showMessage=true;
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
        $this->getSupportMessages();

        broadcast(new NewMessage($message))->toOthers();
      }

    }


    public function getSupportMessages()
    {
        $this->support_messages=SupportChat::with('user')->where('support_id',$this->request->id)
            ->get();
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

        unset($this->issueDetail);
        //closes the modal if open
        if ($this->newRequest)
        $this->request=false;

        $this->getWaitingRequests();

        return session()->flash('message', 'We have received your request successfully, Please wait shortly and our team will contact you');

    }

    public function deleteRequest(Support $support)
    {
        $support->delete();

        //updates the table
        $this->getWaitingRequests();

    }

    public function openModal($modal)
    {
        switch ($modal) {
            case '1':
               $this->WaitingList=true;
                break;
                case '2':
                    $this->newRequest=true;
                     break;

        }
    }

    public function closeModal($modal)
    {
        dd($modal);
        switch ($modal) {
            case '1':
               $this->WaitingList=true;
                break;
                case '2':
                    $this->newRequest=true;
                     break;

        }
    }

    public function render()
    {
          //if user does not have the permissions
          if (! auth()->user()->can('live support')) {
            abort(403, 'Unauthorized.');
        }
        return view('livewire.app.support.investor-support');
    }
}
