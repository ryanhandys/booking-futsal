@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-flex mb-2">
        <div class="col-4">
            <label for="bulan" class="form-label">Bulan</label>
            <select class="form-select form-select-lg mb-3" name="bulan">
                <option disabled selected>Bulan</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
        </div>
        <div class="col-8 text-right">
            <button type="button"onclick="cetak()" class="btn btn-primary">Cetak</button>
        </div>
    </div>
    <div id="viewTable">
        <table class="table table-striped w-100" id="pesanan">
            <thead>
                <tr>
                    <th>
                        No
                    </th>
                    <th>
                        Tanggal
                    </th>
                    <th>
                        Kegiatan
                    </th>
                    <th>
                        Harga
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

        $('select[name=bulan]').change(function(){
            dataTables($('select[name=bulan]').val());
        })

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
                            Tanggal
                        </th>
                        <th>
                            Kegiatan
                        </th>
                        <th id="harga">
                            Harga
                        </th>
                    </tr>   
                </thead>
                <tbody>
                </tbody>
                <tfooter>
                    <tr>
                        <th colspan="3" class="text-right">Total</th>
                        <th id="total"></th>
                    </tr>
                </tfooter>
           </table>`);
           $('#pesanan').DataTable({
               processing: true,
               serverSide: true,
               responsive: true,
               paging: false,
               searching: false,
               "order": [
                   [0, 'asc']
               ],
               ajax: "{{ route('laporan.data') }}?bulan="+dt,
               columns: [
                   {
                       data: "DT_RowIndex"
                   },
                   {
                       data: "tanggal"
                   },
                   {
                       data: "jam"
                   },
                   {
                        data: "harga",
                        render: function(data){
                            return "Rp"+formatRupiah(""+data)
                        }
                    }
               ],
               "footerCallback": function(row, data){
                var tot = 0;
                    for(var i = 0; i < data.length; i++){
                        tot += Number.parseInt(data[i].harga);
                    }
                    $('#total').html("Rp"+formatRupiah(""+tot, ));
                }                
           });
       }
   } );

   function formatRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if(ribuan){
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? rupiah : 0;
   }

   function modal(id){
    $('input[name=id_kode]').val(id);
    $('#exampleModal').modal('show');
   }

   function cetak(){
    window.print();
   }
</script>

@endsection