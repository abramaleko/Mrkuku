<?php

namespace App\Http\Livewire\App\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Permission;


class Permissions extends Component
{
     public $permissions,$newPermissionModal,$permissionName;

     public function mount()
     {
         $this->permissions=Permission::all();
     }

     protected $rules = [
        'permissionName' => 'required|string',
    ];

     public function openModal()
     {
       $this->newPermissionModal=true;
     }

     public function savePermission()
     {
       //validates the input
        $this->validate();

        //creates the role after validation
        Permission::create(['name' => $this->permissionName]);

        //updates the role value
        $this->permissions=Permission::all();

       //closes the modal
        $this->newPermissionModal=false;

     }

    public function render()
    {
          //if user does not have the permissions
          if (! auth()->user()->can('manage auth')) {
            abort(403, 'Unauthorized.');
        }
        return view('livewire.app.admin.permissions');
    }
}
