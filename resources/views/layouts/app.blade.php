
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Malang Marketplace') }}
        </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
<!-- font-awesome icons -->
<link href="{{asset('css/fontawesome-all.min.css')}}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

</head>

<body style="background-color: #f2f6fc">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Malang Marketplace</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-lg-auto text-center">
      <li class="nav-item mr-3 mt-lg-0 mt-3">
        <a class="nav-link" href="{{url('/')}}">Beranda <span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Tempat Usaha</a>
      </li> -->
      <li class="nav-item dropdown mr-3 mt-lg-0 mt-3">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tempat Usaha
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Tempat</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Tempat Saya</a>
          <a class="dropdown-item" href="#">Tempat Favorit</a>
        </div>
      </li>
      <li class="nav-item dropdown mr-3 mt-lg-0 mt-3">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Produk
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Produk</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Produk Saya</a>
          <a class="dropdown-item" href="#">Produk Favorit</a>
        </div>
      </li>
      <li class="nav-item mr-3 mt-lg-0 mt-3">
        <a class="nav-link" href="/daftar">Daftar</a>
      </li>
      <li class="nav-item mr-3 mt-lg-0 mt-3">
        <a class="nav-link" href="#">Login</a>
      </li>
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>

<main class="py-3">
@yield('content')
</main>

<div class="cpy-right text-center py-4">
    <p class="text-black-50">© 2019 Marketplace Kab.Malang. All rights reserved </p>
</div>
</body>

</html>