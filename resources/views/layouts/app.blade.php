<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="{{ asset('img/log.gif') }}" type="image/x-icon">
    

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Bejo Futsal</title>
    <style>
        body {
            background-image: url("{{asset('img/bgrn.jpg')}}")
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
  
    <div>
      <div class="row px-4">
        <div class="col-6">
          <img src="{{asset('img/bgsmpg2.png')}}" alt="" class="pt-3" style="height:160px">
        </div>
        <div class="col-6 d-flex align-items-center justify-content-end">
          @auth
            <div class="px-4 pt-4">
              <h1 class="display-7 text-white fw-light fst-italic" style="margin-top: -1rem;">Selamat Datang</h1>
              <h1 class="display-7 text-white fw-light fst-italic" style="margin-top: -1rem;">{{ auth()->user()->nama }}</h1>
            </div>
          @endauth
        </div>
      </div>
        <div class="card mt-3 " style="background-color:rgba(250, 244, 244, 0.096)">
            <div class="card-body">
                
                @include('partials.navbar')

                @yield('content')
            </div>
        </div>
    </div>

    <footer class="py-3 my-4" style="background-color:rgba(6, 17, 48, 0.466); background-image: url('{{ asset("img/fut2.png") }}');
    background-repeat: repeat-x">
      <center>
        <div class="" style="color: white">
          <p class="fw-semibold">Plaosan RT02/19 Tlogoadi Mlati Sleman Yogyakarta.</p>
          <p class="fw-semibold">0815-4835-8353 @ bejosportt</p>
        </div>
      </center>
      <p class="text-center" style="color: white">© 2022 Ryan Handysandoko</p>
    </footer>
    <div class="container">
    </div>
    
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>