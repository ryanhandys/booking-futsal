@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/riwayat.css') }}">
@endsection
@section('content')
<section class="container">
    <h1>Riwayat Pembayaran</h1>
      <div class="row">
        @if (isset($transaksi))
        @foreach ($transaksi as $item)            
        <article class="kartu fl-left" style="background-color: rgb(236, 240, 3)" >
            <section class="date">
              <time datetime="23th feb">
                <span>23</span><span>feb</span>
              </time>
            </section>
            <section class="kartu-cont">
              <small>dj khaled</small>
              <h3>live in sydney</h3>
              <div class="even-date">
               <i class="fa fa-calendar"></i>
               <time>
                 <span>wednesday 28 december 2014</span>
                 <span>08:55pm to 12:00 am</span>
               </time>
              </div>
              <div class="even-info">
                <i class="fa fa-map-marker"></i>
                <p>
                  nexen square for people australia, sydney
                </p>
              </div>
              <a href="#">tickets</a>
            </section>
        </article>
        @endforeach
        @endif
      </div>
    </div>
@endsection