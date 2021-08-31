@extends('layouts.app1')
@section('title')
<title>Blog post</title>
@endsection
@section('content')
<div class="container w-full pt-20 mx-auto md:max-w-3xl">

    <div class="w-full px-4 text-xl leading-normal text-gray-800 md:px-6" style="font-family:Georgia,serif;">

        <!--Title-->
        <div class="font-sans">
            <p class="text-base font-bold text-green-500 md:text-sm">&lt; <a href="{{route('blog.allPosts')}}" class="text-base font-bold text-green-500 no-underline md:text-sm hover:underline">
                BACK TO BLOG
            </a></p>
                    <h1 class="pt-6 pb-2 font-sans text-3xl font-bold text-gray-900 break-normal md:text-4xl">{{$post->title}}</h1>
                    <p class="text-sm font-normal text-gray-600 md:text-base">Published {{$post->created_at->format('jS F Y')}}</p>
        </div>


        @if ($post->image_path)
        <div class="my-4">
            <img src="{{asset('storage').'/'.$post->image_path}}" alt="{{$post->title}}" class="block max-w-xs rounded lg:max-w-2xl lg:w-auto">
        </div>
        @endif
        <!-- Post Content-->
        <div class="my-6">
            {!!$post->content!!}
        </div>

    </div>

    <!--Tags -->
    <div class="px-4 py-6 text-base text-gray-500 md:text-sm">
        Category:
        <a href="#" class="text-base text-green-500 no-underline md:text-sm hover:underline">
            {{$post->category->category}}
        </a>
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

    <!--Divider-->
    <hr class="mx-4 mb-8 border-b-2 border-gray-400">

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

<!-- subscription modal -->
<div class="fixed inset-0 z-50 flex items-center justify-center w-full overflow-hidden main-modal h-100 animated fadeIn faster"
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
                            You will be the first to know about our seminars ,new projects and giveaways.So stay tuned
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
