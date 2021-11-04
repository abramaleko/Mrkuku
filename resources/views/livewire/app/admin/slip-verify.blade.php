    {{-- Success is as dangerous as failure. --}}
    <x-slot name="title">
        {{ __('Verification Center') }}
    </x-slot>

    <x-slot name="styles">
        <!--Regular Datatables CSS-->
        <link href="{{ asset('css/dataTables.min.css') }}" rel="stylesheet">
        <!--Responsive Extension Datatables CSS-->
        <link href="{{ asset('css/responsiveDataTables.min.css') }}" rel="stylesheet">
    </x-slot>

    <div class="container px-6 py-8 mx-auto">
        <h1 class="text-2xl font-bold tracking-tighter text-gray-700 lg:text-3xl lg:py-0 lg:tracking-wide">
            Verification Center
        </h1>
        <p class="mt-4 text-base leading-relaxed text-justify text-gray-500 font-extralight">
            Hello {{ Auth::user()->name }}, welcome to Verification center here you can
            verify investor's payment slips and also review payment slips verified by you.
        </p>

        <div class="flex flex-wrap mt-8">
            <a id="showPending"
                class="px-8 py-3 font-light tracking-widest text-center text-white bg-blue-500 rounded cursor-pointer hover:bg-blue-400"
                style="width: 20rem;">
                Pending Verification

            </a>
            <a id="showVerified"
                class="px-8 py-3 mt-4 font-light tracking-widest text-center text-white bg-green-500 rounded cursor-pointer hover:bg-green-400 lg:mt-0 lg:ml-4"
                style="width: 20rem;">
                Verified
            </a>
        </div>
        <div id="pending">
            <h2 class="mt-8 text-xl font-bold tracking-tighter text-gray-700 lg:text-2xl lg:py-0 lg:tracking-wide">
                Pending Verification
            </h2>

            <div class="flex flex-col mt-8" id="pendingslips">
                <div class="p-8 bg-white rounded-md">
                    @if (count($pendingSlips) >0)
                    <table id="example" class="stripe hover"
                    style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1">S/N</th>
                            <th data-priority="2">Invoice No</th>
                            <th data-priority="3">Investor Name</th>
                            <th data-priority="4">Submitted on</th>
                            <th data-priority="5"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendingSlips as $slip)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $slip->invoice_number }}</td>
                                <td class="text-center">{{ $slip->investor_name }}</td>
                                <td class="text-center">{{ Carbon\Carbon::parse($slip->updated_at)->format('jS F Y') }}</td>
                                <td class="text-center">
                                    <a href="{{route('admin.payment-detail',$slip->id)}}" class="text-indigo-600 hover:text-indigo-900">Details</a>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>

                </table>
                    @else
                    <h3 class="text-lg text-center text-gray-600 lg:text-2xl text-wide">No data found </h3>
                    @endif
                </div>

            </div>
        </div>
        <div id="verified" class="hidden ">
            <h2 class="mt-8 text-xl font-bold tracking-tighter text-gray-700 lg:text-2xl lg:py-0 lg:tracking-wide">
                Verified Payment Slips
            </h2>

            <div class="flex flex-col mt-8" id="pendingslips">
                <div class="p-8 bg-white rounded-md">
                    @if (count($verifiedSlips) >0)
                    <table id="example" class="stripe hover"
                    style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1">S/N</th>
                            <th data-priority="2">Invoice No</th>
                            <th data-priority="3">Investor Name</th>
                            <th data-priority="4">Submitted on</th>
                            <th data-priority="5"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($verifiedSlips as $slip)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $slip->invoice_number }}</td>
                                <td class="text-center">{{ $slip->investor_name }}</td>
                                <td class="text-center">{{ Carbon\Carbon::parse($slip->updated_at)->format('jS F Y') }}</td>
                                <td class="text-center">
                                    <a href="{{route('admin.payment-detail',$slip->id)}}" class="text-indigo-600 hover:text-indigo-900">Details</a>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>

                </table>
                    @else
                         <h3 class="text-lg text-center text-gray-600 lg:text-2xl text-wide">No data found </h3>
                    @endif

                </div>

            </div>

        </div>
    </div>

    <x-slot name="scripts">
        <!-- jQuery -->
        <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>

        <!--Datatables -->
        <script src="{{ asset('js/datatables.min.js') }}"></script>
        <script>
            $(document).ready(function() {

                $("#showPending").click(function() {
                    $("#pending").show();
                    $("#verified").hide();
                });


                $("#showVerified").click(function() {
                    $("#verified").show();
                    $("#pending").hide();
                });

                var table = $('#example').DataTable({
                        responsive: true
                    })
                    .columns.adjust()
                    .responsive.recalc();
            });
        </script>
    </x-slot>
