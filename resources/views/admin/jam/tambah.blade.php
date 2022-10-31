@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
    
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Input Jam & Harga</h3>
            </div>
            
            @if (isset($id))
            <form class="form-horizontal" method="POST" action="{{ route('jam.edit') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $id->id }}">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputJam" class="col-sm-2 col-form-label">Jam</label>
                        <div class="col-sm-10 d-flex">
                            <input type="number" class="form-control col-sm-2" name="jam_mulai" id="inputJam" placeholder="Jam Mulai" value="{{ $id->jam_mulai }}">
                            <span class="my-2 d-flex justify-content-center col-sm-1">s.d</span>
                            <input type="number" class="form-control col-sm-2" name="jam_selesai" id="inputJam" placeholder="Jam Selesai" value="{{ $id->jam_selesai }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputHarga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control col-sm-5" name="harga" id="inputHarga" placeholder="Harga" value="{{ $id->harga }}">
                        </div>
                    </div>
                </div>
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <a href="{{ route('jam') }}" class="btn btn-default float-right">Batal</a>
                </div>
                
            </form>
            @else
            <form class="form-horizontal" method="POST" action="{{ route('jam.simpan') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputJam" class="col-sm-2 col-form-label">Jam</label>
                        <div class="col-sm-10 d-flex">
                            <input type="number" class="form-control col-sm-2" name="jam_mulai" id="inputJam" placeholder="Jam Mulai">
                            <span class="my-2 d-flex justify-content-center col-sm-1">s.d</span>
                            <input type="number" class="form-control col-sm-2" name="jam_selesai" id="inputJam" placeholder="Jam Selesai">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputHarga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control col-sm-5" name="harga" id="inputHarga" placeholder="Harga">
                        </div>
                    </div>
                </div>
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <a href="{{ route('jam') }}" class="btn btn-default float-right">Batal</a>
                </div>
                
            </form>
            @endif
            
        </div>

    </div>

@endsection