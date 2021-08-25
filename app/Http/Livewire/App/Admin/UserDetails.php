<?php

namespace App\Http\Livewire\App\Admin;
use Spatie\Permission\Models\Role;


use App\Models\User;
use Livewire\Component;

class UserDetails extends Component
{
    public $user,$switchModal=false;
    public $rolesAll,$selectedRole=[];

    public function mount($id)
    {
        $this->user=User::find($id);

        $this->rolesAll=Role::all();

    }

    public function openModal()
    {
       $this->switchModal=true;
    }

    public function saveRole()
    {
        $this->user->syncRoles($this->selectedRole);
        $this->switchModal=false;
        return back();
    }

    public function render()
    {
        //if user does not have the permissions
        if (! auth()->user()->can('manage users')) {
            abort(403, 'Unauthorized.');
        }
        return view('livewire.app.admin.user-details');
    }
}
