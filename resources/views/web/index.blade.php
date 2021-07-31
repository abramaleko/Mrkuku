@extends('layouts.app1')
@section('content')
    {{-- header section --}}
    <div class="header grid grid-cols-2 px-3 pt-8 my-8 gap-20">

        <div class="header-text block px-10">
            <h2 class="font-bold tracking-wide" style="font-size: 35px">INVEST WITH US AND GROW YOUR INCOME *10% MORE IN
                EVERY MONTH</h2>
            <p class=" font-extralight text-gray-400 pt-6" style="font-size: 22px; font-family: 'Raleway', sans-serif;">
                Our modern poultry farm capable of rearing up to 1 Million chickens, invest and you can be one of
                the owners of the chickens.
            </p>
            <p class="py-2 text-gray-600 font-bold text-center"
                style="font-size: 22px; font-style:italic; font-family: 'Raleway', sans-serif;">
                What are you waiting for?
            </p>
            <div class="flex justify-center pt-3">
                <a href="{{ route('register') }}"
                    class="px-12 py-4 border bg-blue-500 text-white font-light tracking-wider shadow-lg hover:bg-blue-400">
                    REGISTER NOW
                </a>
            </div>
        </div>

        <div class="">
            <img src="{{ asset('images/chick1.jpg') }}" class="block"
                style="width: 600px; height:440px; border-radius:2rem;">
        </div>

    </div>

    {{-- investment section --}}
    <div class="invest grid grid-cols-2 px-3 pt-8 gap-20" style="margin-top: 7rem;">

        <div class="farm mx-8">
            <img src="{{ asset('images/farm.jpg') }}" class="block"
                style="width: 600px; height:440px; border-radius:2rem;">
        </div>

        <div class="invest-text block px-10">
            <h2 class="font-bold tracking-wide" style="font-size: 35px;">
                WHY INVEST WITH US ?
            </h2>
            <ol class="list-disc py-6 text-gray-500">
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
                    class="px-12 py-4 border bg-green-500 text-white font-light tracking-wider shadow-lg hover:bg-green-400">
                    LEARN MORE
                </a>
            </div>
        </div>
    </div>

    <div class="company bg-gray-200" style="margin-top:7rem;">
        <h2 class="font-bold tracking-wide text-center py-8" style="font-size: 32px; ">
            MESSAGE FROM OUR CEO
        </h2>
        <div class="flex justify-center py-6">
            <iframe width="940" height="391" src="https://www.youtube.com/embed/RcQUjDmlsuU?list=TLGGoJzJ6EqJUb8zMDA3MjAyMQ"
                title="YouTube video player" frameborder="0"
                class="rounded-md"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
    </div>

    <div class="companies" style="margin-top: 4rem;">
        <h2 class="font-bold tracking-wide text-center py-8" style="font-size: 32px;">
            OUR COMPANIES
        </h2>
        <div class="grid grid-cols-4 my-4 px-16" style="font-family: 'Raleway', sans-serif; font-style:italic;">

            <div class="mrkuku">
                <div class="border-0 pb-4">
                    <img src="{{ asset('images/logo.jpeg') }}" alt="Mr kuku" style="width: 253px; height:250px;"
                        class="bg-black  block">
                </div>
                <span class="text-base">MR KUKU FARMERS LTD</span>
            </div>

            <div class="agro">
                <div class="border-0 pb-4 ">
                    <img src="{{ asset('images/agro.jpg') }}" alt="Mr kuku" style="width: 253px; height:250px;"
                        class="bg-black block ">
                </div>
                <span class="text-base">AGRO FUNDERS LTD</span>

            </div>

            <div class="tasam">
                <div class="border-0 pb-4">
                    <img src="{{ asset('images/TASAM.jpg') }}" alt="Mr kuku" style="width: 253px; height:250px;"
                        class="bg-black block">
                </div>
                <span class="text-base">TASAM ENTERTAINMENT</span>

            </div>

            <div class="bravo">
                <div class="border-0 pb-4">
                    <img src="{{ asset('images/bravo.jpg') }}" alt="Mr kuku" style="width: 253px; height:250px;"
                        class="bg-black block">
                </div>
                <span class="text-base">BRAVO FEEDS MILL LIMITED</span>

            </div>

        </div>

    </div>

    <div class="newsletter bg-gray-900 text-white" style="margin-top: 5rem;">
        <h2 class="font-bold tracking-wide text-center py-8" style="font-size: 32px;">
            SUBSCRIBE TO OUR NEWSLETTER
        </h2>
        <p class=" font-extralight text-center" style="font-size: 22px; font-family: 'Raleway', sans-serif;">
            Receive our News, Insights & Opinions
        </p>
        <div class="flex justify-center my-8 pb-36">
            <form action="">
                @csrf
                <input type="text" class="px-4 py-3 border-2 w-96 focus:border-black text-gray-500" placeholder="Enter your email address">
                <button
                    type="submit"
                    class="ml-4 px-12 py-3 border-2 hover:text-black hover:bg-white bg-gray-900 text-white font-light tracking-wider shadow-lg">
                    SUBSCRIBE
                </button>
            </form>

        </div>


    </div>


@endsection
