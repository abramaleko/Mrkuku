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

    <!-- component -->
    <section>
        <div class="container max-w-full px-6 py-3 mx-auto lg:py-24" id="invest-packages">
            <h2 class="mt-4 font-bold tracking-wide text-center uppercase header-text lg:mt-0">
                Investment packages
            </h2>
            <p class="px-6 mt-2 text-lg text-center text-gray-700">
                 Create an attractive, tax advantaged, consistent income stream by investing primarily in cash flowing into
            our Broiler poultry farms
            </p>
            <div class="w-24 h-1 mx-auto mt-4 bg-indigo-200 rounded opacity-75"></div>

            <div class="max-w-full mx-auto my-3 md:max-w-6xl md:px-8">
                <div class="relative flex flex-col items-center block md:flex-row">
                    <div class="relative z-0 w-11/12 max-w-sm my-8 rounded-lg shadow-lg sm:w-3/5 lg:w-1/3 sm:my-5 md:-mr-4">
                        <div class="overflow-hidden text-black bg-white rounded-lg shadow-lg shadow-inner">
                            <div class="block max-w-sm px-8 mx-auto mt-2 text-sm text-left text-black sm:text-md lg:px-6">
                                <h1 class="p-3 pb-0 text-lg font-medium tracking-wide text-center uppercase">
                                    Diamond
                                </h1>
                                <h2 class="pb-6 text-sm text-center text-gray-500"><span class="text-3xl">Tshs 5,000,000</span> /yr</h2>

                                This is the minimum capital for this package

                            </div>

                            <div class="flex flex-wrap px-6 mt-3">
                                <ul>
                                    <li class="flex items-center py-1">
                                        <div class="p-2 text-green-700 rounded-full fill-current ">
                                            <svg class="w-6 h-6 align-middle" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                            </svg>
                                        </div>
                                        <span class="mx-3 text-base text-gray-700">Fixed ROI *10 monthly</span>
                                    </li>
                                    <li class="flex items-center py-1">
                                        <div class="p-2 text-green-700 rounded-full fill-current ">
                                            <svg class="w-6 h-6 align-middle" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                            </svg>
                                        </div>
                                        <span class="mx-3 text-base text-gray-700">Fixed ROI 120% annually</span>
                                    </li>
                                    <li class="flex items-center py-2">
                                        <div class="p-2 text-green-700 rounded-full fill-current ">
                                            <svg class="w-6 h-6 align-middle" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                            </svg>
                                        </div>
                                        <span class="mx-3 text-base text-gray-700">Fixed 15% bonus,if ROI has not been withdrawn in 3 months</span>
                                    </li>
                                    <li class="flex items-center py-2">
                                        <div class="p-2 text-green-700 rounded-full fill-current ">
                                            <svg class="w-6 h-6 align-middle" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                            </svg>
                                        </div>
                                        <span class="mx-3 text-base text-gray-700">Fixed 40% bonus,if ROI has not been withdrawn in 6 months</span>
                                    </li>
                                    <li class="flex items-center py-2">
                                        <div class="p-2 text-green-700 rounded-full fill-current ">
                                            <svg class="w-6 h-6 align-middle" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                            </svg>
                                        </div>
                                        <span class="mx-3 text-base text-gray-700">Fixed 60% bonus,if ROI has not been withdrawn in 12 months</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="flex items-center block p-8 uppercase">
                                <a  href="{{ route('investments.diamond') }}" target="_blank" class="block w-full py-3 mt-3 text-lg font-semibold text-center text-white bg-black rounded-lg shadow-xl hover:bg-gray-700">
                                    LEARN MORE
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="relative z-10 w-full max-w-md my-8 bg-white rounded-lg shadow-lg sm:w-2/3 lg:w-1/3 sm:my-5">
                        <div
                            class="py-4 text-sm font-semibold leading-none tracking-wide text-center text-black uppercase bg-gray-200 rounded-t-lg">
                            Most Popular
                        </div>
                        <div class="block max-w-sm px-8 mx-auto mt-2 text-sm text-left text-black sm:text-md lg:px-6">
                            <h1 class="p-3 pb-0 text-lg font-medium tracking-wide text-center uppercase">
                                Gold
                            </h1>
                            <h2 class="pb-6 text-sm text-center text-gray-500"><span class="text-3xl">Tshs 500,000</span> /yr</h2>
                            This is the minimum capital for this package
                        </div>
                        <div class="flex justify-start pl-4 mt-3 sm:justify-start">
                            <ul>
                                <li class="flex items-center py-2">
                                    <div class="px-2 text-green-700 rounded-full fill-current">
                                        <svg class="w-6 h-6 align-middle" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                    </div>
                                    <span class="mx-3 text-base text-gray-700">Fixed ROI *10 monthly</span>
                                </li>
                                <li class="flex items-center py-2">
                                    <div class="p-2 text-green-700 rounded-full fill-current ">
                                        <svg class="w-6 h-6 align-middle" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                    </div>
                                    <span class="mx-3 text-base text-gray-700">Fixed ROI 120% annually</span>
                                </li>
                                <li class="flex items-center py-2">
                                    <div class="p-2 text-green-700 rounded-full fill-current ">
                                        <svg class="w-6 h-6 align-middle" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                    </div>
                                    <span class="mx-3 text-base text-gray-700">Fixed 10% bonus,if ROI has not been withdrawn in 3 months</span>
                                </li>
                                <li class="flex items-center py-2">
                                    <div class="p-2 text-green-700 rounded-full fill-current ">
                                        <svg class="w-6 h-6 align-middle" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                    </div>
                                    <span class="mx-3 text-base text-gray-700">Fixed 30% bonus,if ROI has not been withdrawn in 6 months
                                    </span>
                                </li>
                                <li class="flex items-center py-2">
                                    <div class="p-2 text-green-700 rounded-full fill-current ">
                                        <svg class="w-6 h-6 align-middle" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                        </svg>
                                    </div>
                                    <span class="mx-3 text-base text-gray-700">Fixed 40% bonus,if ROI has not been withdrawn in 12 months
                                    </span>
                                </li>
                            </ul>
                        </div>

                        <div class="flex items-center block p-8 uppercase">
                            <a  href="{{ route('investments.gold') }}" target="_blank" class="block w-full py-3 mt-3 text-lg font-semibold text-center text-white bg-black rounded-lg shadow-xl hover:bg-gray-700">
                                LEARN MORE
                            </a>
                        </div>
                    </div>
                    <div class="relative z-0 w-11/12 max-w-sm my-8 rounded-lg shadow-lg sm:w-3/5 lg:w-1/3 sm:my-5 md:-ml-4">
                        <div class="overflow-hidden text-black bg-white rounded-lg shadow-lg shadow-inner">
                            <div class="block max-w-sm px-8 mx-auto mt-2 text-sm text-left text-black sm:text-md lg:px-6">
                                <h1 class="p-3 pb-0 text-lg font-medium tracking-wide text-center uppercase">
                                    Tanzanite
                                </h1>
                                <h2 class="pb-6 text-sm text-center text-gray-500"><span class="text-3xl">Tshs 10,000,000</span> /yr</h2>

                                This is the minimum capital for this package
                            </div>
                            <div class="flex flex-wrap px-6 mt-3">
                                <ul>
                                    <li class="flex items-center py-1">
                                        <div class="p-2 text-green-700 rounded-full fill-current ">
                                            <svg class="w-6 h-6 align-middle" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                            </svg>
                                        </div>
                                        <span class="mx-3 text-base text-gray-700">Fixed ROI *10 monthly</span>
                                    </li>
                                    <li class="flex items-center py-1">
                                        <div class="p-2 text-green-700 rounded-full fill-current ">
                                            <svg class="w-6 h-6 align-middle" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                            </svg>
                                        </div>
                                        <span class="mx-3 text-base text-gray-700">Fixed ROI 120% annually</span>
                                    </li>
                                    <li class="flex items-center py-1">
                                        <div class="p-2 text-green-700 rounded-full fill-current ">
                                            <svg class="w-6 h-6 align-middle" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                            </svg>
                                        </div>
                                        <span class="mx-3 text-base text-gray-700">Fixed 20% bonus,if ROI has not been withdrawn in 3 months</span>
                                    </li>
                                    <li class="flex items-center py-1">
                                        <div class="p-2 text-green-700 rounded-full fill-current ">
                                            <svg class="w-6 h-6 align-middle" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                            </svg>
                                        </div>
                                        <span class="mx-3 text-base text-gray-700">Fixed 50% bonus,if ROI has not been withdrawn in 6 months</span>
                                    </li>
                                    <li class="flex items-center py-1">
                                        <div class="p-2 text-green-700 rounded-full fill-current ">
                                            <svg class="w-6 h-6 align-middle" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                            </svg>
                                        </div>
                                        <span class="mx-3 text-base text-gray-700">Fixed 80% bonus,if ROI has not been withdrawn in 12 months</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="flex items-center block p-8 uppercase">
                                <a  href="{{ route('investments.tanzanite') }}" target="_blank" class="block w-full py-3 mt-3 text-lg font-semibold text-center text-white bg-black rounded-lg shadow-xl hover:bg-gray-700">
                                    LEARN MORE
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="mx-6 my-3 lg:mx-10 how-to-invest " id="how-to-invest">
        <h2 class="mt-24 font-bold tracking-wide lg:tracking-wide header-text">HOW DO I START INVESTING ?</h2>
        <p class="mt-5 text-gray-500 lea4ding-relaxed header-text2 font-extralight">
            To start investing in Mr Kuku projects please kindly visit any of our branches in which we will help you
            to get started in only this few steps.
        </p>
        <section class="text-gray-600 body-font">
            <div class="container flex flex-wrap py-16">
              <div class="relative flex pt-10 pb-20 mx-auto sm:items-center md:w-2/3">
                <div class="absolute inset-0 flex items-center justify-center w-6 h-full">
                  <div class="w-1 h-full bg-gray-200 pointer-events-none"></div>
                </div>
                <div class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-6 h-6 mt-10 text-sm font-medium text-white bg-indigo-500 rounded-full sm:mt-0 title-font">1</div>
                <div class="flex flex-col items-start flex-grow pl-6 md:pl-8 sm:items-center sm:flex-row">
                  <div class="inline-flex items-center justify-center flex-shrink-0 w-24 h-24 text-indigo-500 bg-indigo-100 rounded-full">
                    <img src="{{asset('images/user.png')}}" alt="user" class="w-12 h-12">
                  </div>
                  <div class="flex-grow mt-6 sm:pl-6 sm:mt-0">
                    <h2 class="mb-1 text-xl font-medium text-gray-900 title-font">Personal Information</h2>
                    <p class="leading-relaxed">
                        We will require some personal information such as your full name,contact details such as email,phone
                        number (what'sapp number preferable)
                        also your current physical residence
                    </p>
                  </div>
                </div>
              </div>
              <div class="relative flex pb-20 mx-auto sm:items-center md:w-2/3">
                <div class="absolute inset-0 flex items-center justify-center w-6 h-full">
                  <div class="w-1 h-full bg-gray-200 pointer-events-none"></div>
                </div>
                <div class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-6 h-6 mt-10 text-sm font-medium text-white bg-indigo-500 rounded-full sm:mt-0 title-font">2</div>
                <div class="flex flex-col items-start flex-grow pl-6 md:pl-8 sm:items-center sm:flex-row">
                  <div class="inline-flex items-center justify-center flex-shrink-0 w-24 h-24 text-indigo-500 bg-indigo-100 rounded-full">
                    <img src="{{asset('images/amount.png')}}" alt="user" class="w-12 h-12">
                  </div>
                  <div class="flex-grow mt-6 sm:pl-6 sm:mt-0">
                    <h2 class="mb-1 text-xl font-medium text-gray-900 title-font">Amount to invest</h2>
                    <p class="leading-relaxed">
                        We will need to know the amount of capital which you want to invest or the number of chicks which
                        will be reared in our poultry farms.Each chick costs a sum of Tshs 5,000 untill it's fully grown and
                        ready to be sold, to see the breakdown cost for rearing each chick.
                        <div x-data="{show:false}">
                            <a @click="show = ! show " x-text=" show ? 'Hide' : 'Show'" class="pt-2 text-green-400 cursor-pointer hover:underline" ></a>
                            <ul
                            x-show="show"
                            class="list-disc list-inside">
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
                        </div>

                    </p>
                  </div>
                </div>
              </div>
              <div class="relative flex pb-20 mx-auto sm:items-center md:w-2/3">
                <div class="absolute inset-0 flex items-center justify-center w-6 h-full">
                  <div class="w-1 h-full bg-gray-200 pointer-events-none"></div>
                </div>
                <div class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-6 h-6 mt-10 text-sm font-medium text-white bg-indigo-500 rounded-full sm:mt-0 title-font">3</div>
                <div class="flex flex-col items-start flex-grow pl-6 md:pl-8 sm:items-center sm:flex-row">
                  <div class="inline-flex items-center justify-center flex-shrink-0 w-24 h-24 text-indigo-500 bg-indigo-100 rounded-full">
                    <img src="{{asset('images/invoice.png')}}" alt="user" class="w-12 h-12">
                  </div>
                  <div class="flex-grow mt-6 sm:pl-6 sm:mt-0">
                    <h2 class="mb-1 text-xl font-medium text-gray-900 title-font">Preparation of Profoma Invoices</h2>
                    <p class="leading-relaxed">
                        We will provide you with two invoices to pay which are explained as follows
                        <ul class="list-disc list-inside">
                            <li class="my-1 text-base font-light">
                                Invoice for Mrkuku which is the Tshs 800 for each chick
                            </li>
                            <li class="my-1 text-base font-light">
                                Invoice for Bravo feed Mills which includes the 1,500 and 2,700 Tshs for each chick.
                            </li>
                        </ul>
                    </p>
                  </div>
                </div>
              </div>
              <div class="relative flex pb-10 mx-auto sm:items-center md:w-2/3">
                <div class="absolute inset-0 flex items-center justify-center w-6 h-full">
                  <div class="w-1 h-full bg-gray-200 pointer-events-none"></div>
                </div>
                <div class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-6 h-6 mt-10 text-sm font-medium text-white bg-indigo-500 rounded-full sm:mt-0 title-font">4</div>
                <div class="flex flex-col items-start flex-grow pl-6 md:pl-8 sm:items-center sm:flex-row">
                  <div class="inline-flex items-center justify-center flex-shrink-0 w-24 h-24 text-indigo-500 bg-indigo-100 rounded-full">
                    <img src="{{asset('images/deposit.png')}}" alt="user" class="w-12 h-12">
                  </div>
                  <div class="flex-grow mt-6 sm:pl-6 sm:mt-0">
                    <h2 class="mb-1 text-xl font-medium text-gray-900 title-font">Deposit</h2>
                    <p class="leading-relaxed">
                        You will have a duration of 30 days to make deposits before the profoma invoices have expired. We prefer
                        bank direct deposits, We do not support payments via mobile payments or Sim banking.
                    </p>
                  </div>
                </div>
              </div>
              <div class="relative flex pb-10 mx-auto sm:items-center md:w-2/3">
                <div class="absolute inset-0 flex items-center justify-center w-6 h-full">
                  <div class="w-1 h-full bg-gray-200 pointer-events-none"></div>
                </div>
                <div class="relative z-10 inline-flex items-center justify-center flex-shrink-0 w-6 h-6 mt-10 text-sm font-medium text-white bg-indigo-500 rounded-full sm:mt-0 title-font">5</div>
                <div class="flex flex-col items-start flex-grow pl-6 md:pl-8 sm:items-center sm:flex-row">
                  <div class="inline-flex items-center justify-center flex-shrink-0 w-24 h-24 text-indigo-500 bg-indigo-100 rounded-full">
                    <img src="{{asset('images/contract.png')}}" alt="user" class="w-12 h-12">
                  </div>
                  <div class="flex-grow mt-6 sm:pl-6 sm:mt-0">
                    <h2 class="mb-1 text-xl font-medium text-gray-900 title-font">Sign Contract</h2>
                    <p class="leading-relaxed">
                        When you're contract is ready, you are required to come with the following.
                        <ul class="list-disc list-inside">
                            <li class="my-1 text-base font-light">
                                You're profoma invoices
                            </li>
                            <li class="my-1 text-base font-light">
                                Original bank pay slips of the proforma invoices
                            </li>
                            <li class="my-1 text-base font-light">
                                A copy of your ID (NIDA,Driving Licence or Voting Id)
                            </li>
                            <li class="my-1 text-base font-light">
                                Next of Kin information
                            </li>
                        </ul>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </section>

    </div>

    <div class="mx-6 my-6 lg:mx-10 invest-us">
        <h2 class="mt-4 font-bold tracking-wide lg:mt-24 lg:tracking-widest header-text">WHY INVEST WITH US ?</h2>
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

@section('scripts')
<script>
    var botmanWidget = {
        frameEndpoint: '{{route("botman")}}',
        title:  'Mr.Kuku Bot',
        introMessage: 'Hello, I am Mr.KuKu bot 🐔 and what is your name. You can start by saying My name is ... ',
        bubbleAvatarUrl: '{{asset('images/logo.jpeg')}}',
        mainColor: '#3292db',
        headerTextColor: '#fff',
        aboutText: 'Powered By Mr.Kuku systems',
        aboutLink: 'https://mrkuku.org/'
    };

    </script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
@endsection
