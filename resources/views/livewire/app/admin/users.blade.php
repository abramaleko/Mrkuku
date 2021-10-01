<x-slot name="title">
   User Management
</x-slot>
<x-slot name="styles">
    <!--Regular Datatables CSS-->
	 <link href="{{asset('css/dataTables.min.css')}}" rel="stylesheet">
	 <!--Responsive Extension Datatables CSS-->
	 <link href="{{asset('css/responsiveDataTables.min.css')}}" rel="stylesheet">
</x-slot>

    {{-- Success is as dangerous as failure. --}}
    <div id='recipients' class="p-8 mt-6 bg-white rounded shadow lg:mt-0">

        <h2 class="my-4 text-3xl text-gray-700 lg:my-8">Users</h2>
        <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1">Name</th>
                    <th data-priority="2">Email</th>
                    <th data-priority="3">Phone number</th>
                    <th data-priority="5"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td class="text-center ">{{$user->phone_no}}</td>
                <td>
                    <a href="{{route('admin.user.details',$user->id)}}"
                    class="text-blue-600 cursor-pointer hover:underline">
                    View
                </a>
                </td>
            </tr>

                @endforeach
            </tbody>

        </table>


    </div>



<x-slot name="scripts">
    <!-- jQuery -->
	<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>

	<!--Datatables -->
	<script src="{{asset('js/datatables.min.js')}}"></script>
	<script>
		$(document).ready(function() {

			var table = $('#example').DataTable( {
					responsive: true
				} )
				.columns.adjust()
				.responsive.recalc();
		} );

	</script>
</x-slot>
