@extends('layouts.app1')
@section('title')
    <title>Blog post</title>
@endsection
@section('content')
    <div class="container w-full mx-auto md:max-w-3xl pt-14">

        <div class="w-full px-4 text-xl leading-normal text-gray-800 md:px-6" style="font-family:Georgia,serif;">

            <!--Title-->
            <div class="font-sans">
                <p class="text-base font-bold text-green-500 md:text-sm">&lt; <a href="{{ route('blog.allPosts') }}"
                        class="text-base font-bold text-green-500 no-underline md:text-sm hover:underline">
                        BACK TO BLOG
                    </a></p>
                <h1 class="pt-6 pb-2 font-sans text-3xl font-bold text-gray-900 break-normal md:text-4xl">
                    {{ $post->title }}</h1>
                <p class="text-sm font-normal text-gray-600 md:text-base">Published
                    {{ $post->created_at->format('jS F Y') }}</p>
            </div>


            @if ($post->image_path)
                <div class="my-4">
                    <img src="{{ asset('storage') . '/' . $post->image_path }}" alt="{{ $post->title }}"
                        class="block max-w-xs rounded lg:max-w-2xl lg:w-auto">
                </div>
            @endif
            <!-- Post Content-->
            <div class="my-6">
                {!! $post->content !!}
            </div>

        </div>

        <!--Tags -->
        <div class="px-4 py-6 text-base text-gray-500 md:text-sm">
            Category:
            <a href="#" class="text-base text-green-500 no-underline md:text-sm hover:underline">
                {{ $post->category->category }}
            </a>
        </div>

        <!-- component -->
        <!-- comment form -->
        <div class="flex items-center justify-center w-auto mb-4 shadow-lg">
            <form class="px-4 pt-2 bg-white rounded-lg">
                <div class="flex flex-wrap mb-6 -mx-3">
                    <h2 class="px-4 pt-3 pb-2 text-lg text-gray-800">Add a new comment</h2>
                    <div class="w-full px-3 mt-2 mb-2 md:w-full">
                        <textarea
                            class="w-full h-20 px-3 py-2 font-medium leading-normal placeholder-gray-700 bg-gray-100 border border-gray-400 rounded resize-none focus:outline-none focus:bg-white"
                            id="context" placeholder='Type Your Comment' required></textarea>
                    </div>
                    <div class="flex items-start w-full px-3 md:w-full">
                        @guest
                            <div class="flex items-start w-1/2 px-2 mr-auto text-gray-700" id="showAfterSubmit">
                                <svg fill="none" class="w-5 h-5 mr-1 text-gray-600" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="pt-px text-xs md:text-sm">Log in to comment to this post</p>
                            </div>
                        @endguest
                        <div class="items-start hidden w-1/2 px-2 mr-auto text-gray-700" id="showAfterSubmit">
                            <svg fill="none" class="w-5 h-5 mr-1 text-gray-600" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="pt-px text-xs md:text-sm" id="showText">Log in to comment to this post</p>
                        </div>

                        <div class="-mr-1">
                            <input type='submit' id="submit_comment"
                                class="px-4 py-1 mr-1 font-medium tracking-wide text-gray-700 bg-white border border-gray-400 rounded-lg hover:bg-gray-100 disabled:opacity-50"
                                {{ Auth::check() ? '' : 'disabled' }} value='Post Comment'>
                        </div>
                    </div>
            </form>
        </div>
    </div>


    <!-- /Subscribe-->



    <!--Author-->
    {{-- <div class="flex items-center w-full px-4 py-12 font-sans">
        <img class="w-10 h-10 mr-4 rounded-full" src="http://i.pravatar.cc/300" alt="Avatar of Author">
        <div class="flex-1 px-2">
            <p class="mb-2 text-base font-bold leading-none md:text-xl">Jo Bloggerson</p>
            <p class="text-xs text-gray-600 md:text-base">Minimal Blog Tailwind CSS template by <a class="text-green-500 no-underline hover:underline" href="https://www.tailwindtoolbox.com">TailwindToolbox.com</a></p>
        </div>
        <div class="justify-end">
            <button class="px-4 py-2 text-xs font-bold text-gray-500 bg-transparent border border-gray-500 rounded-full hover:border-green-500 hover:text-green-500">Read More</button>
        </div>
    </div> --}}
    <!--/Author-->

    @if (count($post->comments) > 0)
        <!--Divider-->
        <hr class="mx-4 mb-8 border-b-2 border-gray-400">
        <!-- component comments -->
        <div class="max-w-screen-sm mx-4 my-4 antialiased lg:my-8 lg:mx-0">
            <h3 class="mb-4 text-lg font-semibold text-gray-900">Comments</h3>
        @foreach ($post->comments->sortDesc() as $comment)
                <div class="my-4 space-y-4">
                    <div class="flex">
                        <div class="flex-shrink-0 mr-3">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <img class="w-8 h-8 rounded-full"
                                src="{{ $comment->user->profile_photo_url }}"
                                alt="{{$comment->user->name}}">
                                @endif
                        </div>
                        <div class="flex-1 px-4 py-2 leading-relaxed border-2 rounded-lg sm:px-6 sm:py-4">
                            <strong>{{$comment->user->name}}</strong> <span class="text-xs text-gray-400">{{$comment->updated_at->diffForHumans()}}</span>
                            <p class="text-sm">
                              {{$comment->context}}
                            </p>
                        </div>
                    </div>

                </div>
        @endforeach
    </div>
    @endif

    <!--Next & Prev Links-->
    {{-- <div class="flex content-center justify-between px-4 pb-12 font-sans">
        <div class="text-left">
            <span class="text-xs font-normal text-gray-600 md:text-sm">&lt; Previous Post</span><br>
            <p><a href="#" class="text-base font-bold text-green-500 no-underline break-normal md:text-sm hover:underline">Blog title</a></p>
        </div>
        <div class="text-right">
            <span class="text-xs font-normal text-gray-600 md:text-sm">Next Post &gt;</span><br>
            <p><a href="#" class="text-base font-bold text-green-500 no-underline break-normal md:text-sm hover:underline">Blog title</a></p>
        </div>
    </div> --}}


    <!--/Next & Prev Links-->

    </div>

@endsection
@section('scripts')
    {{-- script for google captch protection --}}
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.sitekey') }}"></script>
    {{-- jquery script --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        // script for submitting subscription
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

        document.getElementById("submit_comment").addEventListener("click", function(event) {
            event.preventDefault();
            grecaptcha.ready(function() {
                grecaptcha.execute("{{ config('services.recaptcha.sitekey') }}", {
                    action: 'submit'
                }).then(function(token) {
                    let comment = document.getElementById("context").value;
                    let user_id = {{ Auth::user()->id ?? '' }};
                    let post_id = {{ $post->id }};


                    // Add your logic to submit to your backend server here.

                    $.ajax({
                        type: 'Post',
                        url: '{{ route('blog.commentPost') }}',
                        data: {
                            comment: comment,
                            user_id: user_id,
                            post_id: post_id,
                            token: token
                        },
                        success: function(data) {
                            //shows the success message and hides it after 4 seconds
                            document.getElementById('showText').innerHTML =
                                'You will see your comment once verified by us';
                            document.getElementById('showAfterSubmit').style.display =
                                "flex";
                            setTimeout(function() {
                                document.getElementById('showAfterSubmit').style
                                    .display = "none";
                            }, 4000);
                            //clears the input
                            document.getElementById("context").value = '';
                        }

                    });

                });
            });
        });
    </script>

@endsection
