@extends('layouts.app1')
@section('title')
    <title>Gold package</title>
@endsection
@section('content')
    <section class="mt-8 ml-10">
        <h2 class=" text-gray-800 font-bold text-4xl ">Gold package</h2>
        <p class="text-gray-600 font-light text-lg text-left my-4">
            The minimum capital for this package is Tshs 500,000/- and the maximum is Tshs 4,999,999/-
        </p>

        <div class="compulsory-benefits mt-4">
            <h2 class="font-bold text-2xl mt-6 mb-3 ">
                Compulsory benefits
            </h2>
            <ul class="list-disc list-outside text-lg text-gray-600 font-light">
                <li class="py-2">
                    In every month you will get a 10% ROI (Return On Investment) of the amount investment
                </li>

                <li class="py-2">
                    Annualy (12 months) you will get a 120% ROI (Return On Investment) of the amount invested
                </li>
            </ul>
        </div>

        <div class="other-benefits mt-4">
            <h2 class="font-bold text-2xl mt-6 mb-3 ">
                Other Benefits
            </h2>
            <ul class="list-disc list-outside text-lg text-gray-600 font-light">
                <li class="py-2">
                    If you will not withdraw your ROI (10%) in 3 months which is a total of 30% ROI, a bonus of 10% from the
                    30% ROI will be awarded

                </li>

                <li class="py-2">
                    If you will not withdraw your ROI (10%) in 6 months which is a total of 60% ROI, a bonus of 30% from the
                    60% ROI will be awarded
                </li>

                <li class="py-2">
                    If you will not withdraw your ROI (10%) in 12 months which is a total of 120% ROI, a bonus of 40% from the
                    120% ROI will be awarded
                </li>
            </ul>
        </div>
          <h2 class="font-extrabold text-2xl my-2 tracking-wide leading-loose">NOTE :</h2>
          <p class="text-lg text-left leading-relaxed tracking-normal font-light text-gray-600">
             Normally after depositing the capital, you will have to wait for 30 days for the contract to offically start. But if you choose
             to opt for 6 or 12 months ROI (Return on Investment) withdrawal the contract will start immediately after deposit and ROI will be
             paid immediately after maturity.
          </p>

    </section>

    </div>
@endsection
