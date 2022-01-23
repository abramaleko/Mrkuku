<div class="mt-4">
    <label class="text-lg font-bold tracking-tight text-gray-600" for="chicks">
        Enter how many acres do you wish to invest
    </label>
    <div class="flex mt-4">
        <input type="number" id="chicks" class="block rounded form-input disabled:cursor-not-allowed" wire:model="acres" {{{$calculatedAmount ? 'disabled' : ''}}}>
        <button wire:click="resetAcres"
            class="px-4 py-2 ml-4 tracking-wide text-white bg-red-500 rounded hover:bg-red-400">RESET</button>
    </div>
    @if ($acres <= 0)
    <span class="block pt-1 text-sm font-semibold text-red-500"> ❌ The minimum number of acres to invest is 1 acre</span>
    @endif

    <div class="flex flex-wrap mt-4">
        <button wire:click=calculateAmount
        {{ $acres <= 0 ? 'disabled' : '' }}
        class="px-6 py-2 tracking-wide text-white bg-blue-500 rounded hover:bg-blue-400 {{ $acres <= 0 ? 'disabled:opacity-25' : '' }}">
            CALCULATE
        </button>
        @can('view investments')
        <button wire:click="addToInvestment"
        {{ $calculatedAmount ? '' : 'disabled' }}
            class="px-6 py-2 mt-4 tracking-wide text-white bg-green-500 rounded lg:ml-8 hover:bg-green-400 lg:mt-0 {{ $calculatedAmount ? '' : 'disabled:opacity-25' }}">
            ADD TO MY INVESTMENTS
        </button>
        @endcan
    </div>

    @if ($calculatedAmount)
    <div class="mt-8 text-gray-700">
        <h3 class="pb-4 text-lg font-bold lg:text-xl">
            Capital Required Breakdown For {{$acres}} Acres (Tshs)
        </h3>
        <ol class="text-base list-disc list-inside lg:text-lg">
            <li class="py-2">
              <b>  Farm rent </b> -- {{number_format($farm_rent)}}
            </li>
            <li class="py-2">
              <b>  Farm Inputs (i.e Manure,Seeds)  </b> -- {{number_format($farm_inputs)}}
            </li>
            <li class="py-2">
              <b> Farm Supervision </b>  -- {{number_format($supervision)}}
            </li>
        </ol>
        <p class="pt-4 text-lg font-bold tracking-wide lg:text-xl">
            Total Capital : {{number_format($grand_total)}} Tshs
        </p>
    </div>

    <div class="mt-8 text-gray-700">
        <h3 class="pb-4 text-xl font-extrabold">
            RETURN ON INVESTMENT (RIO)
        </h3>
        <ol class="text-base text-left list-disc list-inside lg:text-lg">
            <li class="pb-3">
                You will receive <b>{{number_format($seasonal_returns)}} Tshs </b>
                after each harvest which will occurs four times a year.
            </li>
            <li class="py-3">
                In a Year you will have received a total of
                <b> {{number_format($seasonal_returns * 4)}} Tshs </b>.
            </li>
        </ol>
        <h3 class="pt-4 text-xl font-semibold tracking-wide text-gray-600">
            NOTE 💡
        </h3>
        <ol class="text-base list-disc list-inside lg:text-lg">
         <li class="py-2 font-light tracking-tight">
                After each successfull harvest you are required to paid 66,000 Tshs for farm supervision for the next plantation.
            </li>
            <li class="py-2 font-light tracking-tight">
                Farm Rental is on a yearly basis and the invested amount wiil not be available for withdrawal at the end of the contract.
           </li>
        </ol>
    </div>

    @endif

</div>
