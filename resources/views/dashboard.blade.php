<x-app-layout>
    <x-slot name="title">
            {{ __('Dashboard') }}
    </x-slot>
    <x-slot name="styles">
       <style>
           main
           {
               background-color: #ffff !important;
           }
       </style>
    </x-slot>

    <div class="container px-6 py-6 mx-auto">
       <div class="flex justify-center">
           <img src="{{asset('images/construction.jpeg')}}" alt="construction" class="w-auto">
       </div>
       <h1 class="px-4 py-8 text-3xl leading-normal tracking-tight text-gray-700">
        We are currently under construction, we will soon contact you when construction is finished
    </h1>
    <h2 class="text-lg font-light leading-normal tracking-tight text-gray-600">
        If you have any concerns please leave us a message <a href="{{route('contact')}}" class="text-blue-500 hover:underline"> here </a> and
        we will contact you as soon as we can
    </h2>
    </div>
</x-app-layout>
