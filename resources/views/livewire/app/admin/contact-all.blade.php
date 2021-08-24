    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="">
        <div class="mt-5">
            <div class="flex flex-col -mx-4">
                @foreach ($allMessages as $email => $message)
                    <div
                        class="relative flex flex-row items-center p-4 hover:border-l-2 hover:border-red-500 hover:bg-gradient-to-r hover:from-red-100 hover:to-transparent">
                        <div class="absolute top-0 right-0 mt-3 mr-4 text-xs text-gray-500">{{$message->first()->created_at->diffForHumans()}}</div>
                        <div
                            class="flex items-center justify-center flex-shrink-0 w-10 h-10">
                            <img src="https://ui-avatars.com/api/?name={{urlencode($message->first()->name)}} &color=ffffff &background=EC4899" alt="{{$message->first()->name}}" class="font-bold rounded-full">
                        </div>
                        <div class="flex flex-col flex-grow ml-3">
                            <a wire:click="$emitUp('selectMessage',{{$message->first()->id}})"
                               class="cursor-pointer hover:underline">
                                <div class="text-sm font-medium">{{ucfirst($message->first()->name)}}</div>
                            </a>
                            <div class="w-40 text-xs truncate">
                               {{$message->first()->context}}
                            </div>
                        </div>
                        <div class="self-end flex-shrink-0 mb-1 ml-2">
                            <span
                                class="flex items-center justify-center w-5 h-5 text-xs text-white bg-red-500 rounded-full">5</span>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
