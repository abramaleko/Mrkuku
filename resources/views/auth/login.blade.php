<x-guest-layout>
<div class="font-sans">
    <div class="relative flex flex-col items-center min-h-screen bg-gray-100 sm:justify-center ">
        <div class="relative w-full sm:max-w-sm">
            <div class="absolute w-full h-full transform bg-blue-400 shadow-lg card rounded-3xl -rotate-6"></div>
            <div class="absolute w-full h-full transform bg-gray-800 shadow-lg card rounded-3xl rotate-6"></div>
            <div class="relative w-full px-6 py-4 bg-gray-100 shadow-md rounded-3xl">

                <a href="/">
                <div class="flex flex-wrap justify-center">
                        <img src="{{ asset('images/logo.jpeg') }}" class="w-8 h-8 rounded-full lg:w-12 lg:h-12" alt="Mrkuku logo">
                        <h2 class="ml-1 text-2xl font-semibold text-center text-gray-700 lg:pt-2">Kuku</h2>
                </div>
            </a>

                <p class="pt-3 text-xl text-center text-gray-600">Welcome back!</p>

                <x-jet-validation-errors class="mt-4" />

                @if (session('status'))
                    <div class="mt-4 text-sm font-medium text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="mt-10">
                    @csrf

                    <div>
                        <input type="email" name="email" :value="old('email')" placeholder="Enter your email" class="block w-full mt-1 bg-gray-100 border-none shadow-lg h-11 rounded-xl hover:bg-blue-100 focus:bg-blue-100 focus:ring-0">
                    </div>

                    <div class="mt-7">
                        <input type="password" name="password" placeholder="Enter your password" class="block w-full mt-1 bg-gray-100 border-none shadow-lg h-11 rounded-xl hover:bg-blue-100 focus:bg-blue-100 focus:ring-0" autocomplete="current-password">
                    </div>

                    <div class="flex mt-7">
                        <label for="remember_me" class="inline-flex items-center w-full cursor-pointer">
                            <input name="remember" id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-600">
                                {{ __('Remember me') }}
                            </span>
                        </label>

                       <div class="w-full text-right">
                           @if (Route::has('password.request'))
                           <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                           @endif
                       </div>
                    </div>

                    <div class="mt-7">
                        <button class="w-full py-3 text-white transition duration-500 ease-in-out transform bg-blue-500 shadow-xl rounded-xl hover:shadow-inner focus:outline-none hover:-translate-x hover:scale-105">
                            {{ __('Log in') }}
                        </button>
                    </div>

                    <div class="flex items-center text-center mt-7">
                        <hr class="w-full border-gray-300 rounded-md border-1">
                        <label class="block w-full text-sm font-medium text-gray-600">
                            Login with
                        </label>
                        <hr class="w-full border-gray-300 rounded-md border-1">
                    </div>

                    {{-- <div class="flex justify-center w-full mt-7">
                        <button class="px-4 py-2 mr-5 text-white transition duration-500 ease-in-out transform bg-blue-500 border-none shadow-xl cursor-pointer rounded-xl hover:shadow-inner hover:-translate-x hover:scale-105">
                            Facebook
                        </button>

                        <button class="px-4 py-2 text-white transition duration-500 ease-in-out transform bg-red-500 border-none shadow-xl cursor-pointer rounded-xl hover:shadow-inner hover:-translate-x hover:scale-105">
                            Google
                        </button>
                    </div> --}}

                     <div class="mt-7">
                        <div class="flex items-center justify-center">
                            <label class="mr-2" >You're new?</label>
                            <a href="{{'register'}}" class="text-blue-500 transition duration-500 ease-in-out transform hover:-translate-x hover:scale-105">
                                Create an account
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
</x-guest-layout>
