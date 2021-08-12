@extends('layouts.app1')
@section('title')
  <title>Investments</title>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/investments.css') }}">
@endsection
@section('content')
    <div class="mt-8 header">
        <h2 class="py-4 font-bold tracking-wide text-center uppercase lg:py-8 header-text">
            Investments
        </h2>
        <p class="px-4 text-justify text-gray-500 lg:text-center lg:px-40 header-text2 font-extralight">
            Mr kuku Farmers Ltd is the first of its kind platform to deliver direct access to the cash flow returns at the
            agribusiness projects. </p>
    </div>

    <div class="mx-3 mt-20 border-2 border-gray-400 packages lg:py-8 lg:mx-10 rounded-xl">
        <h2 class="mt-4 font-bold tracking-wide text-center uppercase header-text lg:mt-0">
            Investment packages
        </h2>
        <p class="px-4 pt-6 font-light tracking-tight text-gray-600 lg:px-10 lg:text-justify ltext-center header-text2">
            Create an attractive, tax advantaged, consistent income stream by investing primarily in cash flowing into
            our Broiler poultry farms
        </p>

        <div class="grid grid-cols-1 mx-8 my-8 lg:grid-cols-3 lg:gap-4">
            <!-- Gold package -->
            <div class="mb-12 border-2 border-gray-300 rounded-md lg:mb-0">
                <h2 class="px-4 py-2 text-xl font-bold text-gray-700 ">Gold</h2>
                <p class="px-4 text-base text-gray-500">The minimum capital for this package is</p>
                <p class="px-4 text-4xl font-extrabold text-gray-800 my-7">500,000/-</p>
                <a href="{{ route('investments.gold') }}" target="_blank"
                    class="flex justify-center px-8 py-2 mx-4 tracking-widest text-white uppercase bg-gray-800 border border-transparent rounded-md hover:bg-gray-600">
                    LEARN MORE
                </a>
                <div class="my-4 border-b border-gray-500 "></div>
                <div class="px-4 pb-4 text-base font-bold text-gray-700 ">
                    WHAT'S INCLUDED
                </div>

                <ul class="pr-1 ml-4 text-left">

                    <li class="flex py-4">
                        <img src="{{ asset('images/icons/check.png') }}" class="w-6 h-6 mr-4">
                        Fixed ROI *10 monthly
                    </li>

                    <li class="flex py-4">
                        <img src="{{ asset('images/icons/check.png') }}" class="w-6 h-6 mr-4">
                        Fixed ROI 120% annually
                    </li>

                    <li class="flex py-4">
                        <img src="{{ asset('images/icons/check.png') }}" class="w-6 h-6 mr-4">
                        Fixed 10% bonus,if ROI has not been withdrawn in 3 months
                    </li>

                    <li class="flex py-4">
                        <img src="{{ asset('images/icons/check.png') }}" class="w-6 h-6 mr-4">
                        Fixed 30% bonus,if ROI has not been withdrawn in 6 months
                    </li>

                    <li class="flex py-4">
                        <img src="{{ asset('images/icons/check.png') }}" class="w-6 h-6 mr-4">
                        Fixed 40% bonus,if ROI has not been withdrawn in 12 months
                    </li>

                </ul>


            </div>

            <!-- Diamond package -->
            <div class="mb-12 border-2 border-gray-300 rounded-md lg:mb-0">
                <h2 class="px-4 py-2 text-xl font-bold text-gray-700 ">Diamond</h2>
                <p class="px-4 text-base text-gray-500">The minimum capital for this package is</p>
                <p class="px-4 text-4xl font-extrabold text-gray-800 my-7">5,000,000/-</p>
                <a href="{{ route('investments.diamond') }}" target="_blank"
                    class="flex justify-center px-8 py-2 mx-4 tracking-widest text-white uppercase bg-gray-800 border border-transparent rounded-md hover:bg-gray-600">
                    LEARN MORE
                </a>
                <div class="my-4 border-b border-gray-500 "></div>
                <div class="px-4 pb-4 text-base font-bold text-gray-700 ">
                    WHAT'S INCLUDED
                </div>

                <ul class="pr-1 ml-4 text-left">

                    <li class="flex py-4">
                        <img src="{{ asset('images/icons/check.png') }}" class="w-6 h-6 mr-4">
                        Fixed ROI *10 monthly
                    </li>

                    <li class="flex py-4">
                        <img src="{{ asset('images/icons/check.png') }}" class="w-6 h-6 mr-4">
                        Fixed ROI 120% annually
                    </li>

                    <li class="flex py-4">
                        <img src="{{ asset('images/icons/check.png') }}" class="w-6 h-6 mr-4">
                        Fixed 15% bonus,if ROI has not been withdrawn in 3 months
                    </li>

                    <li class="flex py-4">
                        <img src="{{ asset('images/icons/check.png') }}" class="w-6 h-6 mr-4">
                        Fixed 40% bonus,if ROI has not been withdrawn in 6 months
                    </li>

                    <li class="flex py-4">
                        <img src="{{ asset('images/icons/check.png') }}" class="w-6 h-6 mr-4">
                        Fixed 60% bonus,if ROI has not been withdrawn in 12 months
                    </li>

                </ul>


            </div>

            <!-- Tanzanite package -->
            <div class="border-2 border-gray-300 rounded-md ">
                <h2 class="px-4 py-2 text-xl font-bold text-gray-700 ">Tanzanite</h2>
                <p class="px-4 text-base text-gray-500">The minimum capital for this package is</p>
                <p class="px-4 text-4xl font-extrabold text-gray-800 my-7">10,000,000/-</p>
                <a href="{{ route('investments.tanzanite') }}" target="_blank"
                    class="flex justify-center px-8 py-2 mx-4 tracking-widest text-white uppercase bg-gray-800 border border-transparent rounded-md hover:bg-gray-600">
                    LEARN MORE
                </a>
                <div class="my-4 border-b border-gray-500 "></div>
                <div class="px-4 pb-4 text-base font-bold text-gray-700 ">
                    WHAT'S INCLUDED
                </div>

                <ul class="pr-1 ml-4 text-left">

                    <li class="flex py-4">
                        <img src="{{ asset('images/icons/check.png') }}" class="w-6 h-6 mr-4">
                        Fixed ROI *10 monthly
                    </li>

                    <li class="flex py-4">
                        <img src="{{ asset('images/icons/check.png') }}" class="w-6 h-6 mr-4">
                        Fixed ROI 120% annually
                    </li>

                    <li class="flex py-4">
                        <img src="{{ asset('images/icons/check.png') }}" class="w-6 h-6 mr-4">
                        Fixed 20% bonus,if ROI has not been withdrawn in 3 months
                    </li>

                    <li class="flex py-4">
                        <img src="{{ asset('images/icons/check.png') }}" class="w-6 h-6 mr-4">
                        Fixed 50% bonus,if ROI has not been withdrawn in 6 months
                    </li>

                    <li class="flex py-4">
                        <img src="{{ asset('images/icons/check.png') }}" class="w-6 h-6 mr-4">
                        Fixed 80% bonus,if ROI has not been withdrawn in 12 months
                    </li>

                </ul>


            </div>

        </div>
    </div>

    <div class="mx-4 my-3 lg:mx-10 how-to-invest " id="how-to-invest">
        <h2 class="mt-24 font-bold tracking-wide lg:tracking-widest header-text">HOW DO I START INVESTING ?</h2>
        <p class="mt-5 text-gray-500 lea4ding-relaxed header-text2 font-extralight">
            To start investing in Mr Kuku projects please kindly visit any of our branches which we will help you to get more informations and procedures to join our projects.
        </p>
        <ol class="my-6 list-decimal list-outside">

            <li class="my-4">
                <p class="text-2xl font-bold text-gray-700">Personal Information of the customer</p>
                <p class="py-2 text-lg font-medium leading-relaxed text-left text-gray-500">
                    We will require some personal information such as your full name,contact details such as email,phone number (what'sapp number preferable)
                    also your current physical residence
                </p>
            </li>

            <li class="my-4">
                <p class="text-2xl font-bold text-gray-700">Amount to invest</p>
                <p class="py-2 text-lg font-medium text-left text-gray-500">
                    We will need to know the amount of capital which you want to invest or the number of chicks which
                    will be reared in our poultry farms.Each chick costs a sum of Tshs 5,000 untill it's fully grown and ready to be sold,
                     here is the breakdown of the cost for rearing each chick
                    </p>
                     <ul class="list-disc list-inside">
                         <li class="my-2 text-base font-light">
                             DOC (Day Old Chick) - 1,500
                         </li>
                         <li class="my-2 text-base font-light">
                            Food & Medicine - 2,700
                        </li>
                        <li class="my-2 text-base font-light">
                            Management - 800
                        </li>
                     </ul>
            </li>

            <li class="my-4">
                <p class="text-2xl font-bold text-gray-700">Preparation of Profoma Invoices</p>
                <p class="py-2 text-lg font-medium text-left text-gray-500">
                    We will provide you with two invoices to pay which are explained as follows
                </p>
                    <ul class="list-disc list-inside">
                        <li class="my-2 text-base font-light">
                            Invoice for Mrkuku which is the tshs 800 for each chick
                        </li>
                        <li class="my-2 text-base font-light">
                           Invoice for Bravo feed Mills which includes the 1,500 and 2,700 for each chick.
                       </li>
                    </ul>
            </li>

            <li class="my-4">
                <p class="text-2xl font-bold text-gray-700">Deposit</p>
                <p class="py-2 text-lg font-medium text-left text-gray-500">
                    You will have a duration of 30 days to make deposits before the performa invoice has expired.we prefer bank direct deposits, We do not support payments via mobile payments or Sim banking.
                </p>
            </li>

            <li class="my-4">
                <p class="text-2xl font-bold text-gray-700">Signing of a Contract</p>
                <p class="py-2 text-lg font-medium text-left text-gray-500">
                    When you're contract is ready, you are required to come with the following
                </p>
                <ul class="list-disc list-inside">
                    <li class="my-2 text-base font-light">
                        You're performa invoices
                    </li>
                    <li class="my-2 text-base font-light">
                        Original bank pay slips of the proforma invoices
                    </li>
                    <li class="my-2 text-base font-light">
                       A copy of your ID (NIDA,Driving Licence or Voting Id)
                   </li>
                   <li class="my-2 text-base font-light">
                    Next of Kin information
                </li>
                </ul>
            </li>


        </ol>

    </div>

    <div class="mx-4 my-6 lg:mx-10 invest-us">
        <h2 class="mt-24 font-bold tracking-wide lg:tracking-widest header-text">WHY INVEST WITH US ?</h2>
        <p class="mt-6 leading-relaxed text-gray-500 header-text2 font-extralight">
            Mr kuku farmers platform disintermediates this flawed investment model, by providing a platform of
            agriculture projects designed to generate cash flow returns from the farms directly back to investors.
        </p>

        <div class="mt-5 invest-details">

            <div class="details">
                <h2 class="text-2xl font-bold ">
                    Connecting Investors with the Agri-business
                </h2>
                <p class="mt-4 leading-relaxed text-left text-gray-500 header-text2 font-extralight">
                    Mr kuku Farmers is the first of its kind platform to deliver direct access to the cash flow returns at
                    the agribusiness infarming contract projects.
                    No more flawed incentives for third-party capital managers to reinvest cash flow into capital-
                    destructive growth or M&A transactions and risk an investment because of lack of knowledge on
                    management.
                    Instead, we connect individual investments with the direct economic returns from individual out farming
                    contract projects.
                    We put you in charge of how to allocate your capital and monitor, by offering a selection of different
                    well managed projects to choose from based on your risk/return objectives.
                </p>
            </div>

            <div class="mt-6 details">
                <h2 class="text-2xl font-bold">
                    Vetted Projects from Industry Experts
                </h2>
                <p class="mt-4 leading-relaxed text-left text-gray-500 header-text2 font-extralight">
                    Each project that introduced onto our platform gets vetted by our team of industry experts, with decades
                    of experience in curating and managing agribusiness projects. This requires a disciplined approach in
                    sourcing deals, managing land lease agreements, operations and back office legal/accounting
                    considerations.
                    You get access to the critical details needed to select and monitor each investment, and we take care of
                    the rest.
                </p>
            </div>

            <div class="mt-6 details">
                <h2 class="text-2xl font-bold">
                    Our Shared Incentive: Return Cash to Investors
                </h2>
                <p class="mt-4 leading-relaxed text-left text-gray-500 header-text2 font-extralight">
                    Each of our project introduced in platform comes with a hurdle rate of return, and cash payout target
                    for investors.
                    Only after clearing this return objective, do we begin participating in the remaining upside along with
                    you.
                    This means our expert team has only one incentive throughout each step of the process: select the
                    highest quality projects, with the best chance of delivering cash payouts to investors.
                </p>
            </div>


        </div>
    </div>

@endsection
