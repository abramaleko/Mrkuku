@extends('layouts.app1')
@section('title')
  <title>Careers </title>
@endsection
@section('content')
<div class="my-8 ">
    <h1 class="text-5xl font-bold text-center text-gray-500">Careers</h1>
    <p class="py-2 italic font-light text-center text-gray-500">
        With us you will find a place where you belong !
    </p>

    <div class="px-4 mt-12 lg:px-8">
         @foreach ($jobs as $job)
          <div class="grid grid-cols-3 gap-2 pt-4 lg:gap-4 lg:grid-cols-2">
              <div class="col-span-2 lg:col-span-1">
                  <h4 class="font-semibold text-gray-800 lg:text-lg">
                      Job Title : {{$job->job_title}}
                  </h4>
                  <p class="py-2 italic text-gray-600">
                      Posted on: {{\Carbon\Carbon::parse($job->created_at)->diffForHumans()}}
                  </p>
                  <p class="italic text-gray-600 ">
                    Deadline on: {{ \Carbon\Carbon::parse($job->created_at)->format('d M Y')}}
                </p>
              </div>

              <div class="">
                 <a href="{{route('jobDescription',$job->id)}}">
                    <button class="w-32 px-6 py-3 mb-4 text-white bg-purple-700 rounded-sm hover:bg-purple-500">
                        VIEW JOB
                    </button>
                 </a>
                 <a href="{{route('jobApplication',$job->id)}}">
                    <button class="block w-32 px-6 py-3 mb-4 text-white bg-gray-700 rounded-sm hover:bg-gray-500  {{$job->available ? '' : 'cursor-not-allowed'}}" {{$job->available ? '' : 'disabled'}}>
                        APPLY
                    </button>
                 </a>
              </div>
              <div class="border-b-2 border-gray-500 "></div>

          </div>

         @endforeach
    </div>
    <div class="m-4">
        {{ $jobs->links() }}
    </div>
    @if (count($jobs) == 0)
     <h2 class="px-4 font-sans text-xl font-semibold text-gray-700 lg:text-2xl lg:px-8"> Stay Tuned Were Soon Posting Jobs Available To Apply</h2>
    @endif

</div>
@endsection
