@extends('layouts.app1')
@section('title')
<title>Mr Kuku</title>
@endsection
@section('styles')
 <link rel="stylesheet" href="{{asset('css/home.css')}}">
@endsection
@section('content')
    {{-- header section --}}
    <div class="grid grid-cols-1 px-3 pt-8 my-8 header md:grid-cols-2 md:gap-20">

        <div class="block px-8 md:px-10">
            <h2 class="font-bold tracking-wide header-text">
                Grow Your Capital x 10% Monthly,Through Poultry Business
            </h2>
            <p class="pt-6 text-gray-400 font-extralight" style="font-size: 22px; font-family: 'Raleway', sans-serif;">
                Our Modern Poultry Contract farming platform of 1 million monthly circulation capacity
                for broiler chicken.Allows you to rear
                chicken into our platform remotely and create profit (ROI) of 10% monthly.
            </p>
            <p class="py-2 font-bold text-center text-gray-600"
                style="font-size: 22px; font-style:italic; font-family: 'Raleway', sans-serif;">
                What are you waiting for?
            </p>
            <div class="flex justify-center pt-3">
                <a href="{{ route('register') }}"
                    class="px-12 py-4 font-light tracking-wider text-white bg-blue-500 border shadow-lg hover:bg-blue-400">
                    INVEST NOW
                </a>
            </div>
        </div>

        <div class="hidden md:block">
            <img src="{{ asset('images/farm.jpg') }}"
                style="width: 600px; height:440px; border-radius:2rem;">
        </div>

    </div>

    {{-- investment section --}}
    <div class="grid grid-cols-1 gap-20 px-3 pt-8 invest md:grid-cols-2">

        <div class="hidden mx-8 farm md:block">
            <img src="{{ asset('images/chicks1.jpg') }}" class="block"
                style="width: 600px; height:440px; border-radius:2rem;">
        </div>

        <div class="block px-4 invest-text md:px-10">
            <h2 class="font-bold tracking-tight header-invest" style="font-size: 35px;">
                WHY INVEST WITH US ?
            </h2>
            <ol class="px-3 py-6 text-gray-500 list-disc md:px-0">
                <li class="py-2 text-base">Reliable income stream, grow your capital * 10 each month.</li>
                <li class="py-2 text-base">Invest in Vetted Projects from Industry Experts </li>
                <li class="py-2 text-base">Get connected to the Agri-business.</li>
                {{-- <li class="py-2 text-base">Etiam tincidunt dolor euismod velit sagittis, tincidunt vestibulum risus feugiat.
                </li>
                <li class="py-2 text-base">Maecenas lobortis orci a mauris vulputate, id auctor tellus lobortis.</li>
                <li class="py-2 text-base">Quisque ultricies leo id elit venenatis dapibus.</li> --}}
            </ol>
            <div class="flex justify-center pt-3">
                <a href="{{ route('learn') }}"
                    class="px-12 py-4 font-light tracking-wider text-white bg-green-500 border shadow-lg hover:bg-green-400">
                    LEARN MORE
                </a>
            </div>
        </div>
    </div>

    <div class="bg-gray-200 video" style="margin-top:7rem;">
        <h2 class="py-8 font-bold tracking-wide text-center header-text">
            MESSAGE FROM OUR CEO
        </h2>
        <div class="flex justify-center py-6">
            <iframe width="940" height="391" src="https://www.youtube.com/embed/RcQUjDmlsuU"
                title="YouTube video player" frameborder="0"
                class="rounded-md youtube-video"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
    </div>

    <div class="companies" style="margin-top: 4rem;">
        <h2 class="py-8 font-bold tracking-wide text-center" style="font-size: 32px;">
            OUR COMPANIES
        </h2>
        <div class="grid grid-cols-1 px-16 my-4 md:grid-cols-4" style="font-family: 'Raleway', sans-serif; font-style:italic;">

            <div class="mb-4 mrkuku md:mb-0">
                <div class="border-0 md:pb-4">
                    <img src="{{ asset('images/logo.jpeg') }}" alt="Mr kuku" style="width: 253px; height:250px;"
                        class="block bg-black">
                </div>
                <span class="text-lg md:text-base">MR KUKU FARMERS LTD</span>
            </div>

            <div class="mb-4 agro md:mb-0">
                <div class="border-0 md:pb-4 ">
                    <img src="{{ asset('images/agro.jpg') }}" alt="Mr kuku" style="width: 253px; height:250px;"
                        class="block bg-black ">
                </div>
                <span class="text-lg md:text-base">AGRO FUNDERS LTD</span>

            </div>

            <div class="mb-4 tasam md:mb-0">
                <div class="border-0 md:pb-4">
                    <img src="{{ asset('images/TASAM.jpg') }}" alt="Mr kuku" style="width: 253px; height:250px;"
                        class="block bg-black">
                </div>
                <span class="text-lg md:text-base">TASAM ENTERTAINMENT</span>

            </div>

            <div class="mb-4 bravo md:mb-0">
                <div class="border-0 md:pb-4">
                    <img src="{{ asset('images/bravo.jpg') }}" alt="Mr kuku" style="width: 253px; height:250px;"
                        class="block bg-black">
                </div>
                <span class="text-lg md:text-base">BRAVO FEEDS MILL LIMITED</span>

            </div>
        </div>
        <div>
        </div>
    </div>

    <div class="text-white bg-gray-900 newsletter">
        <h2 class="py-8 font-bold tracking-wide text-center header-text">
            SUBSCRIBE TO OUR NEWSLETTER
        </h2>
        <p class="text-center header-text2 font-extralight" style="">
            Receive our News, Insights & Opinions
        </p>
        <div class="flex flex-wrap justify-center mt-8 pb-36">
            <form >
                <input type="email" id="email" class="px-4 py-2 text-gray-500 border-2 lg:py-3 lg:w-96 focus:border-black" placeholder="Enter your email address">
                <button
                    type="button" id="submit"
                    class="px-12 py-3 ml-4 font-light tracking-wider text-white bg-gray-900 border-2 shadow-lg subscribe hover:text-black hover:bg-white">
                    SUBSCRIBE
                </button>
            </form>

        </div>
    </div>

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
