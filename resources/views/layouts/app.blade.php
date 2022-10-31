<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body {
            background-color: #1FC58E
        }
        .opened {
          background-color: rgb(34, 34, 34);
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

    @yield('css')
</head>
<body>
  
    <div class="py-5">
      <div class="w-100 d-flex px-4">
        <div class="w-50 d-flex">
            <img src="{{ asset('img/logo.png') }}" class="rounded-circle" alt="..." style="height: 100px; width: 100px">
            <div class="px-4">
              <h1 class="display-5 text-white fw-bold">Wellcome To..</h1>
              <h1 class="display-7 text-white fw-light fst-italic" style="margin-top: -1rem;">Bejo Futsal</h1>
            </div>
          </div>
          <div class="w-50 d-flex justify-content-end">
            @auth
            <div class="px-4">
              <h1 class="display-7 text-white fw-light fst-italic" style="margin-top: -1rem;">Hai Selamat Datang</h1>
              <h1 class="display-7 text-white fw-light fst-italic" style="margin-top: -1rem;">{{ auth()->user()->nama }}</h1>
            </div>
            @endauth
        </div>
      </div>
        <div class="card mt-3">
            <div class="card-body">
                
                @include('partials.navbar')

                @yield('content')
            </div>
        </div>
    </div>

    <footer class="py-3 my-4 bg-black">
      <center>
        <div>
          <p class="fw-semibold">Plaosan RT02/19 Tlogoadi Mlati Sleman Yogyakarta.</p>
          <p class="fw-semibold">0815-4835-8353 @ bejosportt</p>
        </div>
      </center>
      <p class="text-center text-muted">© 2022 Ryan Handysandoko</p>
    </footer>
    <div class="container">
    </div>
    
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>