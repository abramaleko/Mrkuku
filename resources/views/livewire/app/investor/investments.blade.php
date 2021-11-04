    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <x-slot name="title">
        {{ __('My Investments') }}
    </x-slot>

    <x-slot name="styles">
        <!--Regular Datatables CSS-->
        <link href="{{ asset('css/dataTables.min.css') }}" rel="stylesheet">
        <!--Responsive Extension Datatables CSS-->
        <link href="{{ asset('css/responsiveDataTables.min.css') }}" rel="stylesheet">
    </x-slot>

    <div class="container px-6 py-8 mx-auto">
        <h1 class="text-2xl font-bold tracking-tighter text-gray-700 lg:text-3xl lg:py-0 lg:tracking-wide">
            {{ Auth::user()->name }} Investments</h1>
        <button class="block px-8 py-2 mt-6 font-light tracking-wide text-white bg-gray-800 lg:py-3 hover:bg-gray-600">
            NEW INVESTMENT
        </button>

        <div class="p-8 mt-8 bg-white rounded-md" wire:ignore>
            <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1">S/N</th>
                        <th data-priority="2">Project</th>
                        <th data-priority="3">Amount</th>
                        <th data-priority="4">Status</th>
                        <th data-priority="5">Date</th>
                        {{-- <th data-priority="6">Date</th> --}}
                        <th data-priority="6"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user_investments as $investment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $investment->project->name }}</td>
                            <td>{{ number_format($investment->amount) }}</td>
                            <td>
                                @if ($investment->status == 1)
                                    Active
                                @elseif($investment->status == 2)
                                    Inactive
                                @else
                                    Ended
                                @endif
                            </td>
                            <td>{{ $investment->created_at->format('jS F Y') }}</td>
                            <td>
                                @if ($investment->invoice_id != '')
                                    <a href="{{route('investor.print-invoice',$investment->id)}}" target="_blank"
                                        class="px-6 tracking-tighter text-green-600 hover:text-green-900">
                                        View Invoice
                                    </a>
                                    @else
                                    <a wire:click="generateInvoice({{$investment->id}})" wire:loading.class="hidden"
                                    class="px-6 tracking-tighter text-green-600 cursor-pointer hover:text-green-900">
                                    Generate Invoice
                                   </a>
                                   <div wire:loading wire:target="generateInvoice"
                                   class="px-6 tracking-tighter text-green-700">
                                        Processing ...
                                   </div>
                                @endif
                                 @if ($investment->invoice_id)
                                 <a href="{{route('investor.invoice-details',$investment->id)}}" target="_blank" class="px-6 text-indigo-600 hover:text-indigo-900">Details</a>
                                 @endif
                                @if ( ! $investment->verified)
                                   <a wire:click="deleteInvoice({{$investment->id}})" class="px-6 text-red-700 cursor-pointer hover:text-red-900">Delete</a>
                                @endif
                            </td>
                        </tr>

                    @endforeach
                </tbody>

            </table>
        </div>


    </div>

    <x-slot name="scripts">
        <!-- jQuery -->
        <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>

        <!--Datatables -->
        <script src="{{ asset('js/datatables.min.js') }}"></script>
        <script>
            $(document).ready(function() {

                var table = $('#example').DataTable({
                        responsive: true
                    })
                    .columns.adjust()
                    .responsive.recalc();
            });
        </script>
    </x-slot>
