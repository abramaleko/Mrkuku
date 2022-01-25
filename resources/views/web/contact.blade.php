@extends('layouts.app1')
@section('title')
    <title>Contact Us </title>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <style>

    </style>
@endsection
@section('content')
    <div class="grid grid-cols-1 mx-4 mt-8 lg:mx-10 lg:gap-4 lg:grid-cols-2">
       <div class="">
           <img src="{{asset('images/contact.svg')}}" alt="contact us" class="">
       </div>

       <div class="ml-4">
        <h2 class="mt-4 text-xl font-bold tracking-wider text-left text-gray-600 lg:mt-8 lg:text-4xl">We'd Love to Hear From
            you
        </h2>
        <p class="mt-4 text-sm font-light leading-relaxed tracking-tight text-left text-gray-500 lg:text-base">
            Whether you are curious about anything, were ready to answer any and all questions
        </p>
        <div class="mt-8">
            <a href="{{route('investor.support')}}"
                class="py-4 text-base font-light text-white bg-red-500 rounded shadow-2xl lg:tracking-wide px-9 hover:bg-red-400">
                  LEAVE MESSAGE
                </a>
        </div>
    </div>
    </div>

      {{-- call us section --}}
      <div class="grid grid-cols-1 mx-10 my-16 header lg:grid-cols-2 lg:gap-20 contact">

        <div class="block lg:px-10">
            <h2 class="mt-8 text-3xl font-bold text-gray-700 lg:text-4xl ">You Can Call Us at</h2>
            <h3 class="my-8 text-xl italic text-gray-700 lg:text-3xl number">
                +255 659 071 309
            </h3>
            <p class="text-lg font-light leading-relaxed tracking-tight text-left text-gray-500 lg:pt-6 lg:text-xl ">
                Our Call center number is available from Monday to Saturday at 09:00 am to 05:00 pm, feel free to call if
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
            <h2 class="mt-8 text-3xl font-bold text-gray-700 lg:text-4xl">
                You Can Visit Us at
            </h2>
            <p class="my-4 text-base font-light leading-tight tracking-tight text-left text-gray-500 lg:my-2">
                We are open from Monday to Saturday starting from 08:30 am - 05:00 pm
            </p>
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
            <h3 class="my-4 text-xl font-bold text-gray-600">Our Branches</h3>
            <div class="flex flex-wrap">
                <!-- Dar free market branch -->
                <div class="branch">
                    <p class="text-lg text-gray-600">Dar es Salaam, Tanzania</p>
                    <p class="text-base text-gray-600">Dar Free Market Mall, Ali Hassan Mwinyi road
                        <a target="_blank"
                        href="https://www.google.com/maps/place/Mr+kuku+farmers+limited/@-6.7846763,39.2749704,20z/data=!4m5!3m4!1s0x185c4ddec3891e2b:0xa03bb6675f49ea33!8m2!3d-6.7847019!4d39.2771171">
                            <img src="{{ asset('images/map.png') }}" class="w-10 h-10 my-2">
                        </a>
                </div>

                <!-- Kariakoo branch -->
                <div class="branch lg:ml-40 ">
                    <p class="text-lg text-gray-600">Dar es Salaam, Tanzania</p>
                    <p class="text-base text-gray-600">Kariakoo, Street Livingstone & Kipata
                        <a href="/">
                            <img src="{{ asset('images/map.png') }}" class="w-10 h-10 my-2">
                        </a>
                </div>
            </div>

        </div>

    </div>

@endsection

