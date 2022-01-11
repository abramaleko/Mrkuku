@extends('layouts.app1')
@section('title')
    <title>Blog</title>
@endsection
@section('meta-description')
<meta name="description"
        content="Ukurasa wa Mr kuku wenye taarifa mbalimbali kuhusu Miradi yetu">
@endsection
@section('content')
    <div class="overflow-x-hidden bg-gray-100">
        <div class="px-6 py-8">
            <div class="container flex justify-between mx-auto">
                <div class="w-full lg:w-8/12">
                    <div class="flex items-center justify-between">
                        <h1 class="text-xl font-bold text-gray-700 md:text-2xl">Post</h1>
                        <div>
                            <select
                                class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option>Latest</option>
                                <option>Last Week</option>
                            </select>
                        </div>
                    </div>
                    @foreach ($posts as $post)
                        <div class="mt-6">
                            <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
                                <div class="flex items-center justify-between"><span class="font-light text-gray-600">
                                        {{ $post->created_at->diffForHumans() }}
                                    </span>
                                    <a
                                        class="hidden px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500 lg:block">{{ $post->category->category }}
                                    </a>
                                </div>
                                <div class="mt-2"><a href="{{ route('blog.viewPost', $post->id) }}"
                                        class="text-2xl font-bold text-gray-700 hover:underline">
                                        {{ $post->title }}
                                    </a>
                                    <div class="mt-2 text-gray-600">
                                        {{ \Illuminate\Support\Str::limit($post->content, 350, $end = '...') }}
                                    </div>
                                </div>
                                <div class="flex items-center justify-between mt-4">
                                    <a href="{{ route('blog.viewPost', $post->id) }}"
                                        class="text-blue-500 hover:underline">Read more
                                    </a>
                                    <div class="flex flex-wrap justify-start">
                                        <div class="flex flex-wrap mr-4">
                                            <img src="{{ asset('images/comments.png') }}" class="z-10 w-6 h-6 lg:h-8 lg:w-8">
                                            @if ($post->comments_count > 0)
                                            <span
                                            class="z-10 flex items-center justify-center w-6 h-6 mt-4 -ml-1 text-xs text-white bg-gray-900 rounded-full">
                                           {{$post->comments_count}}
                                            </span>
                                            @endif
                                        </div>
                                        <a href="#" class="flex items-center">
                                            <img src="{{ asset('images/logo.jpeg') }}" alt="Mrkuku"
                                                class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                                            <h1 class="font-bold text-gray-700 hover:underline">Mr. Kuku</h1>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                    <div class="mt-8">
                        {{ $posts->links() }}
                    </div>
                        <!--Divider-->
    <hr class="mx-4 mb-8 border-b-2 border-gray-400">


    <!--Subscribe-->
    <div class="container px-4">
        <div class="p-4 font-sans text-center rounded-lg shadow-xl bg-gradient-to-b from-green-100 to-gray-100">
            <h2 class="text-xl font-bold break-normal md:text-3xl">Subscribe to Our Newsletter</h2>
            <h3 class="text-sm font-bold text-gray-600 break-normal md:text-base">Get the latest posts delivered right to your inbox</h3>
            <div class="w-full pt-4 text-center">
                <form action="#">
                    <div class="flex flex-wrap items-center max-w-xl p-1 pr-0 mx-auto">
                        <input type="email"placeholder="youremail@example.com" id="email" class="flex-1 p-3 mt-4 mr-2 text-gray-600 border border-gray-400 rounded shadow-md appearance-none focus:outline-none">
                        <button type="button" id="submit" class="flex-1 block py-4 mt-4 text-base font-semibold tracking-wider text-white uppercase bg-green-500 rounded shadow appearance-none md:inline-block hover:bg-green-400">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
                </div>
                <div class="hidden w-4/12 -mx-8 lg:block">
                    {{-- <div class="px-8">
                    <h1 class="mb-4 text-xl font-bold text-gray-700">Authors</h1>
                    <div class="flex flex-col max-w-sm px-6 py-4 mx-auto bg-white rounded-lg shadow-md">
                        <ul class="-mx-4">
                            <li class="flex items-center"><img
                                    src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                    alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Alex John</a><span
                                        class="text-sm font-light text-gray-700">Created 23 Posts</span></p>
                            </li>
                            <li class="flex items-center mt-6"><img
                                    src="https://images.unsplash.com/photo-1464863979621-258859e62245?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=333&amp;q=80"
                                    alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Jane Doe</a><span
                                        class="text-sm font-light text-gray-700">Created 52 Posts</span></p>
                            </li>
                            <li class="flex items-center mt-6"><img
                                    src="https://images.unsplash.com/photo-1531251445707-1f000e1e87d0?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=281&amp;q=80"
                                    alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Lisa Way</a><span
                                        class="text-sm font-light text-gray-700">Created 73 Posts</span></p>
                            </li>
                            <li class="flex items-center mt-6"><img
                                    src="https://images.unsplash.com/photo-1500757810556-5d600d9b737d?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=735&amp;q=80"
                                    alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Steve Matt</a><span
                                        class="text-sm font-light text-gray-700">Created 245 Posts</span></p>
                            </li>
                            <li class="flex items-center mt-6"><img
                                    src="https://images.unsplash.com/photo-1502980426475-b83966705988?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=373&amp;q=80"
                                    alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Khatab
                                        Wedaa</a><span class="text-sm font-light text-gray-700">Created 332 Posts</span>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div> --}}
                    <div class="px-8 mt-10">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">Recent Post</h1>
                        <div class="flex flex-col max-w-sm px-8 py-6 mx-auto bg-white rounded-lg shadow-md">
                            <div class="flex justify-start"><a
                                    class="px-2 py-1 text-sm text-green-100 bg-gray-600 rounded hover:bg-gray-500">{{ $posts->first()->category->category }}</a>
                            </div>
                            <div class="mt-4"><a href="{{ route('blog.viewPost', $posts->first()->id) }}"
                                    class="text-lg font-medium text-gray-700 hover:underline">
                                    {{ $posts->first()->title }}
                                </a></div>
                            <div class="flex items-center justify-between mt-4">
                                <div class="flex items-center"><img src="{{ asset('images/logo.jpeg') }}" alt="avatar"
                                        class="object-cover w-8 h-8 rounded-full">
                                    <a href="#" class="mx-3 text-sm text-gray-700 hover:underline"> Mr kuku</a>
                                </div><span
                                    class="text-sm font-light text-gray-600">{{ $posts->first()->created_at->format('jS F Y') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="px-8 mt-10">
                        <h1 class="mb-4 text-xl font-bold text-gray-700">Categories</h1>
                        <div class="flex flex-col max-w-sm px-4 py-6 mx-auto bg-white rounded-lg shadow-md">
                            <ul>
                                @foreach ($categories as $category)
                                    <li class="my-2">
                                        <a href="#"
                                            class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">-
                                            {{ $category->category }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- subscription modal -->
<div class="fixed inset-0 z-50 items-center justify-center hidden w-full overflow-hidden main-modal h-100 animated fadeIn faster"
style="background: rgba(0,0,0,.7);">
<div
    class="z-50 w-auto mx-auto overflow-y-auto bg-white border border-teal-500 rounded shadow-lg lg:w-8/12 modal-container">
    <div class="text-left modal-content">
        <!--Body-->
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="hidden lg:block">
                <img src="{{asset('images/welcome.png')}}" alt="welcome image" class="w-full h-full ">
            </div>
            <div class="px-4 my-5">
                <div class="flex items-center justify-between py-5">
                    <p class="font-light tracking-wide text-center text-gray-800"style="font-family: 'Raleway', sans-serif;">THANK YOU FOR SUBSCRIBING TO OUR NEWSFEED</p>
                    <div class="z-50 ml-4 cursor-pointer modal-close">
                        <svg class="text-black fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>
                <p class="text-lg text-gray-500 font-extralight" style="font-family: 'Raleway', sans-serif;">
                    You will be the first to know about our seminars ,new projects and giveaways. So stay tuned
                </p>
                <div class="flex justify-center mt-12">
                    <a href="{{ route('blog.allPosts') }}"
                    class="px-12 py-4 font-light tracking-widest text-white bg-blue-400 border shadow-lg hover:bg-blue-300">
                    VISIT OUR BLOG
                </a>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous">
</script>
  <script>
      //script for submitting subscription
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

      document.getElementById('submit').addEventListener('click',function(){
          let input=document.getElementById('email').value;
          if (input)
          {
            $.ajax({
                type: 'POST',
                url: '{{ route('saveSubscriber') }}',
                data: {email:input},
                success:function (data) {
                 document.getElementById('email').value='';
                  openModal();
                },
                error:function(response){
                    if (response.responseJSON.errors.email) {
                     alert('It seems you have already subscribed to our Newsletter');
                     document.getElementById('email').value='';
                    }
                }

            });
          }
          else
          alert('Please enter an email address to subscribe');
      });

      //script for modal
      const modal = document.querySelector('.main-modal');
		const closeButton = document.querySelectorAll('.modal-close');

		const modalClose = () => {
			modal.classList.remove('fadeIn');
			modal.classList.add('fadeOut');
			setTimeout(() => {
				modal.style.display = 'none';
			}, 500);
		}

		const openModal = () => {
			modal.classList.remove('fadeOut');
			modal.classList.add('fadeIn');
			modal.style.display = 'flex';
		}

		for (let i = 0; i < closeButton.length; i++) {

			const elements = closeButton[i];

			elements.onclick = (e) => modalClose();

			modal.style.display = 'none';

			window.onclick = function (event) {
				if (event.target == modal) modalClose();
			}
		}
  </script>
@endsection
