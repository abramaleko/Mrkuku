    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="overflow-y-auto">
        <div class="mt-5">
            <div class="flex flex-col -ml-4">
                @foreach ($investorRequests as $issue)
                    <a wire:click="$emitUp('selectMessage',{{ $issue->support_id }})" class="cursor-pointer">
                        <div
                            class="relative flex flex-row items-center p-4 hover:border-l-2 hover:border-red-500 hover:bg-gradient-to-r hover:from-red-100 hover:to-transparent">
                            <div class="flex items-center justify-center flex-shrink-0 w-10 h-10">
                                <img src="{{ $issue->user->profile_photo_url }}"
                                    alt="{{ $issue->user->name }}"
                                    class="w-full h-full font-bold rounded-full">
                            </div>
                            <div class="flex flex-col flex-grow ml-3 mr-12">
                                <div class="text-sm font-medium">
                                    {{ ucfirst($issue->user->name) }}</div>
                                <div class="w-40 text-xs truncate">
                                    @if ($issue->sender_id == Auth::user()->id)
                                        Me:
                                    @endif
                                    {{ $issue->issue_detail }}
                                </div>
                            </div>
                        </div>
                    </a>


                @endforeach
            </div>
        </div>
    </div>
