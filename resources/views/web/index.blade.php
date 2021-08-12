@extends('layouts.app1')
@section('title')
<title>Mr Kuku</title>
@endsection
@section('styles')
 <link rel="stylesheet" href="{{asset('css/home.css')}}">
@endsection
@section('content')
    {{-- header section --}}
    <div class="grid grid-cols-1 px-3 pt-8 my-8 header md:grid-cols-2 md:gap-20">

        <div class="block px-8 md:px-10">
            <h2 class="font-bold tracking-wide header-text">INVEST WITH US AND GROW YOUR INCOME *10% MORE IN
                EVERY MONTH</h2>
            <p class="pt-6 text-gray-400 font-extralight" style="font-size: 22px; font-family: 'Raleway', sans-serif;">
                Our modern poultry farm capable of rearing up to 1 Million chickens, invest and you can be one of
                the owners of the chickens.
            </p>
            <p class="py-2 font-bold text-center text-gray-600"
                style="font-size: 22px; font-style:italic; font-family: 'Raleway', sans-serif;">
                What are you waiting for?
            </p>
            <div class="flex justify-center pt-3">
                <a href="{{ route('register') }}"
                    class="px-12 py-4 font-light tracking-wider text-white bg-blue-500 border shadow-lg hover:bg-blue-400">
                    REGISTER NOW
                </a>
            </div>
        </div>

        <div class="hidden md:block">
            <img src="{{ asset('images/farm.jpg') }}"
                style="width: 600px; height:440px; border-radius:2rem;">
        </div>

    </div>

    {{-- investment section --}}
    <div class="grid grid-cols-1 gap-20 px-3 pt-8 invest md:grid-cols-2">

        <div class="hidden mx-8 farm md:block">
            <img src="{{ asset('images/chicks.jpg') }}" class="block"
                style="width: 600px; height:440px; border-radius:2rem;">
        </div>

        <div class="block px-4 invest-text md:px-10">
            <h2 class="font-bold tracking-tight header-invest" style="font-size: 35px;">
                WHY INVEST WITH US ?
            </h2>
            <ol class="px-3 py-6 text-gray-500 list-disc md:px-0">
                <li class="py-2 text-base">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                <li class="py-2 text-base">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                <li class="py-2 text-base">Proin vitae nibh id mauris sagittis convallis.</li>
                <li class="py-2 text-base">Etiam tincidunt dolor euismod velit sagittis, tincidunt vestibulum risus feugiat.
                </li>
                <li class="py-2 text-base">Maecenas lobortis orci a mauris vulputate, id auctor tellus lobortis.</li>
                <li class="py-2 text-base">Quisque ultricies leo id elit venenatis dapibus.</li>
            </ol>
            <div class="flex justify-center pt-3">
                <a href="{{ route('learn') }}"
                    class="px-12 py-4 font-light tracking-wider text-white bg-green-500 border shadow-lg hover:bg-green-400">
                    LEARN MORE
                </a>
            </div>
        </div>
    </div>

    <div class="bg-gray-200 video" style="margin-top:7rem;">
        <h2 class="py-8 font-bold tracking-wide text-center header-text">
            MESSAGE FROM OUR CEO
        </h2>
        <div class="flex justify-center py-6">
            <iframe width="940" height="391" src="https://www.youtube.com/embed/RcQUjDmlsuU"
                title="YouTube video player" frameborder="0"
                class="rounded-md youtube-video"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
    </div>

    <div class="companies" style="margin-top: 4rem;">
        <h2 class="py-8 font-bold tracking-wide text-center" style="font-size: 32px;">
            OUR COMPANIES
        </h2>
        <div class="grid grid-cols-1 px-16 my-4 md:grid-cols-4" style="font-family: 'Raleway', sans-serif; font-style:italic;">

            <div class="mb-4 mrkuku md:mb-0">
                <div class="border-0 md:pb-4">
                    <img src="{{ asset('images/logo.jpeg') }}" alt="Mr kuku" style="width: 253px; height:250px;"
                        class="block bg-black">
                </div>
                <span class="text-lg md:text-base">MR KUKU FARMERS LTD</span>
            </div>

            <div class="mb-4 agro md:mb-0">
                <div class="border-0 md:pb-4 ">
                    <img src="{{ asset('images/agro.jpg') }}" alt="Mr kuku" style="width: 253px; height:250px;"
                        class="block bg-black ">
                </div>
                <span class="text-lg md:text-base">AGRO FUNDERS LTD</span>

            </div>

            <div class="mb-4 tasam md:mb-0">
                <div class="border-0 md:pb-4">
                    <img src="{{ asset('images/TASAM.jpg') }}" alt="Mr kuku" style="width: 253px; height:250px;"
                        class="block bg-black">
                </div>
                <span class="text-lg md:text-base">TASAM ENTERTAINMENT</span>

            </div>

            <div class="mb-4 bravo md:mb-0">
                <div class="border-0 md:pb-4">
                    <img src="{{ asset('images/bravo.jpg') }}" alt="Mr kuku" style="width: 253px; height:250px;"
                        class="block bg-black">
                </div>
                <span class="text-lg md:text-base">BRAVO FEEDS MILL LIMITED</span>

            </div>

        </div>

    </div>

    <div class="text-white bg-gray-900 newsletter">
        <h2 class="py-8 font-bold tracking-wide text-center header-text">
            SUBSCRIBE TO OUR NEWSLETTER
        </h2>
        <p class="text-center header-text2 font-extralight" style="">
            Receive our News, Insights & Opinions
        </p>
        <div class="flex flex-wrap justify-center mt-8 pb-36">
            <form action="">
                @csrf
                <input type="text" class="px-4 py-2 text-gray-500 border-2 lg:py-3 lg:w-96 focus:border-black" placeholder="Enter your email address">
                <button
                    type="submit"
                    class="px-12 py-3 ml-4 font-light tracking-wider text-white bg-gray-900 border-2 shadow-lg subscribe hover:text-black hover:bg-white">
                    SUBSCRIBE
                </button>
            </form>

        </div>


    </div>


@endsection
