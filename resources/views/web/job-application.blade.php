@extends('layouts.app1')
@section('title')
    <title>Application Form </title>
@endsection

@section('content')
    <div class="p-8">
       <!-success message-->
       @if (Session::has('success'))
       <div class="flex p-3 my-4 bg-green-100 rounded-md">
        <svg
            class="flex-shrink-0 w-8 h-8 mr-2 text-green-600 stroke-current stroke-2"
            viewBox="0 0 24 24"
            fill="none"
            strokeLinecap="round"
            strokeLinejoin="round"
        >
            <path d="M0 0h24v24H0z" stroke="none" />
            <circle cx="12" cy="12" r="9" />
            <path d="M9 12l2 2 4-4" />
        </svg>

        <div class="text-green-700">
            <div class="text-xl font-bold">Application Submitted Successfully</div>
            <div>
               {{Session::get('success')}}
            </div>
        </div>
        </div>
       @endif
        <h1 class="text-lg font-semibold text-gray-700 lg:text-2xl">
            Apply for {{ $job->job_title }}
        </h1>
        <div class="max-w-4xl p-8 my-4 bg-gray-100 rounded-md">
            <div class="flex flex-wrap">
                <div class="w-16 h-16 lg:h-32 lg:w-32">
                    <img src="{{ $user->profile_photo_url }}" class="object-cover w-full h-full rounded-full"
                        alt="{{ $user->name }}">
                </div>
                <div class="mt-3 lg:ml-4 lg:mt-0">
                    <p class="pt-2 text-xl font-semibold text-gray-700">
                        {{ $user->name }}
                    </p>
                    <p class="pt-2 text-lg font-light text-gray-700">
                        {{ $user->email }}

                    </p>
                    <p class="pt-2 text-lg text-gray-700">
                        {{ $user->phone_no }}
                    </p>
                    <p class="pt-1 text-base text-blue-700 underline">
                        <a href="{{ route('profile.show') }}">
                            Edit
                        </a>
                    </p>
                </div>
            </div>
            <form action="{{ route('submitApplication') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $user->id }}" name="user_id">
                <input type="hidden" value="{{ $job->id }}" name="job_id">
                <div class="mt-8" >
                    <label for="cover_letter" class="py-4 text-base ">Application Letter</label>
                    <div class="my-4">
                        <textarea class="block list-disc rounded form-control required " name="cover_letter" id="cover_letter"
                            placeholder="Write your application letter here"></textarea>
                    </div>
                    @error('cover_letter')
                    <span class="py-2 text-sm font-bold text-red-500">
                        {{ $message }}
                    </span>
                @enderror
                </div>
                <div class="mt-8">
                    <label for="cv" class="text-base ">Upload CV and Certificates</label>
                    <input type="file" name="cv_attachments[]"
                        class="block w-full px-2 py-2 my-2 text-white bg-green-500 border-blue-300 rounded-md lg:w-3/4"
                        placeholder="i.e IT Manager" multiple>
                    @error('cv_attachments')
                        <span class="py-2 text-sm font-bold text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="px-4 py-2 tracking-wide text-white bg-blue-500 rounded-md">APPLY</button>
                </div>
        </div>
        </form>

    </div>
@endsection
@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#cover_letter'))
            .then(editor => {

            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
@section('styles')
    <style>
        .ck-editor__editable_inline {
            min-height: 750px;
        }
    </style>
@endsection
