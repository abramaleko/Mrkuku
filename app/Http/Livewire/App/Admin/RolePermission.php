<?php

namespace App\Http\Livewire\App\Admin;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class RolePermission extends Component
{
    public $assignedPermissions,$permissions,$role_id;
    public $selectedPermissions=[];

    public function mount($id)
     {
         $this->role_id=$id;

        //get the permissions assigned to the role
        $this->assignedPermissions=Role::findById($id)->permissions;

        $this->permissions=Permission::all();
        foreach ($this->assignedPermissions as $permissions) {
           array_push($this->selectedPermissions,$permissions->name);
        }
     }

     public function savePermissions()
     {
         $role=Role::findById($this->role_id);

         //check if role has permission
         $role->syncPermissions($this->selectedPermissions);

         return redirect()->route('admin.roles');

     }

    public function render()
    {
         //if user does not have the permissions
         if (! auth()->user()->can('manage auth')) {
            abort(403, 'Unauthorized.');
        }
        return view('livewire.app.admin.role-permission');
    }
}
