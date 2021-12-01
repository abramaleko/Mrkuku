@extends('layouts.app1')
@section('title')
<title>Mr Kuku</title>
@endsection
@section('styles')
<link
  rel="stylesheet"
  href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"
/>

 <link rel="stylesheet" href="{{asset('css/home.css')}}">
 <!--====== Tailwind CSS ======-->
 <link rel="stylesheet" href="{{asset('assets/css/tailwindcss.css')}}">
 <!--====== Line Icons CSS ======-->
<link rel="stylesheet" href="{{asset('assets/fonts/lineicons/font-css/LineIcons.css')}}">
@endsection
@section('content')

    {{-- header section --}}
    <div id="home" class="relative z-10 header-hero" style="background-image: url(images/farm.jpg)">
        <div class="container">
            <div class="justify-center row">
                <div class="w-full lg:w-5/6 xl:w-2/3">
                    <div class="pt-48 pb-64 text-center header-content">
                        <h3 class="mb-5 text-3xl font-semibold leading-relaxed text-gray-700 md:text-5xl">Grow Your Capital x 10% Monthly,Through Poultry Business
                        </h3>
                        <p class="px-5 mb-10 text-lg text-gray-600 font-extralight">
                            Our Modern Poultry Contract farming platform of 1 million monthly circulation capacity
                            for broiler chicken. Allows you to rear
                            chicken into our platform remotely and create profit (ROI) of 10% monthly</p>
                        <ul class="flex flex-wrap justify-center">
                            <li><a class="mx-3 main-btn gradient-btn" href="{{ route('register') }}">INVEST NOW</a></li>
                            <li><a class="mx-3 main-btn video-popup" href="#video">WATCH THE VIDEO</a></li>
                        </ul>
                    </div> <!-- header content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="absolute bottom-0 z-20 w-full h-auto -mb-1 header-shape">
            <img src="assets/images/header-shape.svg" alt="shape">
        </div>
    </div> <!-- header content -->

    <section id="why" class="relative px-4 lg:ml-24 about_area pt-120">
        <div class="flex items-end justify-end about_image">
            <div class="image lg:pr-13">
                <img src="assets/images/about.svg" alt="about">
            </div>
        </div> <!-- about image -->
        <div class="container">
            <div class="justify-end row">
                <div class="w-full lg:w-1/2">
                    <div class="mx-4 about_content pt-11 lg:pt-15 lg:pb-15">
                        <div class="section_title pb-9">
                            <h5 class="sub_title">Why Choose Us</h5>
                            <h4 class="main_title">Your Success is Our Legacy</h4>
                        </div> <!-- section title -->
                        <p>Create an attractive, tax advantaged, consistent income stream by investing primarily in cash flowing into our Broiler poultry farms. </p>
                        <ul class="pt-3 about_list">
                            <li class="flex mt-5">
                                <div class="about_check">
                                    <i class="lni lni-checkmark-circle"></i>
                                </div>
                                <div class="pl-5 pr-2 about_list_content">
                                    <p>Reliable income stream, grow your capital * 10 each month.</p>
                                </div>
                            </li>
                            <li class="flex mt-5">
                                <div class="about_check">
                                    <i class="lni lni-checkmark-circle"></i>
                                </div>
                                <div class="pl-5 pr-2 about_list_content">
                                    <p>Invest in Vetted Projects from Industry Experts</p>
                                </div>
                            </li>
                            <li class="flex mt-5">
                                <div class="about_check">
                                    <i class="lni lni-checkmark-circle"></i>
                                </div>
                                <div class="pl-5 pr-2 about_list_content">
                                    <p>Get connected to the Agri-business.</p>
                                </div>
                            </li>
                        </ul>
                    </div> <!-- about content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <section class="text-gray-600 lg:mt-32 body-font" id="bravo_corning">
        <div class="container flex flex-col px-5 py-24 mx-auto">
            {{-- <div class="text-center section_title">
                <h4 class="pb-12 main_title">What's Trending</h4>
            </div> --}}
            <div class="justify-center row">
                <div class="w-full lg:w-1/2">
                    <div class="pb-6 text-center section_title">
                        <h5 class="sub_title">Our Projects</h5>
                        <h4 class="main_title">Trending Now</h4>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
          <div class="mx-auto">
            <div class="w-auto overflow-hidden rounded-lg ">
                <iframe src="https://www.youtube.com/embed/ARhairD_dkM?autoplay=1&rel=0"  frameborder="0"></iframe>
            <div class="flex flex-col mt-10 sm:flex-row">
              <div class="text-center sm:w-1/3 sm:pr-8 sm:py-8">
                <div class="inline-flex items-center justify-center w-20 h-20 ">
                    <img src="{{ asset('images/logo.jpeg') }}" alt="Mrkuku" class="w-full rounded-full">
                </div>
                <div class="flex flex-col items-center justify-center text-center">
                  <h2 class="mt-4 text-lg font-medium text-gray-900 title-font">Mr.Kuku</h2>
                  <div class="w-12 h-1 mt-2 mb-4 bg-indigo-500 rounded"></div>
                  <p class="text-base">
                    BRAVO COMMERCIAL CORN FARMING
                  </p>
                </div>
              </div>
              <div class="pt-4 mt-4 text-center border-t border-gray-200 sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l sm:border-t-0 sm:mt-0 sm:text-left">
                <p class="mb-4 text-lg leading-relaxed">
                    Mr Kuku Farmers Ltd And Bravo Feeds Mill Ltd Food Manufacturing Factory, Now Enables You To Participate In Maize Farming By Contract Without Intefering With Your Other Activities
                    <a href="{{route('blog.viewPost',3)}}" class="inline-flex items-center ml-2 text-indigo-500 cursor-pointer hover:underline">Learn More
                  <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>

        <!--====== BLOG PART START ======-->

        <section id="blog" class="mt-12 blog_area">
            <div class="container">
                <div class="justify-center row">
                    <div class="w-full lg:w-1/2">
                        <div class="pb-6 text-center section_title">
                            <h5 class="sub_title">Blog</h5>
                            <h4 class="main_title">From The Blog</h4>
                        </div> <!-- section title -->
                    </div>
                </div> <!-- row -->
                <div class="justify-center row lg:justify-start">
                    @foreach ($blog_posts as $post)
                    <div class="w-full md:w-8/12 lg:w-6/12 xl:w-4/12">
                        <div class="h-full mx-3 mt-8 overflow-hidden transition-all duration-300 bg-white single_blog rounded-xl hover:shadow-lg">
                            <div class="blog_image">
                                <img src="{{ asset('storage') . '/' . $post->image_path }}" alt="{{ $post->title }}" class="w-full" style="width: 392px; height:392px;">
                            </div>
                            <div class="p-4 blog_content md:p-5">
                                <ul class="flex justify-between blog_meta">
                                    <li class="text-sm text-body-color md:text-base">By: <a href="#" class="text-body-color hover:text-theme-color">Mr.Kuku</a></li>
                                    <li class="text-sm text-body-color md:text-base">{{$post->created_at->format('jS F Y')}}</li>
                                </ul>
                                <h3 class="blog_title"><a href="#">{{$post->title}}</a></h3>
                                <a target="_blank" href="{{route('blog.viewPost',$post->id)}}" class="more_btn">Read More</a>
                            </div>
                        </div> <!-- row -->
                    </div>
                    @endforeach
                </div> <!-- row -->
            </div> <!-- container -->
        </section>

        <!--====== BLOG PART ENDS ======-->

        <section class="mt-8 work_area bg-gray pt-90" id="video">
           <div class="container">
            <div class="flex justify-center">
                <iframe width="940" height="420" src="https://www.youtube.com/embed/RcQUjDmlsuU?&autoplay=1"
                    title="YouTube video player" frameborder="0"
                    class="rounded-md youtube-video"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
           </div>
        </section>

        <div class="flex items-center justify-center min-w-screen bg-gray-50">
            <div class="w-full px-5 py-16 font-light text-gray-800 bg-white border-t border-b border-gray-200 md:py-24">
                <div class="w-full max-w-6xl pb-5 mx-auto">
                    <div class="items-center -mx-3 md:flex">
                        <div class="px-3 mb-10 md:w-2/3 md:mb-0">
                            <h1 class="mb-5 text-6xl font-bold leading-tight md:text-8xl">Stay <br class="hidden md:block">updated.</h1>
                            <h3 class="leading-tight text-gray-600 mb-7">Subscribe now and receive the latest News, Insights & Opinions.</h3>
                            <div>
                                <span class="inline-block w-40 h-1 bg-indigo-500 rounded-full"></span>
                                <span class="inline-block w-3 h-1 ml-1 bg-indigo-500 rounded-full"></span>
                                <span class="inline-block w-1 h-1 ml-1 bg-indigo-500 rounded-full"></span>
                            </div>
                        </div>
                        <div class="px-3 md:w-1/3">
                            <form>
                                <div class="flex mb-3">
                                    <div class="z-10 flex items-center justify-center w-10 pl-1 text-center pointer-events-none"><i class="text-lg text-gray-400 mdi mdi-email-outline"></i></div>
                                    <input type="email" name="email" id="email" class="w-full py-2 pl-10 pr-3 -ml-10 border-2 border-gray-200 rounded-lg outline-none focus:border-indigo-500" placeholder="email@example.com">
                                </div>
                                <div>
                                    <button type="button" id="submit" class="block w-full px-3 py-3 font-semibold text-white transition-colors bg-indigo-500 rounded-lg hover:bg-indigo-700 focus:bg-indigo-700">Subscribe now.</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <!--====== VIDEO COUNTER PART START ======-->

    <section id="facts" class="pt-20 video-counter">
        <div class="container">
            <div class="row">
                <div class="w-full lg:w-1/2">
                    <div class="relative pb-8 mt-12 video-content wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img class="absolute bottom-0 left-0 -ml-8 dots" src="{{asset('assets/images/dots.svg')}}" alt="dots">
                        <div class="relative mr-6 rounded-lg shadow-md video-wrapper">
                            <div class="video-image">
                                <div class="relative overflow-hidden rounded shadow-xl carousel">
                                    <div class="relative w-full overflow-hidden carousel-inner">
                                      <!--Slide 1-->
                                      <input
                                        class="carousel-open"
                                        type="radio"
                                        id="carousel-1"
                                        name="carousel"
                                        aria-hidden="true"
                                        hidden=""
                                        checked="checked"
                                        style="display: none"
                                      />
                                      <div
                                        class="absolute bg-gray-100 bg-center opacity-0 carousel-item"
                                        style="
                                          height: 500px;
                                          background-image: url(images/certificates/Tin.jpg);
                                          background-size: contain;
                                          background-repeat:   no-repeat;
                                        "

                                      ></div>
                                      <label
                                        for="carousel-3"
                                        class="absolute inset-y-0 left-0 z-10 flex content-center justify-center hidden w-10 h-10 my-auto ml-2 font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer control-1 md:ml-10 hover:text-white hover:bg-blue-700"
                                        ><i class="mt-3 fas fa-angle-left"></i
                                      ></label>
                                      <label
                                        for="carousel-2"
                                        class="absolute inset-y-0 right-0 z-10 hidden w-10 h-10 my-auto mr-2 font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer next control-1 md:mr-10 hover:text-white hover:bg-blue-700"
                                        ><i class="mt-3 fas fa-angle-right"></i
                                      ></label>

                                      <!--Slide 2-->
                                      <input
                                        class="carousel-open"
                                        type="radio"
                                        id="carousel-2"
                                        name="carousel"
                                        aria-hidden="true"
                                        hidden=""
                                        style="display: none"

                                      />
                                      <div
                                        class="absolute bg-gray-100 bg-center opacity-0 carousel-item"
                                        style="
                                          height: 500px;
                                          background-image: url(images/certificates/Tax.jpg);
                                          background-size: contain;
                                          background-repeat:   no-repeat;                                        "
                                      ></div>
                                      <label
                                        for="carousel-1"
                                        class="absolute inset-y-0 left-0 z-10 hidden w-10 h-10 my-auto ml-2 font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer control-2 md:ml-10 hover:text-white hover:bg-blue-700"
                                        ><i class="mt-3 fas fa-angle-left"></i
                                      ></label>
                                      <label
                                        for="carousel-3"
                                        class="absolute inset-y-0 right-0 z-10 hidden w-10 h-10 my-auto mr-2 font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer next control-2 md:mr-10 hover:text-white hover:bg-blue-700"
                                        ><i class="mt-3 fas fa-angle-right"></i
                                      ></label>

                                      <!--Slide 3-->
                                      <input
                                        class="carousel-open"
                                        type="radio"
                                        id="carousel-3"
                                        name="carousel"
                                        aria-hidden="true"
                                        hidden=""
                                        style="display: none"

                                      />
                                      <div
                                        class="absolute bg-gray-100 opacity-0 carousel-item"
                                        style="
                                          height: 500px;
                                          background-image: url(images/certificates/WCF.jpg);
                                          background-size: contain;
                                          background-repeat:   no-repeat;
                                          background-position: center center;
                                        "
                                      ></div>
                                      <label
                                        for="carousel-2"
                                        class="absolute inset-y-0 left-0 z-10 hidden w-10 h-10 my-auto ml-2 font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer control-3 md:ml-10 hover:text-white hover:bg-blue-700"
                                        ><i class="mt-3 fas fa-angle-left"></i
                                      ></label>
                                      <label
                                        for="carousel-1"
                                        class="absolute inset-y-0 right-0 z-10 hidden w-10 h-10 my-auto mr-2 font-bold leading-tight text-center text-black bg-white rounded-full cursor-pointer next control-3 md:mr-10 hover:text-white hover:bg-blue-700"
                                        ><i class="mt-3 fas fa-angle-right"></i
                                      ></label>


                                      <!-- Add additional indicators for each slide-->
                                      <ol class="carousel-indicators">
                                        <li class="inline-block mr-3">
                                          <label
                                            for="carousel-1"
                                            class="block text-4xl text-white cursor-pointer carousel-bullet hover:text-blue-700"
                                            >•</label
                                          >
                                        </li>
                                        <li class="inline-block mr-3">
                                          <label
                                            for="carousel-2"
                                            class="block text-4xl text-white cursor-pointer carousel-bullet hover:text-blue-700"
                                            >•</label
                                          >
                                        </li>
                                        <li class="inline-block mr-3">
                                          <label
                                            for="carousel-3"
                                            class="block text-4xl text-white cursor-pointer carousel-bullet hover:text-blue-700"
                                            >•</label
                                          >
                                        </li>
                                      </ol>
                                    </div>
                                  </div>
                            </div>
                        </div> <!-- video wrapper -->
                    </div> <!-- video content -->
                </div>
                <div class="w-full lg:w-1/2">
                    <div class="pl-0 mt-12 counter-wrapper lg:pl-16 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                        <div class="counter-content">
                            <div class="mb-8 section-title">
                                <div class="line"></div>
                                <h3 class="title">Mr Kuku <span>Certificates</span></h3>
                            </div> <!-- section title -->
                            <p class="text">We are qualified and certified to provide you with the best services .</p>
                        </div> <!-- counter content -->
                        <div class="row no-gutters">
                            <div class="flex items-center justify-center single-counter counter-color-1">
                                <div class="text-center counter-items">
                                    <span class="text-2xl font-bold text-white"><span class="counter">125</span>K</span>
                                    <p class="text-white">Downloads</p>
                                </div>
                            </div> <!-- single counter -->
                        </div> <!-- row -->
                    </div> <!-- counter wrapper -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>


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
