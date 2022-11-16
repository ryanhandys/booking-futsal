@extends('layouts.app')

@section('css')

@if (Session::has('token'))
<script type="text/javascript"
src="https://app.midtrans.com/snap/snap.js"
data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
@endif
    
@endsection

@section('content')

{{-- input tanggal --}}
<form action="{{ route('pesan.store') }}" method="post">
    @csrf
    <div class="d-flex justify-content-between px-5">
        <div>
            <input type="date" name="tgl" id="tgl" required>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
    
    <div class="px-5" id="viewTable">
        <table class="table table-striped w-100 text-white" id="jadwal">
            <thead>
                <tr>
                    <th>
                        Jam
                    </th>
                    <th>
                        Harga
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        <span>Pilih</span>
                    </th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</form>

<script>
    $(document).ready( function () {
        var date = new Date();
        var tgl = date.getDate();
        var bln = date.getMonth() + 1;
        var thn = date.getFullYear();

        $('#tgl').val(thn+'-'+bln+'-'+tgl);

        dataTables();

        $('#tgl').change(function(){
            var dt = $('#tgl').val();
            dataTables(dt);
        })

        function dataTables(dt = 'null'){
            $('#viewTable').html(``);
            $(`#viewTable`).html(`<table class="table w-100 text-white" id="jadwal">
                <thead>
                    <tr>
                        <th>
                            Jam
                        </th>
                        <th>
                            Harga
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            <span>Pilih</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>`);
            $('#jadwal').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                paging: false,
                searching: false,
                "order": [
                    [0, 'asc']
                ],
                ajax: "{{ route('tgl.jadwal') }}?tgl="+dt,
                columns: [
                    {
                        data: "jam"
                    },
                    {
                        data: "harga"
                    },
                    {
                        data: "status"
                    },
                    {
                        data: "check",
                        render: function(data){
                            return `<input type="checkbox" name="jam[]" value="${data}" id="">`
                        }
                    },
                ]
            });
        }
    } );
</script>

@endsection

@section('js')
    @if (Session::has('token'))
    <script type="text/javascript">
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{ session("token") }}', {
          onSuccess: function(result){
            /* You may add your own implementation here */
            alert("payment success!"); console.log(result);
          },
          onPending: function(result){
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        })
        document.querySelector('#snap-midtrans').style.display = 'block';
    </script>
    @endif
@endsection