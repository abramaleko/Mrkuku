<x-slot name="title">
    Settings
</x-slot>

<div class="container px-6 py-8 mx-auto">
    <h2 class="text-2xl font-semibold text-gray-700">Settings</h2>

    <div class="max-w-xl p-4 my-4 bg-white rounded-md">
        <h2 class="text-base font-semibold text-gray-700 lg:text-lg">Mr.Kuku Chicken Rearing Project</h2>
        <div class="my-2 border border-b border-gray-300 border-dashed"></div>
        @if (session()->has('updateBonusMrKuku'))
        <div class="flex max-w-lg p-4 my-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
            <svg class="inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <div>
                    <span class="font-medium">Success alert!</span> {{ session('updateBonusMrKuku') }}
                </div>
                </div>
        @endif

        <p class="text-lg text-gray-700 ">Bonus:</p>

        <div class="flex text-sm">
            <div>
                <div class="py-2 form-check">
                    <input wire:model="bonus" value="true"
                        class="float-left w-4 h-4 mt-1 mr-2 align-top transition duration-200 bg-white bg-center bg-no-repeat bg-contain border border-gray-300 rounded-full appearance-none cursor-pointer form-check-input checked:bg-blue-600 checked:border-blue-600 focus:outline-none"
                        type="radio" id="flexRadioDefault1">
                    <label class="inline-block text-gray-800 form-check-label" for="flexRadioDefault1">
                        Bonus Available
                    </label>
                </div>
                <div class="form-check">
                    <input wire:model="bonus" value="false"
                        class="float-left w-4 h-4 mt-1 mr-2 align-top transition duration-200 bg-white bg-center bg-no-repeat bg-contain border border-gray-300 rounded-full appearance-none cursor-pointer form-check-input checked:bg-blue-600 checked:border-blue-600 focus:outline-none"
                        type="radio" id="flexRadioDefault2">
                    <label class="inline-block text-gray-800 form-check-label" for="flexRadioDefault2">
                        Bonus Not Available
                    </label>
                </div>
            </div>
        </div>

        @if ($bonus === 'true')
            <div class="mt-4">
                <div id="gold">
                    <h3 class="text-lg font-semibold text-gray-700">Gold Package</h3>
                    <p class="text-xs font-light text-gray-500 ">Range from 500,000 - 4,999,999</p>
                    <div class="flex flex-wrap my-4">
                        <div class="">
                            <input type="number" wire:model.defer='Roi_gold.0'
                                class="w-20 px-2 py-1 text-sm text-gray-700 rounded-md">
                            <span class="block text-xs text-blue-500">3 months</span>
                        </div>
                        <div class="mx-4">
                            <input type="number" wire:model.defer='Roi_gold.1'
                                class="w-20 px-2 py-1 text-sm text-gray-700 rounded-md">
                            <span class="block text-xs text-blue-500">6 months</span>
                        </div>
                        <div class="">
                            <input type="number" wire:model.defer='Roi_gold.2'
                                class="w-20 px-2 py-1 text-sm text-gray-700 rounded-md">
                            <span class="block text-xs text-blue-500">12 months</span>
                        </div>
                    </div>
                </div>

                <div id="diamond">
                    <h3 class="text-lg font-semibold text-gray-700">Diamond Package</h3>
                    <p class="text-xs font-light text-gray-500 ">Range from 5,000,000 - 9,999,999</p>
                    <div class="flex flex-wrap my-4">
                        <div class="">
                            <input type="number" wire:model.defer="Roi_Diamond.0"
                                class="w-20 px-2 py-1 text-sm text-gray-700 rounded-md">
                            <span class="block text-xs text-blue-500">3 months</span>
                        </div>
                        <div class="mx-4">
                            <input type="number" wire:model.defer="Roi_Diamond.1"
                                class="w-20 px-2 py-1 text-sm text-gray-700 rounded-md">
                            <span class="block text-xs text-blue-500">6 months</span>
                        </div>
                        <div class="">
                            <input type="number" wire:model.defer="Roi_Diamond.2"
                                class="w-20 px-2 py-1 text-sm text-gray-700 rounded-md">
                            <span class="block text-xs text-blue-500">12 months</span>
                        </div>
                    </div>
                </div>

                <div id="tanzanite">
                    <h3 class="text-lg font-semibold text-gray-700">Tanzanite Package</h3>
                    <p class="text-xs font-light text-gray-500 ">Range from 10,000,000 and above </p>
                    <div class="flex flex-wrap my-4">
                        <div class="">
                            <input wire:model.defer="Roi_Tanzanite.0" type="number"
                                class="w-20 px-2 py-1 text-sm text-gray-700 rounded-md">
                            <span class="block text-xs text-blue-500">3 months</span>
                        </div>
                        <div class="mx-4">
                            <input type="number" wire:model.defer="Roi_Tanzanite.1"
                                class="w-20 px-2 py-1 text-sm text-gray-700 rounded-md">
                            <span class="block text-xs text-blue-500">6 months</span>
                        </div>
                        <div class="">
                            <input type="number" wire:model.defer="Roi_Tanzanite.2"
                                class="w-20 px-2 py-1 text-sm text-gray-700 rounded-md">
                            <span class="block text-xs text-blue-500">12 months</span>
                        </div>
                    </div>
                </div>


            </div>
        @endif


        <button wire:click="updateProject"
            class="px-4 py-1 mt-4 text-white bg-blue-600 rounded-md hover:bg-blue-400">Update</button>

    </div>

</div>
