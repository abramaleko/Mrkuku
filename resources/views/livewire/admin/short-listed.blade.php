<div class="">
    @if (! $applicantDetails)
    <div class="p-8">
        <section class="max-w-4xl mt-8 antialiased text-gray-600 bg-gray-100 ">
            <div class="flex flex-col justify-center h-full">
                <!-- Table -->
                <div class="w-full bg-white border border-gray-200 rounded-md shadow-lg ">
                    <header class="flex flex-wrap px-5 py-4 border-b border-gray-100 lg:justify-between">
                        <div class="">
                            <h2 class="pt-4 text-xl font-semibold text-gray-800 ">
                               Shortlisted Applicants
                             </h2>
                        </div>
                        <div class="">
                            <div class="relative pt-2 mx-auto text-gray-600">
                                {{ $applicants->links() }}
                            </div>
                        </div>
                    </header>
                    <div class="p-3">
                        <div class="overflow-x-auto">
                            <table class="w-full table-auto">
                                <thead
                                    class="text-xs font-semibold text-gray-400 uppercase bg-gray-50 ">
                                    <tr>
                                     <th class="p-2 whitespace-nowrap">
                                         <div class="font-semibold text-left">S/N</div>
                                     </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Applicant Name</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                         <div class="font-semibold text-left">Applied On</div>
                                     </th>
                                        <th class="p-2 whitespace-nowrap">
                                         <div class="font-semibold text-center">Details</div>
                                     </th>
                                     <th class="p-2 whitespace-nowrap">
                                         <div class="font-semibold text-center">Delete</div>
                                     </th>

                                    </tr>
                                </thead>
                                <tbody class="text-sm divide-y divide-gray-100">
                                    @foreach ($applicants as $applicant)
                                        <tr class="hover:bg-blue-100 ">
                                         <td class="p-2 whitespace-nowrap">
                                             <div class="flex items-center">
                                                 <div class="font-medium ">
                                                     {{ $loop->iteration }}
                                                 </div>
                                             </div>
                                         </td>
                                            <td class="p-2 truncate whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="font-medium ">
                                                        {{ $applicant->user->name }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left">
                                                    {{ $applicant->created_at->diffForHumans() }}
                                                </div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-lg text-center">
                                                    <button wire:click="selectApplicant({{ $applicant->id }})"
                                                        class="inline-block text-center ">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="w-6 h-6 text-blue-400" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                 <div class="text-lg text-center">
                                                     <button wire:click="deleteApplication({{$applicant->id}})"
                                                         class="inline-block text-center cursor-pointer">
                                                         <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400" fill="none"
                                                             viewBox="0 0 24 24" stroke="currentColor">
                                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                 d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                         </svg>
                                                        </button>
                                                 </div>
                                             </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @else
    <div class="p-8">
        <a href="#" wire:click="resetSelected" class="block pb-8 text-lg font-bold text-blue-700 hover:underline w-36"> &#8612;GO BACK</a>

        <div class="flex flex-wrap">
            <div class="w-16 h-16 lg:h-32 lg:w-32">
                <img src="{{ $applicantDetails->user->profile_photo_url }}" class="object-cover w-full h-full rounded-full"
                    alt="{{ $applicantDetails->user->name }}">
            </div>
            <div class="ml-4 ">
                <p class="text-xl font-semibold text-gray-700 ">
                    {{ $applicantDetails->user->name }}
                </p>
                <p class="pt-2 text-lg font-light text-gray-700">
                    {{ $applicantDetails->user->email }}

                </p>
                <p class="pt-2 text-lg text-gray-700">
                    {{ $applicantDetails->user->phone_no }}
                </p>
            </div>
        </div>
        <div class="flex flex-wrap my-4">
            @if ($applicantDetails->shortlisted)
            <button wire:click="UnshortlistApplicant" class="px-6 py-4 text-white bg-gray-700 rounded hover:bg-gray-500">
                  Unshortlist Applicant
            </button>
            @else
            <button wire:click="shortlistApplicant" class="px-6 py-4 text-white bg-gray-700 rounded hover:bg-gray-500">
                Shortlist Applicant
            </button>
            @endif

            <button wire:click="deleteApplication({{$applicantDetails->id}})"
            class="px-6 py-4 mt-4 text-white bg-red-700 rounded hover:bg-red-500 lg:ml-4 lg:mt-0">
                Delete Application
            </button>
        </div>
        <div class="mt-8">
            <h3 class="text-xl font-semibold text-gray-600">Application Letter</h3>
            <div class="max-w-3xl p-4 my-4 bg-white rounded-md">
               {!! $applicantDetails->cover_letter !!}
            </div>
        </div>
        <div class="mt-8">
            <h3 class="text-xl font-semibold text-gray-600">Download CV and Certificates</h3>
            <button class="px-6 py-4 my-4 text-white bg-purple-700 rounded hover:bg-purple-500">
                DOWNLOAD FILES
            </button>
        </div>
     </div>
    @endif
</div>
