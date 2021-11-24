    {{-- Do your work, then step back. --}}
    <x-slot name="title">
        {{ __('Request Contract') }}
    </x-slot>
    <x-slot name="styles">
        <link rel="stylesheet"
            href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    </x-slot>

    <div class="container px-6 py-8 mx-auto">
        <section class="contract-info">
            <div class="w-full px-4 lg:w-9/12">
                <div
                    class="relative flex flex-col w-full min-w-0 mb-6 break-words bg-gray-100 border-0 rounded-lg shadow-lg">
                    <div class="px-6 py-6 mb-0 bg-white rounded-t">
                        <div class="">
                            <h1
                                class="text-2xl font-bold tracking-tighter text-gray-700 lg:text-3xl lg:py-0 lg:tracking-wide">
                                Request contract
                            </h1>
                            <p class="pt-3 text-base leading-relaxed text-gray-500 lg:text-lg">
                                {{ ucfirst(Auth::user()->name) }} please fill the details below before proceeding to
                                view contract.
                            </p>
                        </div>
                    </div>
                    <div class="flex-auto px-4 py-10 pt-0 bg-blue-50 lg:px-10">
                        <form>
                            <h6 class="mt-3 mb-4 text-base font-bold text-gray-600 uppercase">
                                Bank Information
                            </h6>
                            <div class="flex flex-wrap">
                                <div class="w-full px-4 lg:w-6/12">
                                    <div class="relative w-full mb-3">
                                        <label class="block mb-2 text-xs font-bold text-gray-600 uppercase"
                                            htmlfor="grid-password">
                                            Bank Name
                                        </label>
                                        <input type="text"
                                            class="w-full px-3 py-3 text-sm text-gray-600 placeholder-gray-400 transition-all duration-150 ease-linear bg-white border-0 rounded shadow focus:outline-none focus:ring"
                                            wire:model.defer="bank_name"  placeholder="e.g CRDB">
                                            @error('bank_name')
                                            <span class="block my-2 text-sm font-bold text-red-600">
                                                {{$message}}
                                            </span>
                                          @enderror
                                    </div>
                                </div>
                                <div class="w-full px-4 lg:w-6/12">
                                    <div class="relative w-full mb-3">
                                        <label class="block mb-2 text-xs font-bold text-gray-600 uppercase"
                                            htmlfor="grid-password">
                                            Account Name
                                        </label>
                                        <input type="text"
                                            class="w-full px-3 py-3 text-sm text-gray-600 placeholder-gray-400 transition-all duration-150 ease-linear bg-white border-0 rounded shadow focus:outline-none focus:ring"
                                             wire:model.defer="account_name"  placeholder="e.g John Olive Doe">
                                             @error('account_name')
                                            <span class="block my-2 text-sm font-bold text-red-600">
                                                {{$message}}
                                            </span>
                                          @enderror
                                    </div>
                                </div>
                                <div class="w-full px-4 lg:w-12/12">
                                    <div class="relative w-full mb-3">
                                        <label class="block mb-2 text-xs font-bold text-gray-600 uppercase"
                                          htmlfor="grid-password">
                                            Account Number
                                        </label>
                                        <input type="text"
                                            class="w-full px-3 py-3 text-sm placeholder-gray-400 transition-all duration-150 ease-linear bg-white border-0 rounded shadow text-blueGray-600 focus:outline-none focus:ring"
                                            wire:model.defer="account_no"   placeholder="e.g 5247 4610 0305 ****">
                                            @error('account_no')
                                            <span class="block my-2 text-sm font-bold text-red-600">
                                                {{$message}}
                                            </span>
                                          @enderror

                                    </div>
                                </div>
                                <div class="w-full px-4 lg:w-6/12">
                                    <div class="relative w-full mb-3">
                                        <label class="block mb-2 text-xs font-bold text-gray-600 uppercase"
                                            htmlfor="grid-password">
                                            Receive returns on investment after (months)
                                        </label>
                                        <select wire:model.defer="roi_period"
                                        class="block w-full px-3 py-3 mt-1 text-sm text-gray-600 placeholder-gray-400 transition-all duration-150 ease-linear bg-white border-0 rounded shadow form-select focus:outline-none focus:ring">
                                            <option>Choose ..</option>
                                            <option value="3">3 months</option>
                                            <option value="3">6 months</option>
                                            <option value="12">12 months</option>
                                          </select>

                                             @error('roi_period')
                                            <span class="block my-2 text-sm font-bold text-red-600">
                                                {{$message}}
                                            </span>
                                          @enderror
                                    </div>
                                </div>
                            </div>

                            <hr class="mt-6 border-b-1 border-blueGray-300">
                            <h6 class="mt-3 mb-2 text-base font-bold text-gray-600 uppercase">
                                Next of Kin information
                            </h6>
                            <p class="text-sm font-thin leading-relaxed text-gray-600 mb-7 ">
                                This information will only be used when the investor is unavailable.
                            </p>
                            <div class="flex flex-wrap">
                                <div class="w-full px-4 lg:w-6/12">
                                    <div class="relative w-full mb-3">
                                        <label class="block mb-2 text-xs font-bold text-gray-600 uppercase"
                                            htmlfor="grid-password">
                                            Full Name
                                        </label>
                                        <input type="text"
                                            class="w-full px-3 py-3 text-sm text-gray-600 placeholder-gray-400 transition-all duration-150 ease-linear bg-white border-0 rounded shadow focus:outline-none focus:ring"
                                            wire:model.defer="name"  placeholder="e.g John Doe">
                                            @error('name')
                                            <span class="block my-2 text-sm font-bold text-red-600">
                                                {{$message}}
                                            </span>
                                          @enderror
                                    </div>
                                </div>
                                <div class="w-full px-4 lg:w-6/12">
                                    <div class="relative w-full mb-3">
                                        <label class="block mb-2 text-xs font-bold text-gray-600 uppercase"
                                            htmlfor="grid-password">
                                            Residential place
                                        </label>
                                        <input type="text"
                                            class="w-full px-3 py-3 text-sm text-gray-600 placeholder-gray-400 transition-all duration-150 ease-linear bg-white border-0 rounded shadow focus:outline-none focus:ring"
                                            wire:model.defer="residence"   placeholder="e.g Tanzania, Arusha">
                                            @error('residence')
                                            <span class="block my-2 text-sm font-bold text-red-600">
                                                {{$message}}
                                            </span>
                                          @enderror
                                    </div>
                                </div>
                                <div class="w-full px-4 lg:w-6/12">
                                    <div class="relative w-full mb-3">
                                        <label class="block mb-2 text-xs font-bold text-gray-600 uppercase"
                                            htmlfor="grid-password">
                                            Relationship
                                        </label>
                                        <input type="text"
                                            class="w-full px-3 py-3 text-sm text-gray-600 placeholder-gray-400 transition-all duration-150 ease-linear bg-white border-0 rounded shadow focus:outline-none focus:ring"
                                             wire:model.defer="relationship"  placeholder="e.g Brother">
                                             @error('relationship')
                                            <span class="block my-2 text-sm font-bold text-red-600">
                                                {{$message}}
                                            </span>
                                          @enderror
                                    </div>
                                </div>
                                <div class="w-full px-4 lg:w-6/12">
                                    <div class="relative w-full mb-3">
                                        <label class="block mb-2 text-xs font-bold text-gray-600 uppercase"
                                            htmlfor="grid-password">
                                            Email
                                        </label>
                                        <input type="email"
                                            class="w-full px-3 py-3 text-sm text-gray-600 placeholder-gray-400 transition-all duration-150 ease-linear bg-white border-0 rounded shadow focus:outline-none focus:ring"
                                            wire:model.defer="email"  placeholder="e.g john@gmail.com">
                                            @error('email')
                                            <span class="block my-2 text-sm font-bold text-red-600">
                                                {{$message}}
                                            </span>
                                          @enderror
                                    </div>
                                </div>
                                <div class="w-full px-4 lg:w-6/12">
                                    <div class="relative w-full mb-3">
                                        <label class="block mb-2 text-xs font-bold text-gray-600 uppercase"
                                            htmlfor="grid-password">
                                            Phone number
                                        </label>
                                        <input type="tel"
                                            class="w-full px-3 py-3 text-sm text-gray-600 placeholder-gray-400 transition-all duration-150 ease-linear bg-white border-0 rounded shadow focus:outline-none focus:ring"
                                            wire:model.defer="phone_no"  placeholder="e.g 0712 *****">
                                            @error('phone_no')
                                            <span class="block my-2 text-sm font-bold text-red-600">
                                                {{$message}}
                                            </span>
                                          @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="my-4">
                                <button wire:click="submit" type="button" class="px-8 py-3 tracking-wide text-white bg-blue-500 rounded-md hover:bg-blue-400">SUBMIT</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
