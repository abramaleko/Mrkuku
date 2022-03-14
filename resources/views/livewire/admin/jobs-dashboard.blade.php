<div class="p-8">
        @if (!$selectedJobDetails)
        <div class="mt-4">

        <a href="{{route('newJob')}}" class="px-8 py-2 text-white bg-gray-700 rounded-md hover:bg-gray-600">
            New Job
         </a>

        <section class="max-w-4xl mt-8 antialiased text-gray-600 bg-gray-100 ">
            <div class="flex flex-col justify-center h-full">
                <!-- Table -->
                <div class="w-full bg-white border border-gray-200 rounded-md shadow-lg ">
                    <header class="flex flex-wrap px-5 py-4 border-b border-gray-100 lg:justify-between">
                        <div class="">
                            <h2 class="pt-4 text-xl font-semibold text-gray-800 ">
                                Job Lists
                             </h2>
                        </div>
                        <div class="">
                            <div class="relative pt-2 mx-auto text-gray-600">
                                {{ $jobs->links() }}
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
                                            <div class="font-semibold text-center">Title</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                         <div class="font-semibold text-center">Application Deadline</div>
                                     </th>
                                        <th class="p-2 whitespace-nowrap">
                                            <div class="font-semibold text-left">Applicants</div>
                                        </th>
                                        <th class="p-2 whitespace-nowrap">
                                         <div class="font-semibold text-center">Details</div>
                                     </th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm divide-y divide-gray-100">
                                    @foreach ($jobs as $job)
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
                                                        {{ $job->job_title }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-left">
                                                    {{ $job->application_deadline->diffForHumans() }}
                                                </div>
                                            </td>
                                            <td class="flex justify-center p-2 whitespace-nowrap">
                                             <div
                                                 class="w-10 font-medium text-center rounded-md ">
                                                 {{ $job->applicants->count() }}
                                             </div>
                                         </td>
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-lg text-center">
                                                    <button wire:click="selectJob({{$job}})"
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
        <a href="#" wire:click="resetSelected" class="block pb-8 text-lg font-bold text-blue-700 hover:underline w-36"> &#8612;GO BACK</a>
        <div x-data="{open:false}">
            <a href="{{route('jobApplicants',$selectedJobDetails['id'])}}">
                <button class="px-8 py-4 text-left text-white bg-gray-800 border rounded-md hover:bg-gray-600" >
                    View Applicants
              </button>
            </a>
            <a href="{{route('shortListed',$selectedJobDetails['id'])}}" class="block my-4 text-sm font-semibold tracking-wide text-gray-600 hover:text-blue-700 hover:underline" >
              View ShortListed Applicants
            </a>


           <div class="mt-8">
                <h1 class="text-xl font-semibold text-gray-700 lg:text-2xl">Job Title : {{$selectedJobDetails['job_title']}}</h1>
                <h3 class="py-3 text-lg italic text-gray-800">Posted On : {{Carbon\Carbon::parse($selectedJobDetails['created_at'])->format('d M Y') }} </h3>
                <h3 class="pb-3 text-lg italic text-gray-800">Deadline On : {{Carbon\Carbon::parse($selectedJobDetails['application_deadline'])->format('d M Y')}} </h3>
                <h3 class="pb-3 text-lg italic text-gray-800">Status : {{$selectedJobDetails['available'] ? 'Job Available For Application' : 'Job Closed For Application'}} </h3>

                <div class="flex flex-wrap">
                  <div>
                      @if ($selectedJobDetails['available'])
                      <button wire:click="closeJob({{$selectedJobDetails['id']}})"  class="px-4 py-1 text-sm text-white bg-indigo-500 rounded-lg hover:bg-indigo-400">Close Application</button>
                      @else
                      <button wire:click="activateJob({{$selectedJobDetails['id']}})"  class="px-4 py-1 text-sm text-white bg-green-500 rounded-lg hover:bg-green-400">Activate Application</button>
                      @endif
                  </div>
                  <div class="ml-4">
                    <button @click="open = true" class="px-4 py-1 text-sm text-white bg-red-500 rounded-lg hover:bg-red-400">Delete</button>
                  </div>
                </div>
                <h1 class="my-4 text-xl font-semibold text-gray-700 lg:text-2xl">Job Description</h1>
                <div class="max-w-3xl p-4 my-4 bg-white rounded-md">
                    {!! $selectedJobDetails['description']!!}
                 </div>
           </div>
           <!-- Dialog (full screen) -->
        <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full" style="background-color: rgba(0,0,0,.5);" x-show="open" x-cloak >
            <!-- A basic modal dialog with title, body and one button to close -->
            <div class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-xl md:p-6 lg:p-8 md:mx-0" @click.away="open = false">
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                     Are you sure you want to delete the job post
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm leading-5 text-gray-500">
                            Deleting the job post will also delete the user applications associated with this post
                        </p>
                    </div>
                    <div class="mt-4">
                         <div class="flex flex-wrap">
                              <button @click="open = false" class="px-4 py-2 text-sm text-white bg-blue-700 rounded-md hover:bg-blue-500">
                                  Nevermind
                              </button>
                              <button wire:click="deleteJob(({{$selectedJobDetails['id']}}))"   class="px-4 py-2 text-sm text-white bg-red-700 rounded-md lg:ml-3 hover:bg-red-500">
                                Delete
                            </button>

                         </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        @endif
    </div>

</div>
<x-slot name="styles">
<style>
    [x-cloak] { display: none !important; }
</style>
</x-slot>

<x-slot name="scripts">
    <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>

</x-slot>
