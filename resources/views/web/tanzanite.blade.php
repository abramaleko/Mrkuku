@extends('layouts.app1')
@section('title')
    <title>Tanzanite package</title>
@endsection
@section('content')
    <section class="mx-8 mt-8 lg:ml-10">
        <h2 class="text-4xl font-bold tracking-tighter text-gray-800 lg:tracking-normal ">Tanzanite Package</h2>
        <p class="my-4 text-lg font-light text-left text-gray-600">
            The minimum capital for this package is Tshs 10,000,000/- .
        </p>

        <div class="mt-4 compulsory-benefits">
            <h2 class="mt-6 mb-3 text-2xl font-bold ">
                Compulsory benefits
            </h2>
            <ul class="text-lg font-light text-gray-600 list-disc list-outside">
                <li class="py-2">
                    In every month you will get a 10% ROI (Return On Investment) of the amount investment
                </li>

                <li class="py-2">
                    Annualy (12 months) you will get a 120% ROI (Return On Investment) of the amount invested
                </li>
            </ul>
        </div>

        <div class="mt-4 other-benefits">
            <h2 class="mt-6 mb-3 text-2xl font-bold ">
                Other Benefits
            </h2>
            <ul class="text-lg font-light text-gray-600 list-disc list-outside">
                <li class="py-2">
                    If you will not withdraw your ROI (10%) in 3 months which is a total of 30% ROI, a bonus of 20% from the
                    30% ROI will be awarded

                </li>

                <li class="py-2">
                    If you will not withdraw your ROI (10%) in 6 months which is a total of 60% ROI, a bonus of 50% from the
                    60% ROI will be awarded
                </li>

                <li class="py-2">
                    If you will not withdraw your ROI (10%) in 12 months which is a total of 120% ROI, a bonus of 80% from the
                    120% ROI will be awarded
                </li>
            </ul>
        </div>
          <h2 class="my-2 text-2xl font-extrabold leading-loose tracking-wide">NOTE :</h2>
          <p class="text-lg font-light leading-relaxed tracking-normal text-left text-gray-600">
             Normally after depositing the capital, you will have to wait for 30 days for the contract to offically start. But if you choose
             to opt for 6 or 12 months ROI (Return on Investment) withdrawal the contract will start immediately after deposit and ROI will be
             paid immediately after maturity.
          </p>

    </section>

    </div>
@endsection
