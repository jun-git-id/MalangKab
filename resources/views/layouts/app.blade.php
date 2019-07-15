
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
    <script src="{{ asset('js/jquery.js') }}" defer></script>

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

    <!-- font-awesome icons -->
<link href="{{asset('css/fontawesome-all.min.css')}}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/core-style.css')}}">
    <!-- <link href="{{asset ('css/responsive.css')}}" rel="stylesheet"> -->

    <!-- <link rel="stylesheet" href="css/core-style.css"> -->
    <!-- <link href="css/responsive.css" rel="stylesheet"> -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/assets/owl.theme.default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/owl.carousel.min.js"></script> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

</head>

<body style="background-color: #f2f6fc">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Malang Marketplace</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">


              <ul class="navbar-nav ml-lg-auto text-center">

                  <li class="nav-item mr-3 mt-lg-0 mt-3">
                      <a class="nav-link" href="/">Beranda <span class="sr-only">(current)</span></a>
                  </li>
                  <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Tempat Usaha</a>
                  </li> -->
                  <li class="nav-item dropdown mr-3 mt-lg-0 mt-3">
                      <a class="nav-link dropdown-toggle" href="/input" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Kategori
                      </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="/input">Hotel</a>
                              <a class="dropdown-item" href="/Tempat">Bengkel</a>
                          </div>
                  </li>
                  <li class="nav-item dropdown mr-3 mt-lg-0 mt-3">
                      <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Tempat Usaha
                      </a>
                      @guest
                          @else
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="#">Tempat</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Tempat Saya</a>
                          <a class="dropdown-item" href="#">Tempat Favorit</a>
                      </div>
                          @endguest
                  </li>
                  <li class="nav-item dropdown mr-3 mt-lg-0 mt-3">

                      <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Produk
                      </a>
                      @guest
                      @else
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="#">Produk</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Produk Saya</a>
                          <a class="dropdown-item" href="#">Produk Favorit</a>
                      </div>
                          @endguest

                  </li>
                  @guest
                      <li class="nav-item mr-3 mt-lg-0 mt-3">
                          <a class="nav-link" data-toggle="modal" data-target="#exampleModal" href="#">Login</a>
                      </li>
                      @if (Route::has('register'))
                          <li class="nav-item mr-3 mt-lg-0 mt-3">
                              <a class="nav-link" href="/register">Daftar</a>
                          </li>
                      @endif
                  @else
                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->username }} <span class="caret"></span>
                          </a>

                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="/editProfile/{{Auth::user()->id}}">
                                  {{ __('Edit Profile') }}
                              </a>
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                          </div>
                      </li>
                  @endguest

              </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->
  </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="exampleModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="head-login-modal" style="padding:35px 50px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4><span class="fas fa-lock"></span> Login</h4>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email"><span class="fas fa-user"></span> Email / Username</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                               placeholder="Enter email / Username">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password"><span class="fas fa-eye"></span> Password</label>
                        <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"  placeholder="Enter password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="remember"><input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Remember Me</label>
                    </div>
                    <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
                </form>

                <p>Not a member? <a href="/register">Sign Up</a></p>
                <p> <a href="#">Forgot Password?</a></p>
            </div>
        </div>

    </div>
</div>
</div>


<main class="py-3">
@yield('content')
</main>

<div class="cpy-right text-center py-4">
    <p class="text-black-50">© 2019 Marketplace Kab.Malang. All rights reserved </p>
</div>
</body>

</html>