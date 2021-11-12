{{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}

<x-slot name="title">
    {{ __('Invoice Details') }}
</x-slot>

<div class="container px-6 py-8 mx-auto" x-data="{ showModal1: false }">
    <h1 class="text-2xl font-bold tracking-tighter text-gray-700 lg:text-3xl lg:py-0 lg:tracking-wide">
        Invoice Details
    </h1>

    <div class="flex flex-wrap mt-8 text-lg lg:text-xl ">
        <div class="font-bold text-gray-600">
            Project :
        </div>
        <div class="ml-8 text-gray-600 ">
            {{ $investment->project->name }}
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
    <div class="flex flex-wrap mt-4 text-lg lg:text-xl ">
        <div class="font-bold text-gray-600">
            Date Invoiced :
        </div>
        <div class="ml-3 text-gray-600 lg:ml-8">
            {{ $investment->invoice->created_at->toDayDateTimeString() }}
        </div>
    </div>
    <div class="flex flex-wrap mt-4 text-lg lg:text-xl ">
        <div class="font-bold text-gray-600">
            Phone no:
        </div>
        <div class="ml-8 text-gray-600 ">
            @if (!$investment->user->phone_no)
                <span class="text-sm font-semibold text-red-500 ">Oops, Your phone number is missing please update it
                    <a href="{{ route('profile.show') }}" class="tracking-wide text-red-600 underline">
                        here
                    </a>
                </span>
            @else
                {{ $investment->user->phone_no }}
            @endif
        </div>
    </div>
    <div class="flex flex-wrap mt-4 text-lg lg:text-xl ">
        <div class="font-bold text-gray-600">
            Status:
        </div>
        <div class="ml-8 text-gray-600 ">
            @if ($investment->invoice->verification_attachments == '')
                Payment slips have not been submitted for verification
            @elseif (($investment->invoice->verification_attachments) && ( !$investment->invoice->verified) && ($investment->invoice->verification_error == ''))
                Submitted for verification
            @elseif ($investment->verified)
                 Payment slips verified
            @elseif (($investment->invoice->verification_attachments) && ( !$investment->invoice->verified) &&  ($investment->invoice->verification_error))
                 Payment Slips verification failed, for more details click
                 <a class="text-green-600 cursor-pointer hover:underline" @click="showModal1 = true">
                     here..
                    </a>
            @endif

        </div>
    </div>

    <div class="flex flex-wrap mt-8">
        @if ( ! $investment->verified)
        <a href="{{ route('investor.print-invoice', $investment->id, true) }}"
            class="px-8 py-3 font-light tracking-wide text-white bg-blue-500 rounded hover:bg-blue-400"
            style="width: 20rem;">
            DOWNLOAD PROFOMA INVOICE
        </a>
        @endif
        @if (!$investment->invoice->verification_attachments)
            <a target="_blank" href="{{ route('investor.invoice-submit-paymentslips', $investment->id) }}"
                class="px-8 py-3 mt-4 font-light tracking-widest text-center text-white bg-green-500 rounded hover:bg-green-400 lg:mt-0 lg:ml-4"
                style="width: 20rem;">
                VERIFY PAYMENT
            </a>
        @endif
    </div>

    @if (! $investment->verified)
  <!-- Profoma details -->
  <div class="mt-12">
    <h1 class="text-xl font-bold tracking-tighter text-gray-700 lg:text-2xl lg:py-0 lg:tracking-wide">
        1 : &nbsp; Mr KuKu Farmers Limited Profoma Invoice
    </h1>
    <div class="flex flex-wrap mt-4 text-lg lg:text-xl ">
        <div class="font-semibold text-gray-600">
            Description :
        </div>
        <div class="mt-2 text-gray-600 break-words lg:ml-8 lg:mt-0">
            Farm rearing management fees
        </div>
    </div>
    <div class="flex flex-wrap mt-4 text-lg lg:text-xl ">
        <div class="font-semibold text-gray-600">
            Quantity:
        </div>
        <div class="ml-8 text-gray-600 ">
            {{ number_format($investment->units) }} chicks
        </div>
    </div>
    <div class="flex flex-wrap mt-4 text-lg lg:text-xl ">
        <div class="font-semibold text-gray-600">
            Unit price:
        </div>
        <div class="ml-8 text-gray-600 ">
            800
        </div>
    </div>
    <div class="flex flex-wrap mt-4 text-lg lg:text-xl ">
        <div class="font-semibold text-gray-600">
            Total :
        </div>
        <div class="ml-8 text-gray-600 ">
            {{ number_format($investment->rear_cost) }} Tshs
        </div>
    </div>
    <h1 class="mt-8 text-xl font-semibold text-gray-700 lg:text-2xl lg:py-0 lg:tracking-wide">
        Bank Details
    </h1>
    <div class="flex flex-wrap mt-4 text-lg lg:text-xl ">
        <div class="font-semibold text-gray-600">
            NBC BANK:
        </div>
        <div class="ml-8 tracking-wide text-gray-600">
            011103039843
        </div>
    </div>
    <div class="flex flex-wrap mt-4 text-lg lg:text-xl ">
        <div class="font-semibold text-gray-600">
            AMANA BANK:
        </div>
        <div class="ml-8 tracking-wide text-gray-600">
            003120959810001
        </div>
    </div>
    <h3 class="mt-4 font-serif text-lg font-semibold tracking-wide text-gray-700 lg:text-xl">
        MR KUKU FARMERS LIMITED
    </h3>
</div>

<div class="mt-12">
    <h1 class="text-xl font-bold tracking-tighter text-gray-700 lg:text-2xl lg:py-0 lg:tracking-wide">
        2 : &nbsp; Bravo Feeds Mill Limited Profoma Invoice
    </h1>

    <div class="lg:ml-8">
        <div class="flex flex-wrap mt-4 text-lg lg:text-xl ">
            <div class="font-semibold text-gray-600">
                A)&nbsp; Description :
            </div>
            <div class="ml-3 text-gray-600 break-words lg:ml-8 lg:mt-0">
                Broiler Chicks
            </div>
        </div>

        <div class="flex flex-wrap mt-4 text-lg lg:text-xl ">
            <div class="font-semibold text-gray-600">
                Quantity:
            </div>
            <div class="ml-8 text-gray-600 ">
                {{ number_format($investment->doc_quantity) }}
            </div>
        </div>
        <div class="flex flex-wrap mt-4 text-lg lg:text-xl ">
            <div class="font-semibold text-gray-600">
                Unit price:
            </div>
            <div class="ml-8 text-gray-600 ">
                1,500
            </div>
        </div>
        <div class="flex flex-wrap mt-4 text-lg lg:text-xl ">
            <div class="font-semibold text-gray-600">
                Total :
            </div>
            <div class="ml-8 text-gray-600 ">
                {{ number_format($investment->doc_cost) }} Tshs
            </div>
        </div>
    </div>
    <div class="mt-8 lg:ml-8">
        <div class="flex flex-wrap mt-4 text-lg lg:text-xl ">
            <div class="font-semibold text-gray-600">
                B)&nbsp; Description :
            </div>
            <div class="ml-3 text-gray-600 break-words m lg:ml-8 lg:mt-0">
                Chicken Feeds
            </div>
        </div>

        <div class="flex flex-wrap mt-4 text-lg lg:text-xl ">
            <div class="font-semibold text-gray-600">
                Quantity:
            </div>
            <div class="ml-8 text-gray-600 ">
                {{ number_format($this->investment->units) }}
            </div>
        </div>
        <div class="flex flex-wrap mt-4 text-lg lg:text-xl ">
            <div class="font-semibold text-gray-600">
                Unit price:
            </div>
            <div class="ml-8 text-gray-600 ">
                2,700
            </div>
        </div>
        <div class="flex flex-wrap mt-4 text-lg lg:text-xl ">
            <div class="font-semibold text-gray-600">
                Total :
            </div>
            <div class="ml-8 text-gray-600 ">
                {{ number_format($investment->feed_cost) }} Tshs
            </div>
        </div>
    </div>
    <p class="py-4 text-xl font-extrabold tracking-wide text-gray-700 lg:text-2xl">
        Grand Total - {{ number_format($investment->doc_cost + $investment->feed_cost) }} Tshs
    </p>
    <h1 class="mt-4 text-xl font-semibold text-gray-700 lg:text-2xl lg:py-0 lg:tracking-wide">
        Bank Details
    </h1>
    <div class="flex flex-wrap mt-4 text-lg lg:text-xl ">
        <div class="font-semibold text-gray-600">
            NBC BANK:
        </div>
        <div class="ml-8 tracking-wide text-gray-600">
            011103039855
        </div>
    </div>
    <div class="flex flex-wrap mt-4 text-lg lg:text-xl ">
        <div class="font-semibold text-gray-600">
            AMANA BANK:
        </div>
        <div class="ml-8 tracking-wide text-gray-600">
            003111162140003
        </div>
    </div>
    <h3 class="mt-4 font-serif text-lg font-semibold tracking-wide text-gray-700 lg:text-xl">
        BRAVO FEEDS MILLS LTD
    </h3>
</div>
    @endif


        <!-- Modal1 -->
        <div
        class="fixed inset-0 z-20 w-full h-full overflow-y-auto duration-300 bg-black bg-opacity-50"
        x-show="showModal1"
        x-transition:enter="transition duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
      >
        <div class="relative mx-2 my-10 opacity-100 sm:w-3/4 md:w-1/2 lg:w-1/3 sm:mx-auto">
          <div
            class="relative z-20 text-gray-900 bg-white rounded-md shadow-lg"
            @click.away="showModal1 = false"
            x-show="showModal1"
            x-transition:enter="transition transform duration-300"
            x-transition:enter-start="scale-0"
            x-transition:enter-end="scale-100"
            x-transition:leave="transition transform duration-300"
            x-transition:leave-start="scale-100"
            x-transition:leave-end="scale-0"
          >
            <header class="flex items-center justify-between p-2">
              <h2 class="font-semibold">Reason for decline</h2>
              <button class="p-2 focus:outline-none" @click="showModal1 = false">
                <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                  <path
                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"
                  ></path>
                </svg>
              </button>
            </header>
            <main class="p-2">
              <p>
                 {{$investment->invoice->verification_error}}
              </p>
            </main>
            <footer class="flex justify-center p-2">
              <a href="{{ route('investor.invoice-submit-paymentslips', $investment->id) }}"
                class="p-4 font-semibold tracking-wide text-white transition-all duration-300 bg-green-600 rounded shadow-lg hover:bg-green-700 focus:outline-none focus:ring hover:shadow-none"
                @click="showModal1 = false"
              >
                Resubmit Slips
            </a>
            </footer>
          </div>
        </div>
      </div>
</div>
