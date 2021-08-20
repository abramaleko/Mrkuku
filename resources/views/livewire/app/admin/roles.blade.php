    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
<x-slot name="title">
     Roles
</x-slot>

<div class="py-8">
    <div class="sm:px-6 lg:px-8 lg:pb-8">
        <div class="flex flex-wrap mx-8 lg:block">
            <h1 class="pl-6 text-lg font-bold text-gray-700 lg:float-left lg:text-4xl">Manage Roles</h1>
            <a wire:click="openModal"
                class="px-8 py-3 mr-8 font-light tracking-wide text-white bg-gray-800 cursor-pointer lg:float-right hover:bg-gray-600">
                Add Role
            </a>
        </div>
    </div>

    <div class="flex flex-col mt-10">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    S/N
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Role name
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Permissions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($roles as $role)
                            <tr>
                                <td class="px-2 py-4 whitespace-nowrap">
                                    <div class="ml-2">
                                        <div class="text-sm font-medium leading-normal tracking-tight text-gray-900">
                                            {{$loop->iteration}}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-2 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$role->name}}</div>
                                </td>
                                <td class="py-4 text-base font-medium whitespace-nowrap">
                                    <a href="{{route('admin.role.permission',$role->id)}}" class="px-6 text-green-600 hover:text-green-900">View</a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


   <!-- New role model -->
   <x-jet-dialog-modal wire:model="newRoleModal">
    <x-slot name="title">
        {{ __('Add New Role') }}
    </x-slot>

    <x-slot name="content">
        Enter the name of the role you want to create
        <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
           <form autocomplete="off">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="block w-full mt-1" wire:model.defer="roleName" autocomplete="name" />
            <x-jet-input-error for="roleName" class="mt-2" />
           </form>
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('newRoleModal')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-button class="ml-2"
                    wire:click="saveRole"
                    wire:loading.attr="disabled">
            {{ __('Create') }}
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>

</div>
