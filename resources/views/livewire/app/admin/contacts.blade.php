    {{-- Success is as dangerous as failure. --}}
    <x-slot name="title">
        Contact messages
    </x-slot>
    <div class="">
        <div class="flex flex-row h-screen antialiased text-gray-800">
            <div class="flex flex-row flex-shrink-0 p-4 bg-gray-100 w-96">
                <div class="flex flex-col w-full h-full py-4 pl-4 pr-4 -mr-4">
                    <div class="flex flex-row items-center">
                        <div class="flex flex-row items-center">
                            <div class="text-xl font-semibold">Messages</div>
                            @if ($unreadCount != 0)
                            <div
                            class="flex items-center justify-center w-5 h-5 ml-2 text-xs font-medium text-white bg-red-500 rounded-full">
                            {{ $unreadCount }}
                        </div>
                            @endif

                        </div>
                        <div class="ml-auto">
                            <button
                                class="flex items-center justify-center text-gray-500 bg-gray-200 rounded-full h-7 w-7">
                                <svg class="w-4 h-4 stroke-current" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="mt-5">
                        <ul class="flex flex-row items-center justify-between">
                            <li>
                                <a href="#"
                                    class="relative flex items-center pb-3 text-xs font-semibold text-indigo-800">
                                    <span>All Conversations</span>
                                    <span class="absolute bottom-0 left-0 w-6 h-1 bg-indigo-800 rounded-full"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center pb-3 text-xs font-semibold text-gray-700">
                                    <span>Investors</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center pb-3 text-xs font-semibold text-gray-700">
                                    <span>Local's</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    @livewire('app.admin.contact-all')
                </div>
            </div>
            {{-- if true mount component --}}
            @if ($showMessage)
            <div
            class="flex flex-col w-full h-full px-4 py-6 bg-white">
                <div class="flex flex-row items-center px-6 py-4 shadow rounded-2xl">
                  <div class="flex items-center justify-center w-10 h-10 ounded-full">
                    <img src="https://ui-avatars.com/api/?name={{urlencode($contact->name)}} &color=ffffff &background=EC4899" alt="{{$contact->name}}" class="font-bold rounded-full">
                  </div>
                  <div class="flex flex-col ml-3">
                    <div class="text-sm font-semibold">{{$contact->name}}</div>
                    <div class="text-xs text-gray-500">{{$contact->email}}</div>
                    <div class="pt-1 text-xs tracking-wide text-gray-500">{{$contact->phone_no}}</div>
                  </div>
                </div>
                <div class="h-full py-4 overflow-hidden">
                  <div class="h-full overflow-y-auto">
                    <div class="grid grid-cols-12 gap-y-2">
                        @foreach ($messages as $message)
                        <div class="col-start-1 col-end-8 p-3 rounded-lg">
                            <div class="flex flex-row items-center">
                              <div
                                  class="flex items-center justify-center flex-shrink-0 w-10 h-10"
                              >
                              <img src="https://ui-avatars.com/api/?name={{urlencode($contact->name)}} &color=ffffff &background=EC4899" alt="{{$contact->name}}" class="font-bold rounded-full">
                              </div>
                              <div
                                  class="relative px-4 py-2 ml-3 text-sm bg-white shadow rounded-xl">

                                <div>
                                    <p>{{$message->context}}</p>
                                </div>
                              </div>
                            </div>
                          </div>

                        @endforeach
                    </div>
                  </div>
                </div>
                {{-- <div class="flex flex-row items-center">
                  <div class="flex flex-row items-center w-full h-12 px-2 border rounded-3xl">
                    <button class="flex items-center justify-center w-10 h-10 ml-1 text-gray-400">
                      <svg class="w-5 h-5"
                           fill="none"
                           stroke="currentColor"
                           viewBox="0 0 24 24"
                           xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"></path>
                      </svg>
                    </button>
                    <div class="w-full">
                      <input type="text"
                             class="flex items-center w-full h-10 text-sm border border-transparent focus:outline-none" placeholder="Type your message....">
                    </div>
                    <div class="flex flex-row">
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
                    </div>
                  </div>
                  <div class="ml-6">
                    <button class="flex items-center justify-center w-10 h-10 text-indigo-800 bg-gray-200 rounded-full hover:bg-gray-300">
                      <svg class="w-5 h-5 -mr-px transform rotate-90"
                           fill="none"
                           stroke="currentColor"
                           viewBox="0 0 24 24"
                           xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                      </svg>
                    </button>
                  </div>
                </div> --}}
              </div>

            @endif

        </div>

    </div>
