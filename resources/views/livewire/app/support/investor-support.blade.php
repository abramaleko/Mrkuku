    {{-- Stop trying to control. --}}
    <x-slot name="title">
        Live Support
    </x-slot>

    @if ($mountNewIssue)
        <div class="p-8">
            @if (session()->has('message'))
                <div
                    class="relative flex flex-col py-5 pl-6 pr-8 mb-4 bg-white rounded-md shadow sm:flex-row sm:items-center sm:pr-6">
                    <div class="flex flex-row items-center w-full pb-4 border-b sm:border-b-0 sm:w-auto sm:pb-0">
                        <div class="text-green-500">
                            <svg class="w-6 h-6 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-3 text-sm font-medium">Success</div>
                    </div>
                    <div class="mt-4 text-sm tracking-wide text-gray-500 sm:mt-0 sm:ml-4">{{ session('message') }}
                    </div>
                    <div
                        class="absolute ml-auto text-gray-400 cursor-pointer sm:relative sm:top-auto sm:right-auto right-4 top-4 hover:text-gray-800">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                </div>
            @endif

            <h1 class="text-2xl font-semibold text-gray-700 lg:text-3xl">Hello {{ Auth::user()->name }},</h1>
            <p class="py-4 text-lg leading-relaxed text-gray-600 ">
                Welcome to our live support chat forum, are you having issues 😰 ? Request support just by filling the
                field
                below
                and we will quickly get back to you
            </p>

            <label class="block">
                <span class="text-lg font-bold text-gray-500">
                    Issue detail 💡
                </span>
                <textarea class="block w-full mt-1 mb-2 border-blue-500 rounded-md form-textarea" rows="5"
                    placeholder="Enter what do you want us to help you with" wire:model.defer="issueDetail">
        </textarea>
                @error('issueDetail') <span class="block text-sm font-semibold text-red-500">{{ $message }}</span>
                @enderror
            </label>

            <div class="mt-4">
                <button wire:click="issueRequest"
                    class="px-6 py-3 tracking-wide text-white uppercase bg-blue-700 rounded hover:bg-blue-600">
                    Request
                </button>
            </div>
        </div>
    @else
        <div class="">
    <div class="flex flex-row h-screen antialiased text-gray-800 ">
        <div class="flex flex-row flex-shrink-0 p-4 bg-gray-100 w-96 {{ $showMessage ? 'lg:block hidden' : '' }}">
            <div class="flex flex-col w-full h-full py-4 pl-4 pr-4 -mr-4">
                @if (count($WaitingRequests)> 0)
                <div class="flex flex-row mb-3">
                    <button wire:click="$toggle('WaitingList')"
                        class="flex px-6 py-2 uppercase bg-gray-200 rounded hover:text-white hover:bg-gray-300">
                        <img src="{{ asset('images/waiting-list.png') }}" class="flex w-4 h-4 mt-1 mr-2"
                            alt="waiting list">
                        Waiting List
                    </button>
                </div>
                @endif
                <div class="flex flex-row items-center">
                    <div class="flex flex-row items-center">
                        <div class="text-xl font-semibold">Support Messages</div>
                        {{-- @if ($newMessageCount != 0)
                            <div
                                class="flex items-center justify-center w-5 h-5 ml-2 text-xs font-medium text-white bg-red-500 rounded-full">
                                {{ $newMessageCount }}
                            </div>
                        @endif --}}

                    </div>
                    <div class="ml-auto">
                        <button wire:click="$toggle('newRequest')"
                            class="flex items-center justify-center text-gray-500 bg-gray-200 rounded-full h-7 w-7">
                            <?xml version="1.0" encoding="iso-8859-1"?>
                            <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                                style="enable-background:new 0 0 512 512;" xml:space="preserve" class="w-3 h-3">
                                <g>
                                    <g>
                                        <path
                                            d="M492,236H276V20c0-11.046-8.954-20-20-20c-11.046,0-20,8.954-20,20v216H20c-11.046,0-20,8.954-20,20s8.954,20,20,20h216
                                        v216c0,11.046,8.954,20,20,20s20-8.954,20-20V276h216c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z" />
                                    </g>
                                </g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                            </svg>

                        </button>
                    </div>
                </div>
                @livewire('app.support.support-all')
            </div>
        </div>
        {{-- if true mount component --}}
        @if ($showMessage)
            <div class="flex flex-col w-full h-full px-4 py-6 bg-white">
                <p class="py-4 text-base font-bold text-green-500 md:text-sm lg:hidden">&lt;&lt;
                    <a wire:click="$toggle('showMessage')"
                        class="text-base font-bold text-green-500 no-underline md:text-sm hover:underline">
                        BACK TO MESSAGES
                    </a>
                </p>
                <div class="flex flex-row items-center px-6 py-4 shadow rounded-2xl">
                    <div class="flex items-center justify-center w-10 h-10 ounded-full">
                        <img src="{{ $request->servitor->profile_photo_url }}" alt="{{ $request->servitor->name }}"
                            class="w-full h-full font-bold rounded-full">
                    </div>
                    <div class="flex flex-col ml-3">
                        <div class="text-sm">Customer service :
                            <span class="font-semibold">
                                {{ $request->servitor->name }}</span>
                        </div>
                        <div class="text-xs text-gray-500">{{ $request->servitor->email }}</div>
                        {{-- <div class="pt-1 text-xs tracking-wide text-gray-500">{{ $investorRequest->user->phone_no }}</div> --}}
                    </div>
                    <div class="ml-auto">
                        <ul class="flex flex-row items-center space-x-1">
                            @if ($request->resolved)
                                <li
                                    class="px-2 py-2 text-xs text-white bg-gray-900 cursor-not-allowed lg:text-base lg:py-3 lg:px-6">
                                    RESOLVED</li>
                            @endif

                        </ul>
                    </div>
                </div>
                <div class="h-full py-4 overflow-hidden">
                    <div class="h-full overflow-y-auto">
                        <div class="grid grid-cols-12 gap-y-2">

                            <!-- innitial support request message -->
                            <div class="col-start-1 col-end-12 p-3 rounded-lg lg:col-end-8">
                                <div class="flex flex-row lg:items-center">
                                    <div class="flex items-center justify-center flex-shrink-0 w-10 h-10">
                                        <img src="{{ $request->user->profile_photo_url }}"
                                            alt="{{ $request->user->name }}" class="font-bold rounded-full">
                                    </div>
                                    <div class="relative px-4 py-2 ml-3 text-sm bg-white shadow rounded-xl">

                                        <div>
                                            <p>{{ $request->issue_detail }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach ($support_messages as $message)
                                <!-- Show investor post -->
                                @if ($message->sender_id == $request->investor_id)
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
                                            <div
                                                class="relative px-3 py-2 mr-3 text-sm bg-indigo-100 shadow rounded-xl">
                                                <div>
                                                    <p>{{ $message->context }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @if (!$request->resolved)
                    <div class="flex flex-row items-center">
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
                        <div class="ml-6">
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
        <!-- New role model -->
        <x-jet-dialog-modal wire:model="newRequest">
            <x-slot name="title">
                {{ __('Request Assistance Support') }}
            </x-slot>

            <x-slot name="content">
                @if (session()->has('message'))
                <div
                    class="relative flex flex-col py-5 pl-6 pr-8 mb-4 bg-white rounded-md shadow sm:flex-row sm:items-center sm:pr-6">
                    <div class="flex flex-row items-center w-full pb-4 border-b sm:border-b-0 sm:w-auto sm:pb-0">
                        <div class="text-green-500">
                            <svg class="w-6 h-6 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-3 text-sm font-medium">Success</div>
                    </div>
                    <div class="mt-4 text-sm tracking-wide text-gray-500 sm:mt-0 sm:ml-4">
                        {{ session('message') }}
                    </div>
                    <div
                        class="absolute ml-auto text-gray-400 cursor-pointer sm:relative sm:top-auto sm:right-auto right-4 top-4 hover:text-gray-800">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                </div>
            @endif
                Hey {{ ucfirst(Auth::user()->name) }} are you having issues 😰 ? Request support just by filling the
                field
                below and we will quickly get back to you .
                <div class="mt-4" x-data="{}"
                    x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <label class="block my-4">
                        <span class="text-lg font-bold text-gray-500">
                            Issue detail 💡
                        </span>
                        <textarea class="block w-full mt-1 mb-2 border-blue-500 rounded-md form-textarea" rows="5"
                            placeholder="Enter what do you want us to help you with" wire:model.defer="issueDetail">
                         </textarea>
                        @error('issueDetail') <span
                                class="block text-sm font-semibold text-red-500">{{ $message }}</span>
                        @enderror
                    </label>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('newRequest')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <!-- check for the current page session if the user has already requested-->
                @if (!session()->has('message'))
                    <x-jet-button class="ml-2" wire:click="issueRequest" wire:loading.attr="disabled">
                        {{ __('Request') }}
                    </x-jet-button>
                @endif

            </x-slot>
        </x-jet-dialog-modal>

        <!-- WaitingList model -->
        <x-jet-dialog-modal wire:model="WaitingList">
            <x-slot name="title">
                You'r Request Waiting List
            </x-slot>

            <x-slot name="content">
                {{ ucfirst(Auth::user()->name) }} this is your waiting list queue , which shows the list of request
                which have not yet been assigned to our customer service team .
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col mt-4">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Request
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($WaitingRequests as $request)
                                        <tr>
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-gray-900">
                                                   {{$request->issue_detail}}
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <button wire:click="deleteRequest({{$request->id}})"
                                                    class="inline-flex px-2 py-1 text-xs font-semibold leading-5 text-white bg-red-500 rounded hover:bg-red-400">
                                                    DELETE
                                                  </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('WaitingList')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
            </x-slot>
        </x-jet-dialog-modal>
        </div>
    @endif
