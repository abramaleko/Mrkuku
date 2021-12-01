<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="title" content="Mr Kuku">
    <meta name="description"
        content="Kuza kipato chako kwa asilimia 10 kila mwezi ukiwekeza katika mradi wa Mr kuku">
    <meta name="keywords"
        content="Kuza kipato chako,modern poultry farming, broiler chicken farm,kuku wa broiler,grow your income">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="author" content="Tariq Machibya">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')

    <!-- Styles -->
    <link rel="stylesheet" rel="icno" type="image/x-icon" href="{{ asset('images/logo.ico') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    @yield('styles')

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">

    <div class="min-h-screen bg-white">
        <!-- component -->
        <div class="bg-blue-500">
            <nav class="relative flex items-center justify-between px-4 py-4 bg-white">
                <a class="ml-4 leading-none" href="{{ route('home') }}">
                    <x-jet-application-mark class="block w-auto h-9" />
                </a>
                <div class="lg:hidden">
                    <button class="flex items-center p-3 text-blue-600 navbar-burger">
                        <svg class="block w-4 h-4 fill-current" viewBox="0 0 20 20" xmlns="https://www.w3.org/2000/svg">
                            <title>Mobile menu</title>
                            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                        </svg>
                    </button>
                </div>
                <ul
                    class="absolute hidden transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 lg:flex lg:mx-auto lg:items-center lg:w-auto lg:space-x-6">
                    <li>
                        <a class="text-gray-400 lg:text-lg hover:text-gray-500 {{ request()->routeIs('home') ? 'font-semibold text-blue-500' : '' }}"
                            href="{{ route('home') }}">
                            Home
                        </a>
                    </li>
                    <li class="text-gray-300">
                        <svg xmlns="https://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                            class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                        </svg>
                    </li>
                    <li><a class="text-gray-600 hover:text-gray-500 lg:text-lg {{ request()->routeIs('investments') ? 'font-semibold text-blue-500' : '' }}"
                            href="{{ route('investments') }}">
                            Investments
                        </a>
                    </li>
                    <li class="text-gray-300">
                        <svg xmlns="https://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                            class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                        </svg>
                    </li>
                    <li>
                        <a class="text-gray-600 hover:text-gray-500 lg:text-lg {{ request()->routeIs('blog.allPosts') ? 'font-semibold text-blue-500' : '' }}"
                            href="{{ route('blog.allPosts') }}">
                            Blog
                        </a>
                    </li>
                    <li class="text-gray-300">
                        <svg xmlns="https://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                            class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                        </svg>
                    </li>
                    <li>
                        <a class="lg:text-lg text-gray-600 hover:text-gray-500 {{ request()->routeIs('learn') ? 'font-semibold text-blue-500' : '' }}"
                            href="{{ route('learn') }}">
                            Learn
                        </a>
                    </li>
                    <li class="text-gray-300">
                        <svg xmlns="https://www.w3.org/2000/svg" fill="none" stroke="currentColor"
                            class="w-4 h-4 current-fill" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 5v0m0 7v0m0 7v0m0-13a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                        </svg>
                    </li>
                    <li><a class=" lg:text-lg text-gray-600 hover:text-gray-500 {{ request()->routeIs('contact') ? 'font-semibold text-blue-500' : '' }}"
                            href="{{ route('contact') }}">
                            Contact
                        </a>
                    </li>
                </ul>
                @guest
                    <a class="hidden px-6 py-3 text-sm font-bold text-white transition duration-200 bg-gray-500 lg:inline-block lg:ml-auto lg:mr-3 hover:bg-gray-600 rounded-xl"
                        href="{{ route('login') }}">Sign In</a>
                    <a class="hidden px-6 py-3 text-sm font-bold text-white transition duration-200 bg-blue-500 lg:inline-block hover:bg-blue-600 rounded-xl"
                        href="{{ route('register') }}">Sign up</a>
                @endguest
                @auth
                    <a class="hidden py-3 text-sm font-bold tracking-wider text-white transition duration-200 bg-gray-500 rounded px-7 lg:inline-block lg:ml-auto lg:mr-3 hover:bg-gray-600"
                        href="{{ route('dashboard') }}">Dashboard</a>
                @endauth
            </nav>
            <div class="relative z-50 hidden navbar-menu">
                <div class="fixed inset-0 bg-gray-800 opacity-25 navbar-backdrop"></div>
                <nav
                    class="fixed top-0 bottom-0 left-0 flex flex-col w-5/6 max-w-sm px-6 py-6 overflow-y-auto bg-white border-r">
                    <div class="flex items-center mb-8">
                        <a class="mr-auto text-3xl leading-none" href="{{ route('home') }}">
                            <div class="ml-2">
                                <span class="block text-2xl tracking-tighter">Mr Kuku</span>
                                <span class="block pt-1 text-sm text-gray-500">Your success is our legacy</span>

                            </div>
                        </a>
                        <button class="navbar-close">
                            <svg class="w-6 h-6 text-gray-400 cursor-pointer hover:text-gray-500"
                                xmlns="https://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div>
                        <ul>
                            <li class="mb-1">
                                <a class="block p-4 text-sm font-semibold text-gray-400 rounded hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('home') ? 'font-semibold text-blue-500' : '' }}"
                                    href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="mb-1">
                                <a class="block p-4 text-sm font-semibold text-gray-400 rounded hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('investments') ? 'font-semibold text-blue-500' : '' }}"
                                    href="{{ route('investments') }}">Investments</a>
                            </li>
                            <li class="mb-1">
                                <a class="block p-4 text-sm font-semibold text-gray-400 rounded hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('blog.allPosts') ? 'font-semibold text-blue-500' : '' }}"
                                    href="{{ route('blog.allPosts') }}">Blog</a>
                            </li>
                            <li class="mb-1">
                                <a class="block p-4 text-sm font-semibold text-gray-400 rounded hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('learn') ? 'font-semibold text-blue-500' : '' }}"
                                    href="{{ route('learn') }}">Learn</a>
                            </li>
                            <li class="mb-1">
                                <a class="block p-4 text-sm font-semibold text-gray-400 rounded hover:bg-blue-50 hover:text-blue-600 {{ request()->routeIs('contact') ? 'font-semibold text-blue-500' : '' }}"
                                    href="{{ route('contact') }}">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-auto">
                        @guest
                            <div class="pt-6">
                                <a class="block px-4 py-3 mb-3 text-xs font-semibold leading-loose text-center text-white bg-gray-500 hover:bg-gray-600 rounded-xl"
                                    href="{{ route('login') }}">Sign in</a>
                                <a class="block px-4 py-3 mb-2 text-xs font-semibold leading-loose text-center text-white bg-blue-600 hover:bg-blue-700 rounded-xl"
                                    href="{{ route('register') }}">Sign Up</a>
                            </div>
                        @endguest
                        @auth
                            <a class="block px-4 py-3 mb-3 text-xs font-semibold leading-loose text-center text-white bg-gray-500 hover:bg-gray-600 rounded-xl"
                                href="{{ route('dashboard') }}">Dashboard</a>
                        @endauth

                        <p class="my-4 text-xs text-center text-gray-400">
                            <span>2021 © Mr Kuku Farmers Ltd</span>
                        </p>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        <div class="pt-8 footer" style="  clear: both;
    position: relative;
    height: 20rem;
    background-color: #FFFFFF;">
            <div class="pb-6 border-t-2 border-gray-300 border-dashed "></div>
            <nav class="flex flex-wrap justify-center mx-6 mb-4">
                <div class="px-6 py-2">
                    <a href="{{ route('home') }}" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                        Home
                    </a>
                </div>
                <div class="px-6 py-2">
                    <a href="{{ route('investments') }}"
                        class="text-base leading-6 text-gray-500 hover:text-gray-900">
                        Investments
                    </a>
                </div>
                <div class="px-6 py-2">
                    <a href="{{ route('blog.allPosts') }}"
                        class="text-base leading-6 text-gray-500 hover:text-gray-900">
                        Blog
                    </a>
                </div>
                <div class="px-6 py-2">
                    <a href="{{ route('learn') }}" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                        Learn
                    </a>
                </div>
                <div class="px-6 py-2">
                    <a href="{{ route('contact') }}" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                        Contact
                    </a>
                </div>
            </nav>
            {{-- social-netoworks --}}
            <div class="flex justify-center social-networks pt-7">
                <a href="https://www.facebook.com/mrkukufarmersltd" target="_blank" class="no-underline">
                    <img src="{{ asset('images/social-icons/facebook.png') }}" alt="Mr kuku facebook account"
                        class="w-10 h-10 ">
                </a>
                <a href="https://twitter.com/farmers_mr" target="_blank" class="ml-4 no-underline">
                    <img src="{{ asset('images/social-icons/twitter.png') }}" alt="Mr kuku facebook account"
                        class="w-10 h-10 ">
                </a>
                <a href="https://www.instagram.com/mrkuku_farmers/" target="_blank" class="ml-4 no-underline">
                    <img src="{{ asset('images/social-icons/instagram.png') }}" alt="Mr kuku facebook account"
                        class="w-10 h-10 ">
                </a>
                <a href="https://www.youtube.com/channel/UCP1w4_BLqE3V78KoXYM2Ftg" target="_blank"
                    class="ml-4 no-underline">
                    <img src="{{ asset('images/social-icons/youtube.png') }}" alt="Mr kuku facebook account"
                        class="w-10 h-10 ">
                </a>
                <a href="https://www.linkedin.com/company/mrkukufarmerslimited/mycompany/" class="ml-4 no-underline"
                    target="_blank">
                    <img src="{{ asset('images/social-icons/linkedin.png') }}" alt="Mr kuku facebook account"
                        class="w-10 h-10 ">
                </a>
            </div>

            <div class="my-3">
                <p class="py-4 text-base tracking-widest text-center text-gray-500 ">
                    Email : info@mrkuku.org
                </p>
                <p class="text-base tracking-widest text-center text-gray-500 ">
                    Call us :  +255 659 071 309

                </p>
                <p class="pt-4 text-base tracking-widest text-center text-gray-500 ">
                    <a target="_blank"  href="{{ route('terms.show') }}" class="text-base leading-6 text-gray-500 hover:text-gray-900 hover:underline">
                        Terms of Service
                    </a>

                </p>
                <p class="pt-4 text-base tracking-widest text-center text-gray-500 ">
                    <a target="_blank" href="{{ route('policy.show') }}" class="text-base leading-6 text-gray-500 hover:text-gray-900 hover:underline">
                        Privacy Policy
                    </a>

                </p>
                <p class="py-4 text-base tracking-widest text-center text-gray-500 ">
                    &copy; 2021 Mr Kuku Ltd, All rights reserved.
                </p>
            </div>

        </div>
        <script>
            // Burger menus
            document.addEventListener('DOMContentLoaded', function() {
                // open
                const burger = document.querySelectorAll('.navbar-burger');
                const menu = document.querySelectorAll('.navbar-menu');

                if (burger.length && menu.length) {
                    for (var i = 0; i < burger.length; i++) {
                        burger[i].addEventListener('click', function() {
                            for (var j = 0; j < menu.length; j++) {
                                menu[j].classList.toggle('hidden');
                            }
                        });
                    }
                }

                // close
                const close = document.querySelectorAll('.navbar-close');
                const backdrop = document.querySelectorAll('.navbar-backdrop');

                if (close.length) {
                    for (var i = 0; i < close.length; i++) {
                        close[i].addEventListener('click', function() {
                            for (var j = 0; j < menu.length; j++) {
                                menu[j].classList.toggle('hidden');
                            }
                        });
                    }
                }

                if (backdrop.length) {
                    for (var i = 0; i < backdrop.length; i++) {
                        backdrop[i].addEventListener('click', function() {
                            for (var j = 0; j < menu.length; j++) {
                                menu[j].classList.toggle('hidden');
                            }
                        });
                    }
                }
            });
        </script>
        @yield('scripts')

</body>

</html>
