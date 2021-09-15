<?php

namespace App\Http\Livewire\App\Admin\Support;

use App\Events\supportMessages;
use Illuminate\Support\Facades\DB;

use App\Models\Support;
use Livewire\Component;

class NewSupportMesage extends Component
{
    public $newMessages;

    public function mount()
    {
        $this->newMessages=Support::with(['user','chats'])->where('servitor_id',null)->orderBy('id', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.app.admin.support.new-support-mesage');
    }
}
