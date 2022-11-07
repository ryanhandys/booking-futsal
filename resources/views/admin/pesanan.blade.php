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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" action="{{ route('kode') }}">
            @csrf
            <input type="hidden" name="id_kode">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">SUDAH DATANG</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="kode" class="form-label">Kode Booking</label>
                    <input type="text" name="kode" class="form-control" id="kode">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
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
                            return `<button onclick="modal(`+data+`)" type="button" class="btn btn-primary">Datang</a>`
                       }
                   },
               ]
           });
       }
   } );

   function modal(id){
    $('input[name=id_kode]').val(id);
    $('#exampleModal').modal('show');
   }
</script>

@endsection