<x-slot name="title">
    {{ __('Blog posts') }}
</x-slot>

<div class="py-8">
    <div class="sm:px-6 lg:px-8 lg:pb-8">
        <div class="mx-8 ">
            <h1 class="py-8 text-2xl font-bold text-gray-700 lg:pl-6 lg:float-left lg:text-4xl lg:py-0">Blog posts</h1>
            <a href="{{route('blog.create')}}"
                class="px-4 py-2 font-light tracking-wide text-white bg-gray-800 r-8 lg:py-3 lg:px-8 lg:float-right hover:bg-gray-600">
                New Post
            </a>
        </div>
    </div>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="flex flex-col mt-10">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Title
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Categories
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Status
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Comments
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                    Date
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($posts as $post)
                            <tr>
                                <td class="px-2 py-4 whitespace-nowrap">
                                    <div class="ml-2">
                                        <div class="text-sm font-medium leading-normal tracking-tight text-gray-900">
                                            {{$post->title}}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-2 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$post->category->category}}</div>
                                </td>
                                <td class="px-2 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$post->status}}</div>
                                </td>
                                <td class="px-2 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">4</div>
                                </td>
                                <td class="px-2 py-4 text-sm text-gray-500 whitespace-nowrap">
                                    Jun 1, 2020
                                </td>
                                <td class="py-4 text-base font-medium whitespace-nowrap">
                                    <a href="#" class="px-6 text-green-600 hover:text-green-900">View</a>
                                    <a href="#" class="px-6 text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <a href="#" class="px-6 text-red-700 hover:text-red-900">Delete</a>
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
