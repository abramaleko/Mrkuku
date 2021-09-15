    <div class="overflow-y-auto">
        <div class="mt-5">
            <div class="flex flex-col -ml-4">
                @if (count($newMessages) > 0)

                    @foreach ($newMessages as $issue)
                        <a wire:click="$emitUp('selectMessage',{{ $issue->id }})" class="cursor-pointer">
                            <div
                                class="relative flex flex-row items-center p-4 hover:border-l-2 hover:border-red-500 hover:bg-gradient-to-r hover:from-red-100 hover:to-transparent">
                                <div class="flex items-center justify-center flex-shrink-0 w-10 h-10">
                                    <img src="{{ $issue->user->profile_photo_url }}" alt="{{ $issue->user->name }}"
                                        class="w-full h-full font-bold rounded-full">
                                </div>
                                <div class="flex flex-col flex-grow ml-3 mr-12">
                                    <div class="text-sm font-medium">{{ ucfirst($issue->user->name) }}</div>
                                    <div class="w-40 text-xs truncate">
                                        {{ $issue->issue_detail }}
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @else
                    <div
                        class="relative flex flex-row items-center p-4 cursor-pointer hover:border-l-2 hover:border-red-500 hover:bg-gradient-to-r hover:from-red-100 hover:to-transparent">
                        <div class="flex items-center justify-center flex-shrink-0 w-10 h-10 text-indigo-500 bg-indigo-100 rounded-full">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                              </svg>
                        </div>
                        <div class="flex flex-col flex-grow ml-3 mr-12">
                            <div class="text-sm font-medium">No new Messages</div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
