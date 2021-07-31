<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MrKuku') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">

    <div class="min-h-screen bg-gray-100">
        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100 h- md:h-24 md:py-4">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-4">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('home') }}">
                                <x-jet-application-mark class="block h-9 w-auto" />
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ml-24 sm:flex">
                            <x-jet-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                                {{ __('Home') }}
                            </x-jet-nav-link>

                            <x-jet-nav-link href="{{ route('investments') }}"
                                :active="request()->routeIs('investments')">
                                {{ __('Investments') }}
                            </x-jet-nav-link>

                            <x-jet-nav-link href="{{ route('learn') }}" :active="request()->routeIs('learn')">
                                {{ __('Learn') }}
                            </x-jet-nav-link>

                            <x-jet-nav-link href="{{ route('company') }}" :active="request()->routeIs('company')">
                                {{ __('Company') }}
                            </x-jet-nav-link>

                            <x-jet-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                                {{ __('Contact') }}
                            </x-jet-nav-link>
                        </div>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ml-6">

                        <!-- if user is loged in link to dashboard if not login -->
                        @if (Auth::check())
                            <a href={{ 'dashboard' }}
                                class="bg-blue-500 border rounded-lg px-4 text-sm py-2  text-white text-center hover:bg-blue-400">
                                Dashboard
                            </a>
                        @else
                            <a href={{ 'login' }}
                                class="bg-red-500 border rounded-lg px-6 text-sm py-4 text-white text-center hover:bg-red-400 tracking-widest">
                                LOG IN
                            </a>
                        @endif
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <x-jet-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-jet-responsive-nav-link>

                    <x-jet-responsive-nav-link href="{{ route('learn') }}" :active="request()->routeIs('learn')">
                        {{ __('Learn') }}
                    </x-jet-responsive-nav-link>

                    <x-jet-responsive-nav-link href="{{ route('company') }}" :active="request()->routeIs('company')">
                        {{ __('Company') }}
                    </x-jet-responsive-nav-link>

                    <x-jet-responsive-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                        {{ __('Contact') }}
                    </x-jet-responsive-nav-link>
                </div>

                <!-- Responsive Settings Options -->
                <!-- if user is loged in link to dashboard if not login -->
                <div class="block mb-4">
                    @if (Auth::check())
                        <a href={{ 'dashboard' }}
                            class="border rounded-md px-3 py-2 ml-2 mb-2 bg-blue-400 text-white text-center">
                            Dashboard
                        </a>
                    @else
                        <a href={{ 'login' }}
                            class="border rounded-md px-3 py-2 ml-2 mb-2 bg-red-400 text-white text-center">
                            LOG IN
                        </a>
                    @endif
                </div>
            </div>
        </nav>
        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
     <footer class="pt-8">
           <nav class="flex flex-wrap justify-center mx-6 mb-4">
            <div class="px-6 py-2">
                <a href="{{route('home')}}" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                    Home
                </a>
            </div>
            <div class="px-6 py-2">
                <a href="{{route('investments')}}" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                    Investments
                </a>
            </div>
            <div class="px-6 py-2">
                <a href="{{route('learn')}}" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                    Learn
                </a>
            </div>
            <div class="px-6 py-2">
                <a href="{{route('company')}}" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                    Company
                </a>
            </div>
            <div class="px-6 py-2">
                <a href="{{route('contact')}}" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                    Contact
                </a>
            </div>
        </nav>
            {{-- social-netoworks --}}
            <div class="social-networks flex justify-center pt-7">
                <a href="https://www.facebook.com/mrkukufarmersltd" target="_blank"
                 class="no-underline">
                    <img src="{{ asset('images/social-icons/facebook.png') }}" alt="Mr kuku facebook account"
                        class=" w-10 h-10">
                </a>
                <a href="https://twitter.com/farmers_mr" target="_blank"
                 class="no-underline ml-4">
                    <img src="{{ asset('images/social-icons/twitter.png') }}" alt="Mr kuku facebook account"
                        class=" w-10 h-10">
                </a>
                <a href="https://www.instagram.com/mrkuku_farmers/" target="_blank"
                 class="no-underline ml-4">
                    <img src="{{ asset('images/social-icons/instagram.png') }}" alt="Mr kuku facebook account"
                        class=" w-10 h-10">
                </a>
                <a href="https://www.youtube.com/channel/UCP1w4_BLqE3V78KoXYM2Ftg" target="_blank"
                    class="no-underline ml-4">
                    <img src="{{ asset('images/social-icons/youtube.png') }}" alt="Mr kuku facebook account"
                        class=" w-10 h-10">
                </a>
                <a href="https://www.linkedin.com/company/mrkukufarmerslimited/mycompany/"
                 class="no-underline ml-4"
                    target="_blank">
                    <img src="{{ asset('images/social-icons/linkedin.png') }}" alt="Mr kuku facebook account"
                        class=" w-10 h-10">
                </a>
            </div>

            <div class="my-3">
                <p class=" text-gray-500 py-4 text-base text-center tracking-widest">
                    Email : info@mrkuku.org
                </p>
                <p class=" text-gray-500 text-base text-center tracking-widest">
                   Call us : 0778 999 009
                </p>
                <p class=" text-gray-500 py-6 text-base text-center tracking-widest">
                   &copy; 2021 Mr Kuku Ltd, All rights reserved.
                </p>
            </div>

        </footer>


    </div>

</body>

</html>
