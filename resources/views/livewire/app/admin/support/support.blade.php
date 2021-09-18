    {{-- Because she competes with no one, no one can compete with her. --}}
    <x-slot name="title">
        Live Support
    </x-slot>
    <div class="">
        <div class="flex flex-row h-screen antialiased text-gray-800 ">
        <div class=" flex flex-row flex-shrink-0 p-4 bg-gray-100 w-96 {{ $showMessage ? 'lg:block hidden' : '' }}">
        <div class="flex flex-col w-full h-full py-4 pl-4 pr-4 -mr-4">
            <div class="flex flex-row items-center">
                <div class="flex flex-row items-center">
                    <div class="text-xl font-semibold">Support Messages</div>
                    @if ($newMessageCount != 0)
                        <div
                            class="flex items-center justify-center w-5 h-5 ml-2 text-xs font-medium text-white bg-red-500 rounded-full">
                            {{ $newMessageCount }}
                        </div>
                    @endif

                </div>
                <div class="ml-auto">
                    <button class="flex items-center justify-center text-gray-500 bg-gray-200 rounded-full h-7 w-7">
                        <svg class="w-4 h-4 stroke-current" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="mt-5">
                <ul class="flex flex-row items-center justify-between">
                    <li>
                        <a wire:click="$toggle('showNew')"
                            class="relative flex items-center pb-3 text-xs font-semibold text-gray-700 cursor-pointer {{ !$showNew ? 'text-indigo-800 text-base' : '' }}">
                            <span>Assigned</span>
                            @if (!$showNew)
                                <span class="absolute bottom-0 right-0 w-6 h-1 bg-indigo-800 rounded-full"></span>
                            @endif
                        </a>
                    </li>
                    <li>
                        <a wire:click="$toggle('showNew')"
                            class="relative flex items-center pb-3 text-xs font-semibold cursor-pointer {{ $showNew ? 'text-indigo-800 text-base' : '' }}">
                            <span>New Messages</span>
                            @if ($showNew)
                                <span class="absolute bottom-0 left-0 w-6 h-1 bg-indigo-800 rounded-full"></span>
                            @endif
                        </a>
                    </li>
                </ul>
            </div>
            @if (!$showNew)
                @livewire('app.admin.support.assigned-messages')
            @else
                @livewire('app.admin.support.new-support-mesage')
            @endif
        </div>
    </div>
    {{-- if true mount component --}}
    @if ($showMessage)
        <div class="relative flex flex-col w-full h-full px-4 py-6 bg-white">
            <p class="py-4 text-base font-bold text-green-500 md:text-sm lg:hidden">&lt;&lt;
                <a wire:click="$toggle('showMessage')"
                    class="text-base font-bold text-green-500 no-underline md:text-sm hover:underline">
                    BACK TO MESSAGES
                </a>
            </p>
            <div class="flex flex-row items-center px-6 py-4 shadow rounded-2xl">
                <div class="flex items-center justify-center w-10 h-10 rounded-full">
                    <img src="{{ $investorRequest->user->profile_photo_url }}"
                        alt="{{ $investorRequest->user->name }}" class="w-full h-full font-bold rounded-full">
                </div>
                <div class="flex flex-col ml-3">
                    <div class="text-sm font-semibold">{{ $investorRequest->user->name }}</div>
                    <div class="text-xs text-gray-500">{{ $investorRequest->user->email }}</div>
                    <div class="pt-1 text-xs tracking-wide text-gray-500">{{ $investorRequest->user->phone_no }}
                    </div>
                </div>
                <div class="ml-auto">
                    <ul class="flex flex-row items-center ml-4 space-x-1 lg:ml-0">
                        @if ($investorRequest->resolved)
                            <li
                                class="px-2 py-2 text-xs text-white bg-gray-900 cursor-not-allowed lg:text-base lg:py-3 lg:px-6">
                                RESOLVED</li>
                        @else
                            <li>
                                <button wire:click="$toggle('confirmResolve')"
                                    class="px-2 py-1 tracking-tight text-white bg-green-400 rounded lg:py-2 lg:px-4 lg:tracking-wide lg:text-base hover:bg-green-500">
                                    RESOLVE
                                </button>
                            </li>
                        @endif

                    </ul>
                </div>
                <x-jet-confirmation-modal wire:model="confirmResolve">
                    <x-slot name="title">
                        Resolve Issue
                    </x-slot>

                    <x-slot name="content">
                        Are you sure you want to resolve this issue request? Once your resolved, you can no longer respond to this
                        requeest.
                    </x-slot>

                    <x-slot name="footer">
                        <x-jet-secondary-button wire:click="$toggle('confirmResolve')" wire:loading.attr="disabled">
                            Nevermind
                        </x-jet-secondary-button>

                        <x-jet-button class="ml-2" wire:click="resolveIssue" wire:loading.attr="disabled">
                            Resolve
                        </x-jet-button>
                    </x-slot>
                </x-jet-confirmation-modal>
                {{-- <div class="flex justify-end">
                    <button class="px-4 py-2 tracking-wide text-white bg-green-600 hover:bg-green-500">
                       RESOLVE
                    </button>
                </div> --}}
            </div>
            <div class="h-full pt-4 overflow-hidden">
                <div class="h-full overflow-y-auto">
                    <div class="grid grid-cols-12 mb-16 gap-y-2">

                        <!-- innitial support request message -->
                        <div class="col-start-1 col-end-12 p-3 rounded-lg lg:col-end-8">
                            <div class="flex flex-row lg:items-center">
                                <div class="flex items-center justify-center flex-shrink-0 w-10 h-10">
                                    <img src="{{ $investorRequest->user->profile_photo_url }}"
                                        alt="{{ $investorRequest->user->name }}" class="font-bold rounded-full">
                                </div>
                                <div class="relative px-4 py-2 ml-3 text-sm bg-white shadow rounded-xl">

                                    <div>
                                        <p>{{ $investorRequest->issue_detail }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach ($support_messages as $message)
                            <!-- Show investor post -->
                            @if ($message->sender_id == $investorRequest->investor_id)
                                <div class="col-start-1 col-end-12 p-3 rounded-lg lg:col-end-8">
                                    <div class="flex flex-row lg:items-center">
                                        <div class="flex items-center justify-center flex-shrink-0 w-12 h-12">
                                            <img src="{{ $message->user->profile_photo_url }}"
                                                alt="{{ $message->user->name }}"
                                                class="w-full h-full font-bold rounded-full">
                                        </div>
                                        <div class="relative px-3 py-2 ml-3 text-sm bg-white shadow rounded-xl">

                                            <div>
                                                <p>{{ $message->context }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <!-- show servitor messages -->
                                <div class="col-start-6 col-end-13 p-3 rounded-lg">
                                    <div class="flex flex-row-reverse items-center justify-start">
                                        <div class="flex items-center justify-center flex-shrink-0 w-12 h-12">
                                            <img src="{{ $message->user->profile_photo_url }}"
                                                alt="{{ $message->user->name }}"
                                                class="w-full h-full font-bold rounded-full">
                                        </div>
                                        <div class="relative px-3 py-2 mr-3 text-sm bg-indigo-100 shadow rounded-xl">
                                            <div>
                                                <p>{{ $message->context }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    @if (!$investorRequest->resolved)
                        <div class="absolute bottom-0 flex flex-row items-center w-full my-4 bg-white">
                            <div class="flex flex-row items-center w-full h-12 px-2">
                                <div class="w-full">
                                    <input wire:model="messageInput" wire:keydown.enter="sendMessage" type="text"
                                        class="flex items-center w-full text-sm border h-14 focus:outline-none rounded-3xl"
                                        placeholder="Type your message....">
                                </div>
                                <!-- attachments field -->
                                {{-- <div class="flex flex-row">
                        <button class="flex items-center justify-center w-8 h-10 text-gray-400">
                          <svg class="w-5 h-5"
                               fill="none"
                               stroke="currentColor"
                               viewBox="0 0 24 24"
                               xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                          </svg>
                        </button>
                        <button class="flex items-center justify-center w-8 h-10 ml-1 mr-2 text-gray-400">
                          <svg class="w-5 h-5"
                               fill="none"
                               stroke="currentColor"
                               viewBox="0 0 24 24"
                               xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                          </svg>
                        </button>
                      </div> --}}
                            </div>
                            <div class="mr-6">
                                <button wire:click="sendMessage" {{ $messageInput == '' ? 'disabled' : '' }}
                                    class="flex items-center justify-center text-indigo-800 bg-gray-200 rounded-full h-14 w-14 hover:bg-gray-300 {{ $messageInput == '' ? 'disabled:opacity-25' : '' }}">
                                    <svg class="w-6 h-6 -mr-px transform rotate-90" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endif

                </div>

    @endif
    </div>
    </div>
    </div>
    </div>

    <x-slot name="scripts">
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                Livewire.on('ListenForMessage', chatId => {
                    Echo.private(`chat.` + chatId)
                        .listen('NewMessage', (message) => {
                            @this.getSupportMessages()
                            var div = document.getElementById("lastElement");
                            div.scrollIntoView(false)
                        })
                })
            });
        </script>
    </x-slot>
