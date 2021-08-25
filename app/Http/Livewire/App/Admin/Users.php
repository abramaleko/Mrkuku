<?php

namespace App\Http\Livewire\App\Admin;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $users,$user;

    public $showTable=true;

    public function mount()
    {
        $this->users=User::all();
    }

    public function showUser(User $user)
    {
      $this->user=$user;
      $this->showTable="false";
    }

    public function render()
    {
         //if user does not have the permissions
         if (! auth()->user()->can('manage users')) {
            abort(403, 'Unauthorized.');
        }
        
        return view('livewire.app.admin.users');
    }
}
