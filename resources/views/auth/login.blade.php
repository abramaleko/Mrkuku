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
                            OR
                        </label>
                        <hr class="w-full border-gray-300 rounded-md border-1">
                    </div>

                    <a href="{{route('google-signIn')}}" class="flex items-center justify-center mt-4 text-white rounded-lg shadow-md hover:bg-gray-800">
                        <div class="px-4 py-3">
                            <svg class="w-6 h-6" viewBox="0 0 40 40">
                                <path d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.045 27.2142 24.3525 30 20 30C14.4775 30 10 25.5225 10 20C10 14.4775 14.4775 9.99999 20 9.99999C22.5492 9.99999 24.8683 10.9617 26.6342 12.5325L31.3483 7.81833C28.3717 5.04416 24.39 3.33333 20 3.33333C10.7958 3.33333 3.33335 10.7958 3.33335 20C3.33335 29.2042 10.7958 36.6667 20 36.6667C29.2042 36.6667 36.6667 29.2042 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z" fill="#FFC107"/>
                                <path d="M5.25497 12.2425L10.7308 16.2583C12.2125 12.59 15.8008 9.99999 20 9.99999C22.5491 9.99999 24.8683 10.9617 26.6341 12.5325L31.3483 7.81833C28.3716 5.04416 24.39 3.33333 20 3.33333C13.5983 3.33333 8.04663 6.94749 5.25497 12.2425Z" fill="#FF3D00"/>
                                <path d="M20 36.6667C24.305 36.6667 28.2167 35.0192 31.1742 32.34L26.0159 27.975C24.3425 29.2425 22.2625 30 20 30C15.665 30 11.9842 27.2359 10.5975 23.3784L5.16254 27.5659C7.92087 32.9634 13.5225 36.6667 20 36.6667Z" fill="#4CAF50"/>
                                <path d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.7592 25.1975 27.56 26.805 26.0133 27.9758C26.0142 27.975 26.015 27.975 26.0158 27.9742L31.1742 32.3392C30.8092 32.6708 36.6667 28.3333 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z" fill="#1976D2"/>
                            </svg>
                        </div>
                        <h1 class="w-5/6 px-4 py-3 font-bold text-center text-gray-600 hover:text-white">Sign in with Google</h1>
                    </a>

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
