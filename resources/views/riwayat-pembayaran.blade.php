@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/riwayat.css') }}">
@endsection
@section('content')
<section class="container">
  <div style="color: white">
    <h2>Riwayat Pembayaran</h2>
  </div>
  <div class="row">
    @if (isset($transaksi))
    @foreach ($transaksi as $item)            
    <article class="col-5 m-2" style="background-color: rgba(236, 241, 241, 0.74)" >
      <section class="date">
        <time>
          <span>{{ Carbon\Carbon::parse($item->pemesanan->tanggal)->format('d') }}</span><span>{{ Carbon\Carbon::parse($item->pemesanan->tanggal)->format('M') }}</span>
        </time>
      </section>
      <section class="kartu-cont">
        <small>{{ $item->pemesanan_id }}</small>
        <h3>{{ strtoupper($item->pemesanan->user->nama) }}</h3>
        <div class="even-date">
          <i class="fa fa-calendar"></i>
          <time>
            <span>{{ Carbon\Carbon::parse($item->waktu_transaksi)->format('d M Y') }}</span>
            <span>
              @php
                  $pesanan1 = App\Models\Pemesanan::where('order_id', $item->pemesanan_id)
                              ->first();
                  $pesanan2 = App\Models\Pemesanan::where('order_id', $item->pemesanan_id)
                              ->orderBy('id', 'desc')
                              ->first();
                  if($pesanan1->id == $pesanan2->id){
                      echo $pesanan1->jam->jam_mulai."-".$pesanan1->jam->jam_selesai;
                  } else {
                      echo $pesanan1->jam->jam_mulai."-".$pesanan2->jam->jam_selesai;
                  }
              @endphp
            </span>
          </time>
        </div>
        <div class="even-info">
          <i class="fa fa-map-marker"></i>
          <p>
            Rp{{ number_format($item->biaya, 0, 0, '.') }}
          </p>
        </div>
        <P>
          @if ($item->status_transaksi == 'settlement')
              Dibayar
          @else
              Belum Bayar
          @endif
        </P>
      </section>
    </article>
    @endforeach
    @endif
  </div>
@endsection