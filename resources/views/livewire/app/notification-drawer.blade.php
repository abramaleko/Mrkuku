<div class="container mx-auto">
    <!--alerts-->
    @if (session()->has('success') || session()->has('deleted'))
        <div
            class="flex items-center w-4/5 px-6 py-4 mx-2 mt-4 text-base alert  rounded-md xl:w-2/4 {{ session('success') ? 'bg-green-200' : 'bg-red-200' }}">
            @if (session('success'))
                <svg viewBox="0 0 24 24" class="w-5 h-5 mr-3 text-green-600 sm:w-5 sm:h-5">
                    <path fill="currentColor"
                        d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
                    </path>
                </svg>
            @else
                <svg viewBox="0 0 24 24" class="w-5 h-5 mr-3 text-red-600 sm:w-5 sm:h-5">
                    <path fill="currentColor"
                        d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
                    </path>
                </svg>
            @endif
            <span class=" {{ session('success') ? 'text-green-800' : 'text-red-800' }}">
                {{ session('success') ?? session('deleted') }} </span>
        </div>
    @endif
    <div class="px-6 py-8 ">
        <h1 class="text-2xl font-bold tracking-wide text-gray-700 lg:text-3xl lg:py-0 lg:pl-4">Notifications</h1>

        <button wire:click="markAllAsRead" class="px-6 py-2 mt-4 text-white bg-green-500 rounded-md lg:mt-8 hover:bg-green-600">
            Mark All As Read
        </button>

        <!-- notification drawer-->
        <div class="w-full max-w-4xl px-4 py-4 mt-3 bg-white border rounded-md shadow-lg ">
            @foreach ($notifications as $notification)
                <!--notifications-->
                @if ($notification->type == 'App\Notifications\AddPhoneNumber')
                    <div class="flex m-8 mx-auto notification-box">
                        <div class="pr-2">
                            @if (!$notification->read_at)
                                <div class="w-2 h-2 mr-2 bg-blue-500 rounded-full"></div>
                            @endif
                            <img class="w-16 h-6 rounded-full lg:h-9 lg:w-10 "
                                src="{{ asset('images/icons/phone.png') }}" alt="avatar">

                        </div>
                        <div class="pr-8 text-sm md:text-base lg:w-10/12">
                            <span class="text-left ">
                                For more better services from us please register your phone number
                                <a href="" wire:click.prevent='redirectTo({{$notification}},1)'  class="text-green-500 hover:underline">here.</a>
                            </span>

                            <span class="block pt-2 text-xs font-semibold text-left text-gray-400">
                                {{ $notification->created_at->diffForHumans() }}
                            </span>

                        </div>
                        <div>
                            <a href="" wire:click.prevent="deleteNotification({{ $notification }})">
                                <span>
                                    <svg class="text-gray-600 fill-current w-7 h-7 lg:h-10 lg:w-10"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path class="heroicon-ui"
                                            d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                @endif

                @if ($notification->type == 'App\Notifications\ContractSigning')
                    <div class="flex m-8 mx-auto notification-box">
                        <div class="pr-2">
                            @if (!$notification->read_at)
                                <div class="w-2 h-2 mr-2 bg-blue-500 rounded-full"></div>
                            @endif
                            <img class="w-16 h-6 rounded-full lg:h-9 lg:w-10 "
                                src="{{ asset('images/icons/contract.png') }}" alt="avatar">

                        </div>
                        <div class="pr-8 text-sm lg:w-10/12 md:text-base">
                            <span class="text-left ">
                                You're payment slips have been approved and contract is ready for you to sign
                                <a href="" wire:click.prevent='redirectTo({{$notification}},2)'  class="text-green-500 hover:underline">click here to proceed.</a>
                            </span>

                            <span class="block pt-2 text-xs font-semibold text-left text-gray-400">
                                {{ $notification->created_at->diffForHumans() }}
                            </span>

                        </div>
                        <div>
                            <a href="" wire:click.prevent="deleteNotification({{ $notification }})">
                                <span>
                                    <svg class="text-gray-600 fill-current w-7 h-7 lg:h-10 lg:w-10"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path class="heroicon-ui"
                                            d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                @endif

                @if ($notification->type == 'App\Notifications\slipsDeclined')
                    <div class="flex m-8 mx-auto notification-box">
                        <div class="pr-2">
                            @if (!$notification->read_at)
                                <div class="w-2 h-2 mr-2 bg-blue-500 rounded-full"></div>
                            @endif
                            <img class="w-16 h-6 rounded-full lg:h-9 lg:w-10 "
                                src="{{ asset('images/icons/reject.png') }}" alt="avatar">

                        </div>
                        <div class="pr-8 text-sm lg:w-10/12 md:text-base">
                            <span class="text-left ">
                                Sorry, you're payment slips have been declined for more information please
                                <a href="" wire:click.prevent='redirectTo({{$notification}},3)'  class="text-green-500 hover:underline">click here.</a>
                            </span>

                            <span class="block pt-2 text-xs font-semibold text-left text-gray-400">
                                {{ $notification->created_at->diffForHumans() }}
                            </span>

                        </div>
                        <div>
                            <a href="" wire:click.prevent="deleteNotification({{ $notification }})">
                                <span>
                                    <svg class="text-gray-600 fill-current w-7 h-7 lg:h-10 lg:w-10"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path class="heroicon-ui"
                                            d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                @endif


                <div class="border border-b border-gray-400 border-dashed">
                </div>
            @endforeach
            <div class="mt-4">
                {{ $notifications->links() }}
            </div>
        </div>


    </div>
</div>

<x-slot name="scripts">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
            $(".alert").delay(3000).slideUp(300);   //for marked all notification

            //for inside livewire state
            Livewire.on('showNotification',()=> {
                $(".alert").delay(3000).slideUp(300);
});

    </script>
</x-slot>
