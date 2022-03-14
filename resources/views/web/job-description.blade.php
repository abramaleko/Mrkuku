@extends('layouts.app1')
@section('title')
  <title>Job Description </title>
@endsection
@section('content')
<div class="p-8">
 <div class="float-left">
    <h1 class="text-lg font-semibold text-gray-700 lg:text-2xl">
        {{$job->job_title}}
     </h1>
 </div>
      <div class="mt-16 lg:float-right lg:mt-0">
          <a href="{{route('jobApplication',$job->id)}}">
            <button class="px-6 py-2 text-white bg-gray-700 hover:bg-gray-500">
                APPLY JOB
            </button>
          </a>
      </div>
 </div>
   <div class="px-8 py-2">
    <p class="block italic text-gray-600">
        <b>Posted :</b> {{\Carbon\Carbon::parse($job->created_at)->diffForHumans()}}
    </p>
    <p class="block py-2 italic text-gray-600">
        <b>Deadline On:</b> {{\Carbon\Carbon::parse($job->application_deadline)->format('d M Y')}}
    </p>

    <h2 class="py-6 text-xl font-bold">Job Description</h2>
    {!! $job->description !!}

   </div>

</div>

@endsection
