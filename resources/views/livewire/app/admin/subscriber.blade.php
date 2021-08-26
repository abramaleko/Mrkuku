<x-slot name="title">
    Subscribers
 </x-slot>
 <x-slot name="styles">
     <!--Regular Datatables CSS-->
      <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
      <!--Responsive Extension Datatables CSS-->
      <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
 </x-slot>

     {{-- Success is as dangerous as failure. --}}
     <div id='recipients' class="p-8 mt-6 bg-white rounded shadow lg:mt-0">

         <h2 class="my-4 text-3xl text-gray-700 lg:my-8">Subscribers</h2>
         <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
             <thead>
                 <tr>
                     <th data-priority="1">S/N</th>
                     <th data-priority="2">Email</th>
                     <th data-priority="3">Date</th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($subscribers as $subscriber)
                 <tr>
                 <td class="text-center">{{$loop->iteration}}</td>
                 <td class="text-center">{{$subscriber->email}}</td>
                 <td class="text-center">{{$subscriber->created_at->toDayDateTimeString()}}</td>
                 </td>
             </tr>

                 @endforeach
             </tbody>

         </table>


     </div>



 <x-slot name="scripts">
     <!-- jQuery -->
     <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

     <!--Datatables -->
     <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
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
