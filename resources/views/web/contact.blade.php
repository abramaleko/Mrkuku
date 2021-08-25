@extends('layouts.app1')
@section('title')
    <title>Contact Us </title>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection
@section('content')
    <div class="grid grid-cols-1 mx-4 mt-8 lg:mx-10 lg:gap-4 lg:grid-cols-2">
        <div class="">
            <h2 class="mt-4 text-xl font-bold tracking-wider text-left text-gray-600 lg:mt-8 lg:text-4xl">We'd Love to Hear From
                you
            </h2>
            <p class="mt-4 text-sm font-light leading-relaxed tracking-tight text-left text-gray-500 lg:text-base">
                Whether you are curious about anything, were ready to answer any and all questions
            </p>
        </div>

    <div class="contact-form">
            <!-- success message -->
            @if (Session::has('success'))
            <div class="flex p-3 bg-green-100 rounded-md">
                <svg class="flex-shrink-0 w-8 h-8 mr-2 text-green-600 stroke-current stroke-2" viewBox="0 0 24 24"
                    fill="none" strokeLinecap="round" strokeLinejoin="round">
                    <path d="M0 0h24v24H0z" stroke="none" />
                    <circle cx="12" cy="12" r="9" />
                    <path d="M9 12l2 2 4-4" />
                </svg>

                <div class="text-green-700">
                    <div class="text-xl font-bold">Your message has been received!</div>

                    <div>
                        {{ Session::get('success') }}
                    </div>
                </div>
            </div>
            @endif

            <form action="{{ route('uploadContactMessage') }}" autocomplete="off" id="contactus" method="POST">
                @csrf
                <div class="mt-8 lg:mt-12">
                    <div class="my-8 lg:ml-8">
                        <label for="name" class="text-lg text-gray-700">Name :</label>
                        <input type="text" name="name" id="name" placeholder="Enter your full name"
                            class="px-4 py-3 ml-4 text-gray-600 border-b rounded-md ">
                            @error('name')
                              <span class="block my-2 text-sm font-bold text-red-600">
                                  {{$message}}
                              </span>
                            @enderror
                    </div>
                    <div class="my-8 lg:ml-8">
                        <label for="email" class="text-lg text-gray-700">Email :</label>
                        <input type="email" name="email" id="email" placeholder="Enter your email address"
                            class="px-4 py-3 ml-4 text-gray-600 border-b rounded-md ">
                            @error('email')
                            <span class="block my-2 text-sm font-bold text-red-600">
                                {{$message}}
                            </span>
                          @enderror
                    </div>

                    <div class="my-8 lg:ml-8">
                        <label for="phone_no" class="text-lg text-gray-700">Phone no :</label>
                        <input type="tel" name="phone_no" id="phone_no" placeholder="Enter your phone number"
                            class="px-4 py-3 ml-2 text-gray-600 border-b rounded-md ">
                            @error('phone_no')
                            <span class="block my-2 text-sm font-bold text-red-600">
                                {{$message}}
                            </span>
                          @enderror
                    </div>

                    <label class="block my-8 lg:ml-8">
                        <span class="text-lg text-gray-700">Message</span>
                        <textarea class="block px-4 mt-1 rounded-md" rows="5" name="context">
                             </textarea>
                             @error('context')
                             <span class="block my-2 text-sm font-bold text-red-600">
                                 {{$message}}
                             </span>
                           @enderror
                    </label>

                    <button id="recaptcha" data-sitekey="{{ config('services.recaptcha.sitekey') }}"
                        data-callback='onSubmit' data-action='submit'
                        class="flex justify-center px-12 py-4 mx-4 tracking-widest text-white uppercase bg-gray-800 border border-transparent rounded-md lg:ml-8 g-recaptcha hover:bg-gray-600">
                        SUBMIT
                    </button>
                </div>
            </form>
        </div>

    </div>
      {{-- call us section --}}
      <div class="grid grid-cols-1 mx-10 my-16 header lg:grid-cols-2 lg:gap-20 contact">

        <div class="block lg:px-10">
            <h2 class="mt-8 text-3xl font-bold text-gray-700 lg:text-4xl ">You can Call us at</h2>
            <h3 class="my-8 text-xl italic text-gray-700 lg:text-3xl number">
                +255-778-999-009
            </h3>

            <p class="text-gray-400 lg:pt-6 font-extralight" style="font-size: 22px; font-family: 'Raleway', sans-serif;">
                Our Call center number is available from Monday to Saturday at 09:00 am to 04:00 pm, feel free to call if
                you need
                any assistance from us.
            </p>
        </div>

        <div class="hidden md:block">
            <img src="{{ asset('images/phone.jpg') }}" style="width: 600px; height:440px; border-radius:2rem;">
        </div>
    </div>

    <div class="my-16 lg:mx-10 contact">
        <div class="px-8 md:px-10">
            <h2 class="mt-8 text-4xl font-bold text-gray-700">
                You can Visit Us at
            </h2>
            <p class="my-4 text-base font-light leading-tight tracking-tight text-left text-gray-500 lg:my-2">
                We are open from Monday to Saturday starting from 08:30 am - 05:00 pm
            </p>
            <h3 class="my-4 text-xl font-bold text-gray-600">Our Branches</h3>
            <div class="flex flex-wrap">
                <!-- Kariakoo branch -->
                <div class="branch">
                    <p class="text-lg text-gray-600">Dar es Salaam, Tanzania</p>
                    <p class="text-base text-gray-600">Kariakoo, Street Livingstone & Kipata
                        <a href="/">
                            <img src="{{ asset('images/map.png') }}" class="w-10 h-10 my-2">
                        </a>
                </div>

                <!-- Dar free market branch -->
                <div class="lg:ml-40 branch">
                    <p class="text-lg text-gray-600">Dar es Salaam, Tanzania</p>
                    <p class="text-base text-gray-600">Dar Free Market Mall, Ali Hassan Mwinyi road
                        <a href="/">
                            <img src="{{ asset('images/map.png') }}" class="w-10 h-10 my-2">
                        </a>
                </div>
            </div>
            <h3 class="my-4 text-xl font-bold text-gray-600">Our Headquaters</h3>
            <!-- HQ -->
            <div class="hq">
                <p class="text-lg text-gray-600">Dar es Salaam, Tanzania</p>
                <p class="text-base text-gray-600">Kisarawe2, Mbosai
                    <a href="https://www.google.com/maps/place/Mr+kuku+farmers+limited/@-6.9227259,39.3722372,17z/data=!3m1!4b1!4m5!3m4!1s0x185db5cda47e10e1:0xa395cf0a99209414!8m2!3d-6.9227303!4d39.3744202"
                        target="_blank">
                        <img src="{{ asset('images/map.png') }}" class="w-10 h-10 my-2">
                    </a>
            </div>
        </div>

    </div>

@endsection
@section('scripts')
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("contactus").submit();
        }
    </script>
@endsection
