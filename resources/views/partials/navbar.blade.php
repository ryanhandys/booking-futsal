<nav class="navbar navbar-expand-lg rounded-pill mb-4 d-none d-md-block" style="background-color: #000000">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav fw-bold me-auto">
            <li class="nav-item px-4">
                <a class="nav-link {{ (Request::is('/')) ? 'opened rounded-pill px-5' : ''}} text-white" href="{{ route('home') }}">Beranda</a>
            </li>
            <li class="nav-item px-4">
                <a class="nav-link {{ (Request::is('tentang-kami')) ? 'opened rounded-pill px-5' : ''}} text-white" href="{{ route('tentang-kami') }}">Tentang Kami</a>
            </li>
            <li class="nav-item px-4">
                <a class="nav-link {{ (Request::is('cara-booking')) ? 'opened rounded-pill px-5' : ''}} text-white" href="{{ route('cara-booking') }}">Cara Booking</a>
            </li>
            <li class="nav-item px-4">
                <a class="nav-link {{ (Request::is('jadwal')) ? 'opened rounded-pill px-5' : ''}} text-white" href="{{ route('jadwal') }}">Jadwal</a>
            </li>
            <li class="nav-item px-4">
                <a class="nav-link {{ (Request::is('riwayat-pembayaran')) ? 'opened rounded-pill px-5' : ''}} text-white" href="{{ route('riwayat-pembayaran') }}">Riwayat Pembayaran</a>
            </li>
        </ul>
        @auth
        <ul class="navbar-nav fw-bold">
            <li class="nav-item px-4">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="nav-link btn btn-success rounded-pill" type="submit">KELUAR</button>
                </form>
            </li>
        </ul>
        @else            
        <ul class="navbar-nav fw-bold">
            <li class="nav-item px-4">
                <a class="nav-link btn btn-success rounded-pill{{ (Request::is('login')) ? 'opened rounded-pill px-5' : ''}} text-white" href="{{ route('login') }}">MASUK</a>
            </li>
        </ul>
        @endauth
      </div>
    </div>
</nav>