<?php

namespace App\Http\Livewire\App\Admin;


use Livewire\Component;
use Spatie\Permission\Models\Role;


class Roles extends Component
{
    public $roles,$newRoleModal,$roleName;

    public function mount()
    {
        $this->roles=Role::all();
    }

    protected $rules = [
        'roleName' => 'required|string',
    ];


    public function openModal()
    {
      $this->newRoleModal=true;
    }

    public function saveRole()
    {
      //validates the input
       $this->validate();

       //creates the role after validation
       Role::create(['name' => $this->roleName]);

       //updates the role value
       $this->roles=Role::all();

      //closes the modal
       $this->newRoleModal=false;

    }

    public function render()
    {
        //if user does not have the permissions
        if (! auth()->user()->can('manage auth')) {
            abort(403, 'Unauthorized.');
        }

        return view('livewire.app.admin.roles');
    }
}
