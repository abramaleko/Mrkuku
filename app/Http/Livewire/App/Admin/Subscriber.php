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
        //if user does not have the permissions
        if (! auth()->user()->can('view subscribers')) {
            abort(403, 'Unauthorized.');
        }
        return view('livewire.app.admin.subscriber');
    }
}
