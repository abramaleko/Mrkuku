<?php

namespace App\Http\Livewire\App\Admin\Support;

use App\Models\Support as ModelsSupport;
use Illuminate\Support\Facades\Auth;

use App\Models\SupportChat;
use Livewire\Component;

class Support extends Component
{
    public $newMessageCount, $messages, $investorRequest, $support_messages;
    public $messageInput;
    public $showMessage = false;
    public $showNew = false;
    public $confirmResolve=false;

    protected $listeners = ['selectMessage','refreshComponent' => '$refresh'];


    public function mount()
    {
        $this->getNewMessageCount();
    }

    public function selectMessage($id)
    {
        $this->investorRequest = ModelsSupport::find($id);

        $this->getSupportMessages();
        //updates the collection for the message is read
        foreach ($this->support_messages as $message) {
            //if message was not read and if not the author of the message then update
           if ( (! $message->read) && $message->sender_id != Auth::user()->id) {
               $message->update(['read' => true]);
           }
        }

        $this->showMessage = true;
    }

    public function sendMessage()
    {
        //if the request has not been assigned to a servitor then assign
        if (!$this->investorRequest->servitor_id) {
            $this->investorRequest->servitor_id = Auth::user()->id;
            $this->investorRequest->save();
        }

        SupportChat::create([
            'support_id' => $this->investorRequest->id,
            'context' => $this->messageInput,
            'sender_id' => Auth::user()->id
        ]);

        /*
        Clears the input and updates the chat messages
        */
        $this->messageInput = '';
        $this->getSupportMessages();
    }

    protected function getNewMessageCount()
    {
        $this->newMessageCount = ModelsSupport::where('servitor_id', null)->count();
    }
    protected function getSupportMessages()
    {
        $this->support_messages = SupportChat::with('user')->where('support_id', $this->investorRequest->id)
            ->get();
    }

    public function resolveIssue()
    {
        $request=ModelsSupport::find($this->support_messages->first()->support_id);
        $request->resolved=true;
        $request->save();

        $this->confirmResolve=false;

        $this->emit('refreshComponent');

    }

    public function render()
    {
        //if user does not have the permissions
        if (!auth()->user()->can('support service')) {
            abort(403, 'Unauthorized.');
        }
        return view('livewire.app.admin.support.support');
    }
}
