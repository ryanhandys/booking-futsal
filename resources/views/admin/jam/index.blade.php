@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        

        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="d-flex justify-content-between">
                <span>
                    {{ session('success') }}
                </span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="nav-icon fas fa-times"></i>
                </button>
            </div>
        </div>
        @endif

        <div class="w-100 d-flex justify-content-between align-items-center pb-3">
            <div>
                <h4>
                    Data Jam dan Harga
                </h4>
            </div>
            <a href="{{ route('jam.tambah') }}" class="btn btn-primary">(+) Tambah</a>
        </div>
    
        <table class="table table-striped w-100" id="jadwal">
            <thead>
                <tr>
                    <th>
                        No
                    </th>
                    <th>
                        Jam
                    </th>
                    <th>
                        Harga
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

@endsection

@section('js')
    
<script>
    $(document).ready(function(){
        var table = $('#jadwal').DataTable({
            processing: true,
            serverSide: true,
            paging: false,
            searching: false,
            "order": [
                [0, 'desc']
            ],
            ajax: "{{ route('jam.data') }}",
            columns: [
                {
                    data: 'DT_RowIndex',
                    width: "8%",
                    className: "text-center"
                },
                {
                    data: "jam"
                },
                {
                    data: "harga"
                },
                {
                    data: "id",
                    width: "8%",
                    className: "text-center",
                    render: function(data) {
                        return `<div class="d-flex justify-content-between">
                                    <a class="btn btn-danger" href="jam/hapus/`+data+`" role="button"><i class="nav-icon fas fa-trash"></i></a>
                                    <div class="mx-2"></div>
                                    <a class="btn btn-success" href="jam/ubah/`+data+`" role="button"><i class="nav-icon fas fa-pencil-alt"></i></a>
                                </div>`
                    }
                },
            ]
        });
    })
</script>
@endsection