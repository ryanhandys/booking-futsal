<nav class="navbar navbar-expand-lg  mb-4 d-none d-md-block" style="background-color: #000000">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav fw-bold me-auto">
            <li class="nav-item px-4">
                <a class="nav-link {{ (Request::is('/')) ? 'opened  px-5' : ''}} text-white" href="{{ route('home') }}">Beranda</a>
            </li>
            <li class="nav-item px-4">
                <a class="nav-link {{ (Request::is('tentang-kami')) ? 'opened  px-5' : ''}} text-white" href="{{ route('tentang-kami') }}">Tentang Kami</a>
            </li>
            <li class="nav-item px-4">
                <a class="nav-link {{ (Request::is('cara-booking')) ? 'opened  px-5' : ''}} text-white" href="{{ route('cara-booking') }}">Cara Booking</a>
            </li>
            <li class="nav-item px-4">
                <a class="nav-link {{ (Request::is('jadwal')) ? 'opened  px-5' : ''}} text-white" href="{{ route('jadwal') }}">Jadwal</a>
            </li>
            <li class="nav-item px-4">
                <a class="nav-link {{ (Request::is('riwayat-pembayaran')) ? 'opened  px-5' : ''}} text-white" href="{{ route('riwayat-pembayaran') }}">Riwayat Pembayaran</a>
            </li>
        </ul>
        @auth
        <ul class="navbar-nav fw-bold">
            <li class="nav-item px-4">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="nav-link px-5 btn text-white " type="submit"style="background-color: rgb(20, 65, 102) ">KELUAR</button>
                </form>
            </li>
        </ul>
        @else            
        <ul class="navbar-nav fw-bold">
            <li class="nav-item px-4">
                <a class="nav-link btn px-5 text-white" href="{{ route('login') }}" style="background-color: rgb(20, 65, 102)">MASUK</a>
            </li>
        </ul>
        @endauth
      </div>
    </div>
</nav>