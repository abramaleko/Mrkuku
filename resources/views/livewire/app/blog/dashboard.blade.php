    <x-slot name="title">
        {{ __('Blog Dashboard') }}
    </x-slot>

    <x-slot name="styles">
        <!--Regular Datatables CSS-->
        <link href="{{ asset('css/dataTables.min.css') }}" rel="stylesheet">
        <!--Responsive Extension Datatables CSS-->
        <link href="{{ asset('css/responsiveDataTables.min.css') }}" rel="stylesheet">
    </x-slot>

    <div class="container px-6 py-8 mx-auto">


        <div class="sm:px-6 lg:px-8 lg:pb-14">
            <div class="___class_+?2___">
                <h1 class="py-8 text-2xl font-bold text-gray-700 lg:float-left lg:text-4xl lg:py-0">Blog Dashboard</h1>
                <a href="{{ route('blog.create') }}"
                    class="px-4 py-2 font-light tracking-wide text-white bg-gray-800 r-8 lg:py-3 lg:px-8 lg:float-right hover:bg-gray-600">
                    New Post
                </a>
            </div>
        </div>


        <div class="mt-4">
            <div class="flex flex-wrap -mx-6">
                <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
                    <a href="#blogposts">
                        <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                            <div class="p-3 bg-indigo-600 bg-opacity-75 rounded-full">
                                <img src="{{ asset('images/allpost.png') }}" alt="all posts" class="w-8 h-8">
                            </div>

                            <div class="mx-5">
                                <div class="text-gray-500">Blog Posts </div>
                                <h4 class="text-2xl font-semibold text-gray-700">{{ count($posts) }}</h4>
                            </div>
                        </div>
                    </a>

                </div>

                <div class="w-full px-6 mt-6 sm:w-1/2 xl:w-1/3 sm:mt-0">
                    <a href="">
                        <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                            <div class="p-3 bg-pink-600 bg-opacity-75 rounded-full">
                                <img src="{{ asset('images/newcomments.png') }}" alt="new comments"
                                    class="w-8 h-8">
                            </div>

                            <div class="mx-5">
                                <div class="text-gray-500">New Comments</div>
                                <h4 class="text-2xl font-semibold text-gray-700">{{ count($newCommments) }}</h4>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="w-full px-6 mt-6 sm:w-1/2 xl:w-1/3 xl:mt-0">
                    <a href="">
                        <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                            <div class="p-3 bg-gray-600 bg-opacity-75 rounded-full">
                                <img src="{{ asset('images/comments.png') }}" alt="all posts" class="w-8 h-8">

                            </div>

                            <div class="mx-5">
                                <div class="text-gray-500">Total comments</div>
                                <h4 class="text-2xl font-semibold text-gray-700">{{ count($comments) }}</h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div wire:ignore class="flex flex-col mt-8" id="blogposts">
            <h2 class="py-4 text-3xl text-gray-700 ">All posts</h2>
            <div class="p-8 bg-white rounded-md">
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1">S/N</th>
                            <th data-priority="2">Title</th>
                            <th data-priority="3">Categories</th>
                            <th data-priority="4">Status</th>
                            <th data-priority="5">Comments</th>
                            <th data-priority="6">Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category->category }}</td>
                                <td>{{ ucfirst($post->status) }}</td>
                                <td class="text-center">{{ $post->comments_count }}</td>
                                <td>{{ $post->created_at->format('jS F Y') }}</td>
                                <td>
                                    <a href="{{ route('blog.viewPost', $post->id) }}" target="_blank"
                                        class="px-6 text-green-600 hover:text-green-900">View</a>
                                    <a href="#" class="px-6 text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <a href="#" class="px-6 text-red-700 hover:text-red-900">Delete</a>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>


        <div class="flex flex-col mt-8">
            <h2 class="py-4 text-3xl text-gray-700 ">Trending posts</h2>
            <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                    class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    S/N
                                </th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Title
                                </th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Category
                                </th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                    Comments
                                </th>
                                <th
                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white">
                            @foreach ($trending_posts as $post)
                                <tr>
                                    <td
                                        class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-900">
                                            {{ $post->title }}
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-900">
                                            {{ $post->category->category }}
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="text-sm leading-5 text-gray-900">
                                            {{ $post->comments_count }}
                                        </div>
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                        <a href="{{ route('blog.viewPost', $post->id) }}" target="_blank"
                                            class="text-green-600 hover:text-green-900">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="flex flex-col mt-8">
            <h2 class="py-4 text-3xl text-gray-700 ">New Comments</h2>
            @if (Session::has('message'))
                <div class="flex p-3 my-4 bg-green-100 rounded-md">
                    <svg class="flex-shrink-0 w-8 h-8 mr-2 text-green-600 stroke-current stroke-2" viewBox="0 0 24 24"
                        fill="none" strokeLinecap="round" strokeLinejoin="round">
                        <path d="M0 0h24v24H0z" stroke="none" />
                        <circle cx="12" cy="12" r="9" />
                        <path d="M9 12l2 2 4-4" />
                    </svg>

                    <div class="text-green-700">
                        <div>
                            {{ Session::get('message') }}
                        </div>
                    </div>
                </div>
            @endif
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        User
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Post
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Comment
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Date
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Verify</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($newCommments as $comment)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                        <img class="w-10 h-10 rounded-full"
                                                            src="{{ $comment->user->profile_photo_url }}"
                                                            alt="{{ $comment->user->name }}">
                                                    @endif
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{ $comment->user->name }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        {{ $comment->user->email }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $comment->post->title }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">{{ $comment->context }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">
                                                {{ $comment->created_at->diffForHumans() }}</div>
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                                            <a wire:click='verifyComment({{ $comment->id }})'
                                                class="px-4 py-2 text-white bg-indigo-600 rounded cursor-pointer hover:bg-indigo-900">Verify</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <x-slot name="scripts">
        <!-- jQuery -->
        <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>

        <!--Datatables -->
        <script src="{{ asset('js/datatables.min.js') }}"></script>
        <script>
            $(document).ready(function() {

                var table = $('#example').DataTable({
                        responsive: true
                    })
                    .columns.adjust()
                    .responsive.recalc();
            });
        </script>
    </x-slot>
