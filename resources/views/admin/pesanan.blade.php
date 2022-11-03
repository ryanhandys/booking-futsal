@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div id="viewTable">
        <table class="table table-striped w-100" id="pesanan">
            <thead>
                <tr>
                    <th>
                        No
                    </th>
                    <th>
                        Nama Pemesanan
                    </th>
                    <th>
                        Tanggal
                    </th>
                    <th>
                        Jam Booking
                    </th>
                    <th>
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('js')
    
<script>
    $(document).ready( function () {

       dataTables();

       function dataTables(dt = 'null'){
           $('#viewTable').html(``);
           $(`#viewTable`).html(`<table class="table table-striped w-100" id="pesanan">
               <thead>
                   <tr>
                       <th>
                           No
                       </th>
                       <th>
                           Nama Pemesanan
                       </th>
                       <th>
                           Tanggal
                       </th>
                       <th>
                           Jam Booking
                       </th>
                       <th>
                           Aksi
                       </th>
                   </tr>   
               </thead>
               <tbody>
               </tbody>
           </table>`);
           $('#pesanan').DataTable({
               processing: true,
               serverSide: true,
               responsive: true,
               paging: false,
               searching: true,
               "order": [
                   [0, 'asc']
               ],
               ajax: "{{ route('pesanan.data') }}?tgl="+dt,
               columns: [
                   {
                       data: "DT_RowIndex"
                   },
                   {
                       data: "nama"
                   },
                   {
                       data: "tanggal"
                   },
                   {
                       data: "jam"
                   },
                   {
                       data: "id",
                       render: function(data){
                            return `<a href="`+data+`" role="button" class="btn btn-primary">Datang</a>`
                       }
                   },
               ]
           });
       }
   } );
</script>

@endsection