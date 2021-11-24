    {{-- In work, do what you enjoy. --}}
<x-slot name="title">
    {{ __('Slip Verify') }}
</x-slot>

<div class="container px-6 py-8 mx-auto">
    <div class="flex flex-wrap mt-4 text-lg lg:text-xl ">
        <div class="font-bold text-gray-600">
            Project :
        </div>
        <div class="ml-8 text-gray-600 ">
            {{ $investment->project->name }}
        </div>
    </div>
    <div class="flex flex-wrap mt-4 text-lg lg:text-xl ">
        <div class="font-bold text-gray-600">
            Investor :
        </div>
        <div class="ml-8 text-gray-600 ">
            {{ $investment->user->name }}
        </div>
    </div>
    <div class="flex flex-wrap mt-4 text-lg lg:text-xl ">
        <div class="font-bold text-gray-600">
            Invoice :
        </div>
        <div class="ml-8 text-gray-600 ">
            INV-{{ $investment->invoice->invoice_number }}
        </div>
    </div>
    <div class="flex flex-wrap mt-4 text-lg lg:text-xl ">
        <div class="font-bold text-gray-600">
            Amount :
        </div>
        <div class="ml-8 tracking-wide text-gray-600">
            {{ number_format($investment->amount) }} Tshs
        </div>
    </div>
    @if ($investment->verified)
    <div class="flex flex-wrap mt-4 text-lg lg:text-xl ">
        <div class="font-bold text-gray-600">
            Verified By :
        </div>
        <div class="ml-8 tracking-wide text-gray-600">
            {{$investment->invoice->verifiedByUser->name}}
        </div>
    </div>
    @endif
    @if ($investment->invoice->verification_error)
    <div class="flex flex-wrap mt-4 text-lg lg:text-xl ">
        <div class="font-bold text-gray-600">
            Status :
        </div>
        <div class="ml-8 tracking-wide text-gray-600">
            Declined
        </div>
    </div>
    @endif
    <div class="mt-4 text-lg font-bold text-gray-600 lg:text-xl">
       Payment Slips :
    </div>
    <div class="flex flex-wrap mt-4">
        @foreach ($slips as $slip)
        <div class="">
            <div class="p-8 mr-8 bg-white rounded">
                <svg class="w-6 h-5 text-blue-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                </svg>
            </div>
              <a wire:click="downloadSlip('{{$slip}}')" class="block mt-2 text-base text-blue-500 cursor-pointer hover:text-gray-400">
                Download
              </a>
        </div>

        @endforeach
    </div>

    <div class="mt-8">
        <a  target="_blank" href="{{ route('investor.print-invoice', $investment->id, true) }}"
            class="px-4 py-3 font-light tracking-widest text-white bg-gray-800 rounded lg:px-8 hover:bg-gray-700"
            >
            DOWNLOAD PROFOMA INVOICE
        </a>
    </div>

    <!-- if investment,invoicece is false show and also when there is no verification error.-->
     @if ( (! $investment->verified) && (! $investment->invoice->verified) && ($investment->invoice->verification_error == '')  )
    <div class="flex flex-wrap mt-8">
        <a wire:click="$toggle('verifySlip')"
            class="px-8 py-3 font-light tracking-wide text-white bg-green-500 rounded cursor-pointer hover:bg-green-400">
            VERIFY PAYMENT SLIPS
        </a>
            <a wire:click="$toggle('declineSlip')"
                class="px-8 py-3 mt-4 font-light tracking-widest text-white bg-red-500 rounded cursor-pointer hover:bg-red-400 lg:mt-0 lg:ml-4"
                >
                DECLINE PAYMENT SLIPS
            </a>
    </div>

     @endif


    <!-- confirmation modal-->
    <x-jet-dialog-modal wire:model="verifySlip">
        <x-slot name="title">
            Verifiy Payment Slips
        </x-slot>

        <x-slot name="content">
           To verify the payment slips please enter the date when the payments where made.
            <div class="mt-4">
                <label class="block my-4">
                    <span class="text-lg font-bold text-gray-500">
                        Payment Date :
                    </span>
                    <input type="date" class="block mt-1 mb-2 border-blue-500 rounded-md" wire:model.defer="payment_date"/>
                    @error('payment_date') <span
                            class="block text-sm font-semibold text-red-500">{{ $message }}</span>
                    @enderror
                </label>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('verifySlip')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="VerifySlipFunction" wire:loading.attr="disabled">
                Verify
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>


    <!-- Decline modal -->
    <x-jet-dialog-modal wire:model="declineSlip">
        <x-slot name="title">
            {{ __('Decline payment Slip') }}
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
            <div class="mt-4">
                <label class="block my-4">
                    <textarea class="block w-full mt-1 mb-2 border-blue-500 rounded-md form-textarea" rows="5"
                        placeholder="Enter reasons for declining the payment slips i.e poor quality of the payment slip photos" wire:model.defer="reasonDecline">
                     </textarea>
                    @error('reasonDecline') <span
                            class="block text-sm font-semibold text-red-500">{{ $message }}</span>
                    @enderror
                </label>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('declineSlip')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

                <!-- do not show if there was a previous verification error -->
                @if ($investment->invoice->verification_error == '')
                <x-jet-button class="ml-2" wire:click="declineSlip" wire:loading.attr="disabled">
                    {{ __('Decline') }}
                </x-jet-button>
                @endif

        </x-slot>
    </x-jet-dialog-modal>


</div>
