<x-app-layout>
    <x-slot name="title">
            {{ __('Dashboard') }}
    </x-slot>

    <div class="container flex flex-wrap justify-center px-6 py-6 mx-auto mt-24">
<div class="">
    <img src="{{asset('images/coming-soon.png')}}" alt="coming-soon" class="w-40 h-40 lg:h-48 lg:w-48">
</div>
<div class="mt-8 lg:ml-8">
    <h1 class="text-2xl font-semibold text-gray-600 lg:text-3xl">System Will Be live Soon</h1>
    <p class="my-4 text-lg leading-loose text-gray-800">
        If you have any concerns please leave us a message <a href="{{route('contact')}}" class="text-blue-500 hover:underline"> here </a>
        or call us at +255-659-071-309 and
        we will get back to you as soon as we can
    </p>

</div>
    </div>
</x-app-layout>
