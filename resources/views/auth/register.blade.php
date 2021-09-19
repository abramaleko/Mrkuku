<x-guest-layout>
    <x-slot name="styles">
        <style>
            body{
                background-color:  #F3F4F6 !important;

            }
        </style>
    </x-slot>
    <!-- Container -->
    <div class="container mx-auto font-mono">
        <div class="flex justify-center px-6 my-12">
            <!-- Row -->
            <div class="flex w-full xl:w-3/4 lg:w-11/12">
                <!-- Col -->
                <div
                    class="hidden w-full h-auto bg-gray-400 bg-cover rounded-l-lg lg:block lg:w-5/12"
                    style="background-image: url('{{asset('images/signup.jpg')}}')"
                ></div>
                <!-- Col -->
                <div class="w-full p-5 bg-white rounded-lg lg:w-7/12 lg:rounded-l-none">
                    <div class="flex flex-wrap justify-start">
                        <img src="{{ asset('images/logo.jpeg') }}" class="w-12 h-12 rounded-full md:w-16 md:h-16" alt="Mrkuku logo">
                        <div class="ml-2">
                            <span class="block text-2xl font-light tracking-tighter text-gray-700">Kuku</span>
                            <span class="block pt-1 text-sm font-bold text-gray-700">Your success is our legacy</span>
                        </div>
                    </div>
                    <x-jet-validation-errors class="mt-4 font-sans" />

                    <h3 class="pt-8 text-2xl text-center">Create an Account!</h3>
                    <form method="POST" action="{{ route('register') }}"
                      class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                      @csrf
                        <div class="mb-4 md:flex md:justify-between">
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="fullName">
                                    Full Name
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="fullName"
                                    type="text"
                                    placeholder="Full Name" autocomplete="name"
                                    name="name"
                                    value="{{old('name')}}"
                                />
                            </div>
                            <div class="md:ml-2">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="phone_no">
                                    Phone Number
                                </label>
                                <input
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="phone_no"
                                    type="tel"
                                    name="phone_no" value="{{old('phone_no')}}"
                                    placeholder="Phone Number"

                                />
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                                Email
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="email"
                                type="email"
                                name="email" value="{{old('email')}}"
                                placeholder="Enter your email here"
                            />
                        </div>
                        <div class="mb-4 md:flex md:justify-between">
                            <div class="mb-4 md:mr-2 md:mb-0">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                                    Password
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="password"
                                    type="password"
                                    name="password" autocomplete="new-password"
                                    placeholder="******************"
                                />
                            </div>
                            <div class="md:ml-2">
                                <label class="block mb-2 text-sm font-bold text-gray-700" for="password_confirmation">
                                    Confirm Password
                                </label>
                                <input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="password_confirmation"
                                    type="password"
                                    name="password_confirmation"  autocomplete="new-password"
                                    placeholder="******************"
                                />
                            </div>
                        </div>
                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="my-4">
                            <x-jet-label for="terms">
                                <div class="flex items-center">
                                    <x-jet-checkbox name="terms" id="terms"/>

                                    <div class="ml-2 text-sm font-bold text-gray-700">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-sm text-gray-600 underline hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-sm text-gray-600 underline hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-jet-label>
                        </div>
                    @endif
                        <div class="mb-6 text-center">
                            <button
                                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                                Register Account
                            </button>
                        </div>
                        <hr class="mb-6 border-t" />
                        <div class="text-center">
                            <a
                                class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
                                href="{{ route('login') }}">
                                Already have an account? Login!
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
