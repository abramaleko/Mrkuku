<x-slot name=title>
    {{$user->name}} Details
</x-slot>

<div>
    <div class="flex items-center justify-center min-h-screen px-4">

        <div class="w-full max-w-4xl bg-white rounded-lg shadow-xl">
            <div class="flex flex-wrap p-4 border-b">
                <div class="">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <img class="object-cover w-full h-full rounded-full" src="{{ $user->profile_photo_url }}"
                        alt="{{ $user->name }}">
                @endif
                </div>
                <div class="ml-4">
                    <h2 class="my-4 text-2xl">
                        User Information
                    </h2>
                </div>
            </div>
            <div>
                <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                    <p class="text-gray-600">
                        Full name
                    </p>
                    <p>
                        {{$user->name}}
                    </p>
                </div>
                <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                    <p class="text-gray-600">
                        Email Address
                    </p>
                    <p>
                        {{$user->email}}
                    </p>
                </div>
                <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                    <p class="text-gray-600">
                        Phone no
                    </p>
                    <p>
                        {{$user->phone_no}}
                    </p>
                </div>
                <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                    <p class="text-gray-600">
                        Roles
                    </p>
                    <p>
                        @foreach ($user->getRoleNames() as $roles)
                            {{$roles}},
                        @endforeach
                        <span wire:click="openModal" class="block mt-4 text-sm text-green-500 cursor-pointer hover:underline">
                            Switch roles
                        </span>
                    </p>
                </div>
                <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                    <p class="text-gray-600">
                        Permissions
                    </p>
                    <p>
                        @foreach ($user->getAllPermissions() as $permission)
                          {{$permission->name}},
                       @endforeach
                       {{-- <span class="block mt-4 text-sm text-green-500 cursor-pointer hover:underline">
                        manage permission
                    </span> --}}
                    </p>
                </div>
                <div class="p-4 space-y-1 border-b md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0">
                    <p class="text-gray-600">
                        Registered on
                    </p>
                    <p>
                       {{$user->created_at->toDayDateTimeString()}}
                    </p>
                </div>
            </div>
        </div>
    </div>

      <!-- manage roles model -->
   <x-jet-dialog-modal wire:model="switchModal">
    <x-slot name="title">
        Change role for {{$user->name}}
    </x-slot>

    <x-slot name="content">

        <div class="block">
            <div class="mt-2">
                @foreach ($rolesAll as $role)
                <div>
                    <label class="inline-flex items-center">
                      <input type="radio" class="w-4 h-4 form-radio" name="radio-sizes" value="{{$role->name}}"
                      wire:model="selectedRole"
                      @foreach ($user->getRoleNames() as $assignedRole)
                      {{ $role->name == $assignedRole ? 'checked' : ''}}
                      @endforeach
                       >
                      <span class="ml-2">{{$role->name}}</span>
                    </label>
                  </div>
                @endforeach
            </div>
          </div>
    </x-slot>
    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('switchModal')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-button class="ml-2"
                    wire:click="saveRole"
                    wire:loading.attr="disabled">
            {{ __('Update') }}
        </x-jet-button>
    </x-slot>
   </x-jet-dialog-modal>
</div>

