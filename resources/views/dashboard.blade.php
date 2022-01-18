<x-app-layout>
    <x-slot name="title">
        {{ __('Dashboard') }}
    </x-slot>
    <div class="container px-6 py-8 mx-auto">

        <div class="grid w-full grid-cols-1 gap-4 mb-4 md:grid-cols-2 xl:grid-cols-3">

            <div class="p-4 bg-white rounded-lg shadow sm:p-6 xl:p-8 ">
                <div class="flex items-center">
                    <div class="mb-4 mr-4">
                        <img class="w-10 rounded-full h-9 " src="{{ asset('images/deposit.png') }}" alt="invoice">
                    </div>
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl">{{number_format($totalAmountInvested)}}
                            <span class="text-lg">Tshs</span></span>
                        <h3 class="text-base font-normal text-gray-500">Total Amount Invested</h3>
                    </div>
                </div>
            </div>

            <div class="p-4 bg-white rounded-lg shadow sm:p-6 xl:p-8 ">
                <div class="flex items-center">
                    <div class="mb-4 mr-1">
                        <img class="w-10 rounded-full h-9 " src="{{ asset('images/investments.png') }}" alt="invoice">
                    </div>
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl font-bold leading-none tracking-wide text-gray-900 sm:text-3xl">{{ number_format($amountInvestedThisWeek) }}
                            <span class="text-lg">Tshs</span></span>
                        <h3 class="text-base font-normal text-gray-500">Amount Invested This Week</h3>
                    </div>
                    <div class="flex items-center justify-end flex-1 w-0 ml-5 text-base font-bold text-green-500">
                        {{ $investmentFlow }}%
                        @if ($investmentFlow > 0)
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        @else
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M14.707 12.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l2.293-2.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        @endif
                    </div>
                </div>
            </div>
            <div class="p-4 bg-white rounded-lg shadow sm:p-6 xl:p-8 ">
                <div class="flex items-center">
                    <div class="mb-4 mr-4">
                        <img class="w-10 rounded-full h-9 " src="{{ asset('images/users.png') }}" alt="All users">
                    </div>
                    <div class="flex-shrink-0">
                        <span
                            class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl">{{ $users }}</span>
                        <h3 class="text-base font-normal text-gray-500">All Users Registered</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid w-full grid-cols-1 gap-4 xl:grid-cols-2 2xl:grid-cols-3">
            <div class="p-4 bg-white rounded-lg shadow sm:p-6 xl:p-8 2xl:col-span-2">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex-shrink-0">
                        <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl">{{number_format($totalAmountInvestedForSixMonths)}} <span class="text-lg">Tshs</span></span>
                        <h3 class="text-base font-normal text-gray-500">This is total amount Invested accumulated in the past 6 months</h3>
                    </div>

                </div>
                <div id="main-chart">
                    <canvas id="investment-flow-chart" class="w-full"></canvas>
                </div>
            </div>
            <div class="p-4 bg-white rounded-lg shadow sm:p-6 xl:p-8 ">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="mb-2 text-xl font-bold text-gray-900">Latest Investments</h3>
                        <span class="text-base font-normal text-gray-500">This is a short list of latest
                            transactions</span>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="#" class="p-2 text-sm font-medium rounded-lg text-cyan-600 hover:bg-gray-100">View
                            all</a>
                    </div>
                </div>
                <div class="flex flex-col mt-8">
                    <div class="overflow-x-auto rounded-lg">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-hidden shadow sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Transaction
                                            </th>
                                            <th scope="col"
                                                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                                Amount
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                                        @foreach ($latestTransactions as $transaction)
                                        <tr>
                                            <td class="p-4 text-sm font-normal text-gray-900 whitespace-nowrap">
                                                Payment from <span class="font-semibold">{{$transaction->investor->name}}</span>
                                            </td>
                                            <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap">
                                                {{number_format($transaction->amount)}}
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
        </div>



        <div class="grid grid-cols-1 my-4 2xl:grid-cols-2 xl:gap-4">
            <div class="h-full p-4 mb-4 bg-white rounded-lg shadow sm:p-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-bold leading-none text-gray-900">Top Investors</h3>
                    <a href="#"
                        class="inline-flex items-center p-2 text-sm font-medium rounded-lg text-cyan-600 hover:bg-gray-100">
                        View all
                    </a>
                </div>
                <span class="text-base font-normal text-gray-500">This is a list of our top investors with the highest
                    amount invested</span>
                <div class="flow-root mt-4">
                    <ul role="list" class="divide-y divide-gray-200">
                        @foreach ($topInvestors as $investor)
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <img class="w-8 h-8 rounded-full"
                                            src="{{ $investor->investor->profile_photo_url }}"
                                            alt="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate">
                                            {{ $investor->investor->name }}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate">
                                            {{ $investor->investor->email }}
                                        </p>
                                    </div>
                                    <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                        {{ number_format($investor->amount) }} Tshs
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="p-4 bg-white rounded-lg shadow sm:p-6 xl:p-8 ">
                <h3 class="mb-10 text-xl font-bold leading-none text-gray-900">Leading Projects</h3>
                <div class="max-w-xl my-4">
                    <canvas id="leading-project" class="w-full"></canvas>
                </div>
                <div class="block w-full overflow-x-auto">
                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="px-4 py-3 text-xs font-semibold text-left text-gray-700 uppercase align-middle border-l-0 border-r-0 bg-gray-50 whitespace-nowrap">
                                    Projects
                                </th>
                                <th
                                    class="px-4 py-3 text-xs font-semibold text-left text-gray-700 uppercase align-middle border-l-0 border-r-0 bg-gray-50 whitespace-nowrap">
                                    Total Amount Invested
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <tr class="text-gray-500">
                                <th
                                    class="p-4 px-4 text-sm font-normal text-left align-middle border-t-0 whitespace-nowrap">
                                   Chicken Rearing Project
                                </th>
                                <td
                                    class="p-4 px-4 text-xs font-medium text-gray-900 align-middle border-t-0 whitespace-nowrap">
                                    {{number_format($chickenSumAmount)}} Tshs
                                </td>
                            </tr>
                            <tr class="text-gray-500">
                                <th
                                    class="p-4 px-4 text-sm font-normal text-left align-middle border-t-0 whitespace-nowrap">
                                    Corn Farming Project
                                </th>
                                <td
                                    class="p-4 px-4 text-xs font-medium text-gray-900 align-middle border-t-0 whitespace-nowrap">
                                    {{number_format($cornSumAmount)}} Tshs
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <x-slot name="scripts">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
          const labels= Object.keys(@json( $investmentFlowByMonthForChickenProject))
          let chickenValuesNonFiltered=Object.values(@json( $investmentFlowByMonthForChickenProject))
          let cornValuesNonFiltered=Object.values(@json( $investmentFlowByMonthForCornProject))
          let  chickenValuesFiltered=[];
          let  cornValuesFiltered=[];

        chickenValuesNonFiltered.forEach(element => {
        element[0] ? chickenValuesFiltered.push(element[0].amount) : chickenValuesFiltered.push(0) ;
        });

        cornValuesNonFiltered.forEach(element => {
        element[0] ? cornValuesFiltered.push(element[0].amount) : cornValuesFiltered.push(0) ;
        });

const data = {
  labels: labels,
  datasets: [
    {
      label: 'Chicken Rearing Project',
      data: chickenValuesFiltered,
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
    },
    {
      label: 'Corn Farming Project',
      data: cornValuesFiltered,
      borderColor: 'rgb(255, 221, 97)',
      backgroundColor: 'rgb(255, 221, 97)',
    }
  ]
};


            const config = {
  type: 'line',
  data: data,
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Investment Flow for the past 6 months'
      }
    }
  },
};

const data2 = {
  labels: [
    'Chicken Rearing Project',
    'Corn Farming Project',
  ],
  datasets: [{
    label: 'My First Dataset',
    data: [ {{$chickenPercentage}}, {{$cornPercentage}} ],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
};

const config2 = {
  type: 'doughnut',
  data: data2,
};

const myChart = new Chart(
            document.getElementById('investment-flow-chart'),
            config
        );

        const myChart2 = new Chart(
            document.getElementById('leading-project'),
            config2
        );

        </script>
    </x-slot>

</x-app-layout>
