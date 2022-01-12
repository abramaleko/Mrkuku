<div>
    <section class="max-w-3xl antialiased text-gray-600 bg-gray-100">
        <div class="flex flex-col justify-center h-full">
            <!-- Table -->
            <div class="w-full bg-white border border-gray-200 rounded-sm shadow-lg ">
                <header class="flex flex-wrap px-5 py-4 border-b border-gray-100 lg:justify-between ">
                    <div class="">
                        <h2 class="pt-4 text-lg font-semibold text-gray-800">
                            Pending Slips
                        </h2>
                    </div>
                    <div class="">
                        <div class="relative pt-2 mx-auto text-gray-600">
                            <input
                                class="h-10 px-5 pr-16 text-sm bg-white border-2 border-gray-300 rounded-lg focus:outline-none"
                                type="search" wire:model="searchPending" placeholder="Search by name"
                                autocomplete="off">
                            <button type="submit" class="absolute top-0 right-0 mt-5 mr-4">
                                <svg class="w-4 h-4 text-gray-600 fill-current"
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                                    x="0px" y="0px" viewBox="0 0 56.966 56.966"
                                    style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                                    width="512px" height="512px">
                                    <path
                                        d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </header>
                <div class="pb-2">
                    <div class="overflow-x-auto">
                        <table class="w-full table-auto">
                            <thead
                            class="text-xs font-semibold text-black uppercase bg-gray-50">
                            <tr>
                                    <th class="p-4 whitespace-nowrap">
                                        <div class="font-semibold text-left">S/N</div>
                                    </th>
                                    <th class="p-4 whitespace-nowrap">
                                        <div class="font-semibold text-left">Invoice No</div>
                                    </th>
                                    <th class="p-4 whitespace-nowrap">
                                        <div class="font-semibold text-left">Investor Name</div>
                                    </th>
                                    <th class="p-4 whitespace-nowrap">
                                        <div class="font-semibold text-left">Submitted on</div>
                                    </th>
                                    <th class="p-4 whitespace-nowrap">
                                        <div class="font-semibold text-left">Details</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                <div wire:loading.delay wire:target="search">
                                    <span class="py-6 pl-8 text-base text-blue-800">
                                        Searching...
                                    </span>
                                </div>
                                @foreach ($pendingSlips as $slip)
                                <tr class="dark:text-light lg:hover:bg-blue-100 lg:dark:hover:text-gray-600 ">
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="font-medium ">
                                                {{ $loop->iteration }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">
                                            {{ $slip->invoice_number }}
                                        </div>
                                    </td>
                                    <td class="flex justify-start p-2 whitespace-nowrap">
                                        <div
                                            class="w-10 font-medium text-center ">
                                            {{ $slip->investor_name }}
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="font-medium text-left text-green-500">
                                            {{ Carbon\Carbon::parse($slip->updated_at)->format('jS F Y') }}
                                        </div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-lg text-center">
                                            <a href="{{route('admin.payment-detail',$slip->id)}}"
                                                class="inline-block text-center ">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-6 h-6 text-blue-400" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if (count($pendingSlips)===0)
                        <h3 class="my-4 text-lg text-center text-green-600 lg:text-2xl text-wide">
                            There is no pending slips to verify
                        </h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
