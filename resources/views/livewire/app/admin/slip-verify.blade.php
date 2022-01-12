    {{-- Success is as dangerous as failure. --}}
    <x-slot name="title">
        {{ __('Verification Center') }}
    </x-slot>

    <div class="container px-6 py-8 mx-auto" x-data="{openPending:true}">
        <h1 class="text-2xl font-bold text-gray-700 lg:text-3xl lg:py-0 ">
            Verification Center
        </h1>
        <p class="mt-4 text-lg leading-relaxed text-justify text-gray-500 font-extralight">
            Here you can verify investor's payment slips and also review payment slips verified by you.

        </p>

        <div style='border-bottom: 1px solid #141414' class="mt-8">
            <ul class='flex cursor-pointer'>
              <li :class="openPending ? 'bg-blue-500 text-white' : 'text-gray-700 bg-white'"
              class='px-6 py-2 rounded-t-lg'
              @click="openPending=true">
              Pending Verification
            </li>
              <li :class="!openPending ? 'bg-blue-500 text-white' : 'text-gray-700 bg-white'"
              class='px-8 py-2 rounded-t-lg'
               @click="openPending=false">
               Verified
            </li>
            </ul>
        </div>

        <!-- pending slips-->
        <div class="mt-8"  x-show="openPending" x-transition>
                @livewire('app.admin.pending-slips')
        </div>

        <!-- verified slips-->
        <div class="mt-8" x-cloak  x-show="!openPending" x-transition>
            @livewire('app.admin.verified-slips')
       </div>


    </div>

