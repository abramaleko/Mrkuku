<?php

namespace App\Http\Livewire\App\Admin;

use App\Models\Subscriber as ModelsSubscriber;
use Livewire\Component;

class Subscriber extends Component
{
    public $subscribers;

    public function mount()
    {
        $this->subscribers=ModelsSubscriber::all();
    }
    public function render()
    {
        return view('livewire.app.admin.subscriber');
    }
}
