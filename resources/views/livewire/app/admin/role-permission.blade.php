    {{-- In work, do what you enjoy. --}}
    <x-slot name="title">
        Permissions by role
   </x-slot>

  <div class="pt-8 mx-4">
      <h1 class="text-xl font-bold tracking-wide text-gray-700 lg:text-3xl">Permissions assigned</h1>
    <div class="grid grid-cols-1 gap-3 mt-4 mb-8 lg:mt-8 lg:grid-cols-3">

        @foreach ($permissions as $permission)
        <div class="text-base lg:text-xl">
            <label class="inline-flex items-center">
                <input type="checkbox" class="form-checkbox" value="{{$permission->name}}" wire:model="selectedPermissions"
                @foreach ($assignedPermissions as $assignedPermission)
                {{ $permission->id == $assignedPermission->id ? 'checked' : ''}}
                @endforeach
                 >
                <span class="ml-2 capitalize">{{$permission->name}}</span>
              </label>
         </div>
        @endforeach
       </div>
       <a wire:click="savePermissions" class="px-6 py-2 text-white bg-blue-600 cursor-pointer hover:bg-blue-400">Save</a>

  </div>

