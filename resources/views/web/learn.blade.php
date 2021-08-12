@extends('layouts.app1')
@section('title')
    <title>Learn</title>
@endsection
@section('content')

    <div class="pt-8">
        <div class="container pt-16 mx-auto bg-gray-100">
            <div class="pb-3 text-center md:pb-10 xl:pb-20">
                {{-- <p class="mb-4 text-base leading-tight text-gray-600 uppercase lg:text-lg">start with the basics</p> --}}
                <h1 class="px-2 text-2xl font-extrabold text-gray-800 xl:px-0 xl:text-5xl md:text-3xl">Frequently Asked
                    Questions</h1>
            </div>
            <div class="w-10/12 mx-auto">
                <ul>
                    <li class="py-6 border-b border-gray-200 border-solid">
                        <div class="flex items-center justify-between">
                            <h2 class="w-10/12 text-base text-gray-800 md:text-xl xl:text-2xl">
                                How do I start investing ?
                            </h2>
                            <button data-menu
                                class="rounded-full cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
                                <div aria-label="open">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus"
                                        width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#A0AEC0"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="12" r="9" />
                                        <line x1="9" y1="12" x2="15" y2="12" />
                                        <line x1="12" y1="9" x2="12" y2="15" />
                                    </svg>
                                </div>
                                <div aria-label="close">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="hidden icon icon-tabler icon-tabler-circle-minus" width="36" height="36"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#A0AEC0" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="12" r="9" />
                                        <line x1="9" y1="12" x2="15" y2="12" />
                                    </svg>
                                </div>
                            </button>
                        </div>
                        <div class="hidden details">
                            <p
                                class="text-gray-800 bg-gray-100 rounded-b-lg ext-sm hiddenpt-2 md:pt-3 lg:pt-5 md:text-base xl:text-lg">
                                Please read the following guidelines on how you can invest in our projects.
                                <a href="{{ route('investments', '#how-to-invest') }}" target="_blank"
                                 class="text-blue-500 underline">
                                    Click here
                                </a>
                            </p>
                        </div>

                    </li>

                    <li class="py-6 border-b border-gray-200 border-solid">
                        <div class="flex items-center justify-between">
                            <h2 class="w-10/12 text-base text-gray-800 md:text-xl xl:text-2xl">
                                What is the minimum amount to invest ?
                            </h2>
                            <button data-menu
                                class="rounded-full cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
                                <div aria-label="open">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus"
                                        width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#A0AEC0"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="12" r="9" />
                                        <line x1="9" y1="12" x2="15" y2="12" />
                                        <line x1="12" y1="9" x2="12" y2="15" />
                                    </svg>
                                </div>
                                <div aria-label="close">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="hidden icon icon-tabler icon-tabler-circle-minus" width="36" height="36"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#A0AEC0" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="12" r="9" />
                                        <line x1="9" y1="12" x2="15" y2="12" />
                                    </svg>
                                </div>
                            </button>
                        </div>
                        <div class="hidden details">
                            <p
                                class="pt-2 text-sm text-gray-800 bg-gray-100 rounded-b-lg md:pt-3 lg:pt-5 md:text-base xl:text-lg">
                                The minimum amount to invest is Tshs 500,000. You can revise our investment packages
                                <a href="{{ route('investments') }}" target="_blank"
                                 class="text-blue-500 underline">
                                    here
                                </a>
                            </p>
                        </div>
                    </li>
                    <li class="py-6 border-b border-gray-200 border-solid">
                        <div class="flex items-center justify-between">
                            <h2 class="w-10/12 text-base text-gray-800 md:text-xl xl:text-2xl">How safe is my investment,
                                are there any risks ?</h2>
                            <button data-menu
                                class="rounded-full cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
                                <div aria-label="open">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus"
                                        width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#A0AEC0"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="12" r="9" />
                                        <line x1="9" y1="12" x2="15" y2="12" />
                                        <line x1="12" y1="9" x2="12" y2="15" />
                                    </svg>
                                </div>
                                <div aria-label="close">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="hidden icon icon-tabler icon-tabler-circle-minus" width="36" height="36"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#A0AEC0" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="12" r="9" />
                                        <line x1="9" y1="12" x2="15" y2="12" />
                                    </svg>
                                </div>
                            </button>
                        </div>
                        <div class="hidden details">
                            <p
                                class="pt-2 text-sm text-gray-800 bg-gray-100 rounded-b-lg md:pt-3 lg:pt-5 md:text-base xl:text-lg">
                                Yes there are risks which we have grouped them into three groups in which we have developed strategies for managing this risks.
                            </p>
                            <ul class="list-disc list-inside ">
                                <li class="my-2 text-base font-light">
                                    Natural disasters :- This risks are such as Earthquakes, Floods, Storms, Volcanic Eruptions . Since this risks are unpredictable
                                    we do not manage this kind of risks though the investor can also opt to insure his investment by using third parties such as insurance companies.
                                </li>
                                <li class="my-2 text-base font-light">
                                    Natural death :- This include the mortality rate of broiler chicken, where by biologically its ranges from 2% upto 6% of reared chicks, Due this case we advice our investor to add extra 10% of the number of chicks inorder to cover mortatily rate.
                                  For this chicks of mortality coverage, investor will required to pay only 1,500Tsh  per chick (Not 5,000 Tshs) .And the amount paid for mortality
                                     covarage will be refunded to the investor at the end of the contract.
                                </li>
                                <li class="my-2 text-base font-light">
                                    Management risks :- This are risks which are caused by poor management such as poor shelter, hunger and diseases which can be treated.
                                    For this kind of risks is very rarely tp occur to our projects since we have implement different mechanisms,techniques and strategies to control it, But if the risk occur Mr kuku farmers limited will incure the loss and the investor will get capital  and the ROI as we agreeed on the contract.
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="py-6 border-b border-gray-200 border-solid">
                        <div class="flex items-center justify-between">
                            <h2 class="w-10/12 text-base text-gray-800 md:text-xl xl:text-2xl">Why wait for 30 days for the
                                contract to officially start ?</h2>
                            <button data-menu
                                class="rounded-full cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
                                <div aria-label="open">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus"
                                        width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#A0AEC0"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="12" r="9" />
                                        <line x1="9" y1="12" x2="15" y2="12" />
                                        <line x1="12" y1="9" x2="12" y2="15" />
                                    </svg>
                                </div>
                                <div aria-label="close">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="hidden icon icon-tabler icon-tabler-circle-minus" width="36" height="36"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#A0AEC0" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="12" r="9" />
                                        <line x1="9" y1="12" x2="15" y2="12" />
                                    </svg>
                                </div>
                            </button>
                        </div>
                        <div class="hidden details">
                            <p
                                class="pt-2 text-sm text-gray-800 bg-gray-100 rounded-b-lg md:pt-3 lg:pt-5 md:text-base xl:text-lg">
                                The contract will start 30 days after deposit because of the current low supply of DOC (Day
                                Old Chick) from our suppliers compared to our demands
                                so the Client will have to wait for 30 days for the DOC to be delivered.
                            </p>
                        </div>
                    </li>
                    <li class="py-6 border-b border-gray-200 border-solid">
                        <div class="flex items-center justify-between">
                            <h2 class="w-10/12 text-base text-gray-800 md:text-xl xl:text-2xl">
                                What are the terms of the contract ?
                            </h2>
                            <button data-menu
                                class="rounded-full cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
                                <div aria-label="open">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus"
                                        width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#A0AEC0"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="12" r="9" />
                                        <line x1="9" y1="12" x2="15" y2="12" />
                                        <line x1="12" y1="9" x2="12" y2="15" />
                                    </svg>
                                </div>
                                <div aria-label="close">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="hidden icon icon-tabler icon-tabler-circle-minus" width="36" height="36"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#A0AEC0" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="12" r="9" />
                                        <line x1="9" y1="12" x2="15" y2="12" />
                                    </svg>
                                </div>
                            </button>
                        </div>
                        <div class="hidden details">
                            <p
                                class="pt-2 text-sm text-gray-800 bg-gray-100 rounded-b-lg md:pt-3 lg:pt-5 md:text-base xl:text-lg">
                                The general terms of the contract are
                            </p>
                            <ul class="list-disc list-inside ">
                                <li class="my-2 text-base font-light">
                                    Capital rotates for one year and can not be withdrawn in that time
                                </li>
                                <li class="my-2 text-base font-light">
                                    Profit can be withdrawn either monthly, after 3 or 6 months or annually
                                </li>
                            </ul>
                        </div>

                    </li>
                    <li class="py-6 border-b border-gray-200 border-solid">
                        <div class="flex items-center justify-between">
                            <h2 class="w-10/12 text-base text-gray-800 md:text-xl xl:text-2xl">
                                What happens after the contract has ended ?
                            </h2>
                            <button data-menu
                                class="rounded-full cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
                                <div aria-label="open">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus"
                                        width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#A0AEC0"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="12" r="9" />
                                        <line x1="9" y1="12" x2="15" y2="12" />
                                        <line x1="12" y1="9" x2="12" y2="15" />
                                    </svg>
                                </div>
                                <div aria-label="close">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="hidden icon icon-tabler icon-tabler-circle-minus" width="36" height="36"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#A0AEC0" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="12" r="9" />
                                        <line x1="9" y1="12" x2="15" y2="12" />
                                    </svg>
                                </div>
                            </button>
                        </div>
                        <div class="hidden details">
                            <p
                                class="pt-2 text-sm text-gray-800 bg-gray-100 rounded-b-lg md:pt-3 lg:pt-5 md:text-base xl:text-lg">
                                After the contract has ended you can choose either to renew your contract for another year
                                or if you choose not to continue with us you can withdraw your capital and the 10 %
                                deposited to cover the risk of natural death of chicks.
                            </p>
                        </div>

                    </li>
                    <li class="py-6 border-b border-gray-200 border-solid">
                        <div class="flex items-center justify-between">
                            <h2 class="w-10/12 text-base text-gray-800 md:text-xl xl:text-2xl">
                                What is the current total number of investors we have?
                            </h2>
                            <button data-menu
                                class="rounded-full cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
                                <div aria-label="open">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-plus"
                                        width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#A0AEC0"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="12" r="9" />
                                        <line x1="9" y1="12" x2="15" y2="12" />
                                        <line x1="12" y1="9" x2="12" y2="15" />
                                    </svg>
                                </div>
                                <div aria-label="close">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="hidden icon icon-tabler icon-tabler-circle-minus" width="36" height="36"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#A0AEC0" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="12" cy="12" r="9" />
                                        <line x1="9" y1="12" x2="15" y2="12" />
                                    </svg>
                                </div>
                            </button>
                        </div>
                        <div class="hidden details">
                            <p
                                class="pt-2 text-sm text-gray-800 bg-gray-100 rounded-b-lg md:pt-3 lg:pt-5 md:text-base xl:text-lg">
                                We current have more than 200 investors in our projects
                            </p>
                        </div>

                    </li>
                </ul>
            </div>
        </div>

    </div>

@endsection
@section('scripts')
    <script>
        let elements = document.querySelectorAll("[data-menu]");
        for (let i = 0; i < elements.length; i++) {
            let main = elements[i];
            main.addEventListener("click", function() {
                let element = main.parentElement.parentElement;
                let andicators = main.querySelectorAll("svg");
                let child = element.querySelector(".details");
                child.classList.toggle("hidden");
                if (child.classList.contains("hidden")) {
                    andicators[0].style.display = "block";
                    andicators[1].style.display = "none";
                } else {
                    andicators[0].style.display = "none";
                    andicators[1].style.display = "block";
                }
            });
        }
    </script>

@endsection
