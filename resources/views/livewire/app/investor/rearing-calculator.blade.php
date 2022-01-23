<div class="mt-4">

    <div>
        <p class="block text-lg font-bold text-gray-700">Calculation method</p>
        <div class="block mt-2 text-base lg:flex">
            <div class=" form-check">
                <input wire:model="ChickCalcuMethod" value="1"
                    class="float-left w-4 h-4 mt-1 mr-2 align-top transition duration-200 bg-white bg-center bg-no-repeat bg-contain border border-gray-300 rounded-full appearance-none cursor-pointer form-check-input checked:bg-blue-600 checked:border-blue-600 focus:outline-none"
                    type="radio" id="flexRadioDefault1">
                <label class="inline-block text-gray-800 form-check-label" for="flexRadioDefault1">
                    Per Available Capital
                </label>
            </div>
            <div class="mt-2 lg:mt-0 lg:ml-4 form-check">
                <input wire:model="ChickCalcuMethod" value="2"
                    class="float-left w-4 h-4 mt-1 mr-2 align-top transition duration-200 bg-white bg-center bg-no-repeat bg-contain border border-gray-300 rounded-full appearance-none cursor-pointer form-check-input checked:bg-blue-600 checked:border-blue-600 focus:outline-none"
                    type="radio" id="flexRadioDefault2">
                <label class="inline-block text-gray-800 form-check-label" for="flexRadioDefault2">
                    Per Number of Chickens
                </label>
            </div>
        </div>
    </div>

    @if ($showChickCalcu)
    <div class="mt-6">
        <label class="text-lg font-bold tracking-tight text-gray-600" for="chicks">
            Enter how many chicks you wish to invest
        </label>
        <div class="flex mt-4">
            <input type="number" id="chicks" class="block rounded form-input disabled:cursor-not-allowed" wire:model="chicksNo" {{$calculatedChicks ? 'disabled' : ''}}>
            <button wire:click="resetChicksNo"
                class="px-4 py-2 ml-4 tracking-wide text-white bg-red-500 rounded hover:bg-red-400">RESET</button>
        </div>
        @if (($chicksNo == '') || ($chicksNo < 100))
        <span class="block pt-1 text-sm font-semibold text-red-500"> ❌ Minimum number is 100 chicks</span>
        @endif

        <div class="flex flex-wrap mt-4">
            <button wire:click=calculateChicks
            {{ (($chicksNo == '') || ($chicksNo < 100)) ? 'disabled' : '' }}
            class="px-6 py-2 tracking-wide text-white bg-blue-500 rounded hover:bg-blue-400 {{ (($chicksNo == '') || ($chicksNo < 100)) ? 'disabled:opacity-25' : '' }}">
                CALCULATE
            </button>
            @can('view investments')
            <button wire:click="addToInvestment"
            {{ $calculatedChicks ? '' : 'disabled' }}
                class="px-6 py-2 mt-4 tracking-wide text-white bg-green-500 rounded lg:ml-8 hover:bg-green-400 lg:mt-0 {{ $calculatedChicks ? '' : 'disabled:opacity-25' }}">
                ADD TO MY INVESTMENTS
            </button>
            @endcan
        </div>

        @if ($calculatedChicks)
        <div class="mt-8 text-gray-700">
            <h3 class="pb-4 text-lg font-bold lg:text-xl">
                Capital Required Breakdown (Tshs)
            </h3>
            <ol class="text-base list-disc list-inside lg:text-lg">
                <li class="py-2">
                  <b>  Day Old Chick (DOC) </b> -- {{number_format($doc)}}
                </li>
                <li class="py-2">
                  <b>  Food & Medicine  </b> -- {{number_format($food)}}
                </li>
                <li class="py-2">
                  <b> Risk Management </b>  -- {{number_format($risk)}}
                </li>
                <li class="py-2">
                 <b> Management costs </b>  -- {{number_format($management)}}
                </li>
            </ol>
            <p class="pt-4 text-lg font-bold tracking-wide lg:text-xl">
                Total Capital : {{number_format($capital)}} Tshs
            </p>
            <p class="pt-2 text-lg font-bold tracking-wide lg:text-xl">
                Package Category :
                @if ($package == 1)
                     Gold
                 @elseif($package ==2)
                     Diamond
                 @else
                     Tanzanite
                @endif
            </p>
        </div>
        @if ($bonus === 'true' )
        <div class="mt-8 text-gray-700">
           <h3 class="pb-4 text-xl font-extrabold">
               RETURN ON INVESTMENT (RIO)
           </h3>
           <ol class="text-base text-left list-disc list-inside lg:text-lg">
            <li class="pb-3">
                   If you opt for RIO returns in 3 months then you will receive
                   <b>{{number_format($sub_profit0)}} Tshs</b> with a bonus of
                   <b>{{number_format($bonus0)}} Tshs</b> which will sum up to
                   <b>{{number_format( $sub_profit0 + $bonus0)}} Tshs</b>
                   after 3 months.
               </li>
               <li class="py-3">
                   If you opt for RIO returns in 6 months then you will receive
                   <b>{{number_format($sub_profit1)}} Tshs</b> with a bonus of
                   <b>{{number_format($bonus1)}} Tshs</b> which will sum up to
                   <b>{{number_format( $sub_profit1 + $bonus1)}} Tshs</b>
                   after 6 months.
               </li>
               <li class="py-3">
                   If you opt for RIO returns in 12 months then you will receive
                   <b>{{number_format($sub_profit2)}} Tshs</b> with a bonus of
                   <b>{{number_format($bonus2)}} Tshs</b> which will sum up to
                   <b>{{number_format( $sub_profit2 + $bonus2)}} Tshs</b>
                   after 12 months.
               </li>
           </ol>
           <h3 class="pt-4 text-xl font-semibold tracking-wide text-gray-600">
            NOTE 💡
           </h3>
           <ol class="text-base list-disc list-inside lg:text-lg">
            <li class="py-2 font-light tracking-tight">
                   Rate of returns differ depending on  which package you are alocated. To learn more
                   about our packages you can revise them
                   <a href="{{ route('investments', '#invest-packages') }}" target="_blank"
                       class="text-green-500 hover:underline">
                       here
                   </a>
               </li>
               <li class="py-2 font-light tracking-tight">
                   If you have not yet read/understood our Risk Management policy, You can fully revise them
                   <a href="{{ route('learn', '#risk-plan') }}" target="_blank"
                       class="text-green-500 hover:underline">
                       here
                   </a>
               </li>
               <li class="py-2 font-light tracking-tight">
                   At the end of the contract, the investment capital will be available for withdrawal or can be used to issue another contract.
              </li>
           </ol>
       </div>
       @else
       <div class="mt-8 text-gray-700">
           <h3 class="pb-4 text-xl font-extrabold">
               RETURN ON INVESTMENT (RIO)
           </h3>
           <ol class="text-base text-left list-disc list-inside lg:text-lg">
               <li class="pb-3">
                   If you opt for RIO returns in 3 months then you will receive
                   <b>{{number_format($sub_profit0)}} Tshs</b> which will sum up to
                   <b>{{number_format( $sub_profit0 + $bonus0)}} Tshs</b>
                   after 3 months.
               </li>
               <li class="py-3">
                   If you opt for RIO returns in 6 months then you will receive
                   <b>{{number_format($sub_profit1)}} Tshs</b> which will sum up to
                   <b>{{number_format( $sub_profit1 + $bonus1)}} Tshs</b>
                   after 6 months.
               </li>
               <li class="py-3">
                   If you opt for RIO returns in 12 months then you will receive
                   <b>{{number_format($sub_profit2)}} Tshs</b> which will sum up to
                   <b>{{number_format( $sub_profit2 + $bonus2)}} Tshs</b>
                   after 12 months.
               </li>
           </ol>
           <h3 class="pt-4 text-xl font-semibold tracking-wide text-gray-600">
               NOTE 💡
           </h3>
           <ol class="text-base list-disc list-inside lg:text-lg">
            <li class="py-2 font-light tracking-tight">
                   There are currently no bonuses on ROI for this project
               </li>
               <li class="py-2 font-light tracking-tight">
                   If you have not yet read/understood our Risk Management policy, You can fully revise them
                   <a href="{{ route('learn', '#risk-plan') }}" target="_blank"
                       class="text-green-500 hover:underline">
                       here
                   </a>
               </li>
               <li class="py-2 font-light tracking-tight">
                   At the end of the contract, the investment capital will be available for withdrawal or can be used to issue another contract.
              </li>
           </ol>
       </div>
        @endif
        @endif
    </div>
@endif

@if ($PerInvestmentCalcu)
    <div class="mt-6">
        <label class="text-lg font-bold tracking-tight text-gray-600" for="chicks">
            Enter how much capital do you wish to invest (Tshs)
        </label>
        <div class="flex mt-4">
            <input type="number" id="chicks" class="block rounded form-input disabled:cursor-not-allowed" wire:model="investmentCapital" {{$calculatedCapital ? 'disabled' : ''}}>
            <button wire:click="resetinvestmentCapital"
                class="px-4 py-2 ml-4 tracking-wide text-white bg-red-500 rounded hover:bg-red-400">RESET</button>
        </div>
        <span class="block pt-1 text-lg font-semibold text-green-500"> Amount: {{ $investmentCapital != '' ? number_format($investmentCapital) : '0'}} Tshs</span>
        @if (($investmentCapital == '') || ($investmentCapital < 500000))
        <span class="block pt-1 text-sm font-semibold text-red-500"> ❌ Minimum amount is 500,000 Tshs </span>
        @endif

        <div class="flex flex-wrap mt-4">
            <button wire:click=calculateCapital
            {{ (($investmentCapital == '') || ($investmentCapital < 500000)) ? 'disabled' : '' }}
            class="px-6 py-2 tracking-wide text-white bg-blue-500 rounded hover:bg-blue-400 {{ (($investmentCapital == '') || ($investmentCapital < 500000)) ? 'disabled:opacity-25' : '' }}">
                CALCULATE
            </button>
            @can('view investments')
            <button wire:click="addToInvestment"
            {{ $calculatedCapital ? '' : 'disabled' }}
                class="px-6 py-2 mt-4 tracking-wide text-white bg-green-500 rounded lg:ml-8 hover:bg-green-400 lg:mt-0 {{ $calculatedCapital ? '' : 'disabled:opacity-25'}}">
                ADD TO MY INVESTMENTS
            </button>
            @endcan
        </div>
        @if ($calculatedCapital)
        <div class="mt-8 text-gray-700">
            <h3 class="pb-4 text-xl font-bold">
                Capital Required Breakdown (Tshs)
            </h3>
            <ol class="text-lg list-disc list-inside">
                <li class="py-2">
                    Day Old Chick (DOC) -- {{number_format($doc)}}
                </li>
                <li class="py-2">
                    Food & Medicine -- {{number_format($food)}}
                </li>
                <li class="py-2">
                    Management costs-- {{number_format($management)}}
                </li>
                <p class="font-bold tracking-wide text-green-600">Additional</p>
                <li class="py-2">
                    Risk Management -- {{number_format($risk)}}
                </li>
            </ol>
            <p class="pt-4 text-xl font-bold tracking-wide">
                Total Capital : {{number_format($capital)}} Tshs
            </p>
            <p class="pt-2 text-xl font-bold tracking-wide">
                Package Category :
                @if ($package == 1)
                     Gold
                 @elseif($package ==2)
                     Diamond
                 @else
                     Tanzanite
                @endif
            </p>
        </div>
        @if ($bonus === 'true' )
        <div class="mt-8 text-gray-700">
           <h3 class="pb-4 text-xl font-extrabold">
               RETURN ON INVESTMENT (RIO)
           </h3>
           <ol class="text-base text-left list-disc list-inside lg:text-lg">
            <li class="pb-3">
                   If you opt for RIO returns in 3 months then you will receive
                   <b>{{number_format($sub_profit0)}} Tshs</b> with a bonus of
                   <b>{{number_format($bonus0)}} Tshs</b> which will sum up to
                   <b>{{number_format( $sub_profit0 + $bonus0)}} Tshs</b>
                   after 3 months.
               </li>
               <li class="py-3">
                   If you opt for RIO returns in 6 months then you will receive
                   <b>{{number_format($sub_profit1)}} Tshs</b> with a bonus of
                   <b>{{number_format($bonus1)}} Tshs</b> which will sum up to
                   <b>{{number_format( $sub_profit1 + $bonus1)}} Tshs</b>
                   after 6 months.
               </li>
               <li class="py-3">
                   If you opt for RIO returns in 12 months then you will receive
                   <b>{{number_format($sub_profit2)}} Tshs</b> with a bonus of
                   <b>{{number_format($bonus2)}} Tshs</b> which will sum up to
                   <b>{{number_format( $sub_profit2 + $bonus2)}} Tshs</b>
                   after 12 months.
               </li>
           </ol>
           <h3 class="pt-4 text-xl font-semibold tracking-wide text-gray-600">
            NOTE 💡
           </h3>
           <ol class="text-base list-disc list-inside lg:text-lg">
               <li class="py-2 font-light tracking-tight ">
                   Rate of returns differ depending on  which package you are alocated. To learn more
                   about our packages you can revise them
                   <a href="{{ route('investments', '#invest-packages') }}" target="_blank"
                       class="text-green-500 hover:underline">
                       here
                   </a>
               </li>
               <li class="py-2 font-light tracking-tight">
                   If you have not yet read/understood our Risk Management policy, You can fully revise them
                   <a href="{{ route('learn', '#risk-plan') }}" target="_blank"
                       class="text-green-500 hover:underline">
                       here
                   </a>
               </li>
               <li class="py-2 font-light tracking-tight">
                   At the end of the contract, the investment capital will be available for withdrawal or can be used to issue another contract.
              </li>
           </ol>
       </div>
       @else
       <div class="mt-8 text-gray-700">
           <h3 class="pb-4 text-xl font-extrabold">
               RETURN ON INVESTMENT (RIO)
           </h3>
           <ol class="text-base text-left list-disc list-inside lg:text-lg">
               <li class="pb-3">
                   If you opt for RIO returns in 3 months then you will receive
                   <b>{{number_format($sub_profit0)}} Tshs</b> which will sum up to
                   <b>{{number_format( $sub_profit0 + $bonus0)}} Tshs</b>
                   after 3 months.
               </li>
               <li class="py-3">
                   If you opt for RIO returns in 6 months then you will receive
                   <b>{{number_format($sub_profit1)}} Tshs</b> which will sum up to
                   <b>{{number_format( $sub_profit1 + $bonus1)}} Tshs</b>
                   after 6 months.
               </li>
               <li class="py-3">
                   If you opt for RIO returns in 12 months then you will receive
                   <b>{{number_format($sub_profit2)}} Tshs</b> which will sum up to
                   <b>{{number_format( $sub_profit2 + $bonus2)}} Tshs</b>
                   after 12 months.
               </li>
           </ol>
           <h3 class="pt-4 text-xl font-semibold tracking-wide text-gray-600">
               NOTE 💡
           </h3>
           <ol class="text-base list-disc list-inside lg:text-lg">
            <li class="py-2 font-light tracking-tight">
                   There are currently no bonuses on ROI for this project
               </li>
               <li class="py-2 font-light tracking-tight">
                   If you have not yet read/understood our Risk Management policy, You can fully revise them
                   <a href="{{ route('learn', '#risk-plan') }}" target="_blank"
                       class="text-green-500 hover:underline">
                       here
                   </a>
               </li>
               <li class="py-2 font-light tracking-tight">
                   At the end of the contract, the investment capital will be available for withdrawal or can be used to issue another contract.
              </li>
           </ol>
       </div>
        @endif
        @endif
    </div>
    @endif

</div>
