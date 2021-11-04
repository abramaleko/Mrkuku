<x-slot name="title">
    {{ __('Project Calculator') }}
</x-slot>

<div class="container px-6 py-8 mx-auto">
    <h1 class="text-2xl font-bold text-gray-700 lg:text-4xl lg:py-0">
        Project Calculator
    </h1>
    <p class="py-4 text-base leading-relaxed text-gray-600 lg:text-lg">
        Welcome to Mr Kuku Project Calculator, here you can calculate the capital required and profit returns of your
        investments depending on which project you have selected.
    </p>

    <div class="mt-4">
        <label class="block lg:flex">
            <span class="text-xl font-bold text-gray-700">Project Name :</span>
            <select wire:model="projectChoice" class="block w-auto mt-4 rounded form-select lg:ml-8 lg:w-72 lg:mt-0">
                <option>Choose ...</option>
                @foreach ($projects as $project)
                <option value="{{$project->id}}">{{$project->name}}</option>
                @endforeach
            </select>
        </label>
    </div>

    @if ($showChickCalcuMethod)
    <div class="mt-8">
        <label class="block lg:flex">
            <span class="text-xl font-bold text-gray-700">Calculation method:</span>
            <select wire:model="ChickCalcuMethod" class="block w-auto mt-4 rounded form-select lg:ml-8 lg:w-72 lg:mt-0">
                <option>Choose ...</option>
                <option value="1">Per Available Capital</option>
                <option value="2">Per Number of Chickens </option>
            </select>
        </label>
    </div>
    @endif


    @if ($showChickCalcu)
        <div class="mt-12">
            <label class="text-lg font-bold tracking-tight text-gray-600" for="chicks">
                Enter how many chicks you wish to invest
            </label>
            <div class="flex mt-4">
                <input type="number" id="chicks" class="block rounded form-input" wire:model="chicksNo">
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
                        Risk Management -- {{number_format($risk)}}
                    </li>
                    <li class="py-2">
                        Management costs-- {{number_format($management)}}
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

            <div class="mt-8 text-gray-700">
                <h3 class="pb-4 text-xl font-extrabold">
                    RETURN ON INVESTMENT (RIO)
                </h3>
                <ol class="text-lg list-disc list-inside">
                    <li class="pb-3">
                        If you opt for returns in 6 months then your RIO will be
                        <b>{{number_format($return1)}} Tshs</b>
                    </li>
                    <li class="py-3">
                        If you opt for returns in 12 months then your RIO will be
                        <b>{{number_format($return2)}} Tshs</b>
                    </li>
                </ol>
                <h3 class="pt-4 text-2xl font-bold tracking-wide text-gray-500">
                    NOTE 💡
                </h3>
                <ol class="list-disc list-inside">
                    <li class="py-2 text-lg font-light tracking-tight">
                        Rate of returns differ depending on  which package you are alocated. To learn more
                        about our packages you can revise them
                        <a href="{{ route('investments', '#invest-packages') }}" target="_blank"
                            class="text-green-500 hover:underline">
                            here
                        </a>
                    </li>
                    <li class="py-2 text-lg font-light tracking-tight">
                        If you have not yet read/understood our Risk Management policy, You can fully revise them
                        <a href="{{ route('learn', '#risk-plan') }}" target="_blank"
                            class="text-green-500 hover:underline">
                            here
                        </a>
                    </li>
                    <li class="py-2 text-lg font-light tracking-tight">
                        At the end of the contract, the investment capital will be available for withdrawal or can be used to issue another contract.
                   </li>
                </ol>
            </div>
            @endif
        </div>
    @endif

    @if ($PerInvestmentCalcu)
    <div class="mt-12">
        <label class="text-lg font-bold tracking-tight text-gray-600" for="chicks">
            Enter how much capital do you wish to invest (Tshs)
        </label>
        <div class="flex mt-4">
            <input type="number" id="chicks" class="block rounded form-input" wire:model="investmentCapital">
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
        <div class="mt-8 text-gray-700">
            <h3 class="pb-4 text-xl font-extrabold">
                RETURN ON INVESTMENT (RIO)
            </h3>
            <ol class="text-lg list-disc list-inside">
                <li class="pb-3">
                    If you opt for returns in 6 months then your RIO will be
                    <b>{{number_format($return1)}} Tshs</b>
                </li>
                <li class="py-3">
                    If you opt for returns in 12 months then your RIO will be
                    <b>{{number_format($return2)}} Tshs</b>
                </li>
            </ol>
            <h3 class="pt-4 text-2xl font-bold tracking-wide text-gray-500">
                NOTE 💡
            </h3>
            <ol class="list-disc list-inside">
                <li class="py-2 text-lg font-light tracking-tight">
                    Rate of returns differ depending on  which package you are alocated. To learn more
                    about our packages you can revise them
                    <a href="{{ route('investments', '#invest-packages') }}" target="_blank"
                        class="text-green-500 hover:underline">
                        here
                    </a>
                </li>
                <li class="py-2 text-lg font-light tracking-tight">
                    If you have not yet read/understood our Risk Management policy, You can fully revise them
                    <a href="{{ route('learn', '#risk-plan') }}" target="_blank"
                        class="text-green-500 hover:underline">
                        here
                    </a>
                </li>
                <li class="py-2 text-lg font-light tracking-tight">
                    At the end of the contract, the investment capital will be available for withdrawal or can be used to issue another contract.
               </li>
            </ol>
        </div>

        @endif

    </div>

    @endif



</div>
