@extends('layouts.app')

@section('content')
<head>
<link rel="stylesheet" href="css/TempatU.css">
<link rel="stylesheet" href="css/style.css">
</head>
<div class="container">
<form>
  <input class="search" type="text" placeholder="Cari..." required>	
  <input class="button" type="button" value="Cari">		
</form>
</div>
<div class="container">
<div class="row">
<div class="btn-group col-lg-4">
  <button type="button" class="btn dropdown-toggle px-5 ml-5 mr-5 " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Pilih Kecamatan
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">AMPELGADING</a>
    <a class="dropdown-item" href="#">BANTUR</a>
    <a class="dropdown-item" href="#">BULULAWANG</a>
    <a class="dropdown-item" href="#">DAMPIT</a>
  </div>
  <button type="button" class="btn dropdown-toggle px-5 ml-5 mr-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Pilih Desa
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">xx</a>
    <a class="dropdown-item" href="#">yy</a>
    <a class="dropdown-item" href="#">zz</a>
    <a class="dropdown-item" href="#">DAM</a>
  </div>
  <button type="button" class="btn 
   dropdown-toggle px-5 ml-5 mr-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Pilih Kategori
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">xx</a>
    <a class="dropdown-item" href="#">yy</a>
    <a class="dropdown-item" href="#">zz</a>
    <a class="dropdown-item" href="#">DAM</a>
  </div>
</div>
</div>
</div>

    {{--card--}}
    <div class="container ">
        <div class="row">
            <div class="col-lg-3 mt-4 d-flex">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('img/kebun.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <div class="row ml-0">
                            <p><i class="fas fa-heart"></i> 8</p>
                            <p><i class="fas fa-star ml-4"></i> 5.0</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mt-4 d-flex">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('img/kebun.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <div class="row ml-0">
                            <p><i class="fas fa-heart"></i> 8</p>
                            <p><i class="fas fa-star ml-4"></i> 5.0</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mt-4 d-flex">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('img/kebun.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <div class="row ml-0">
                            <p><i class="fas fa-heart"></i> 8</p>
                            <p><i class="fas fa-star ml-4"></i> 5.0</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mt-4 d-flex">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('img/kebun.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <div class="row ml-0">
                            <p><i class="fas fa-heart"></i> 8</p>
                            <p><i class="fas fa-star ml-4"></i> 5.0</p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
                <div class="carousel-item">
                    <img src="{{asset('img/kebun.jpg')}}" class="d-block w-100 tales" alt="Kebun di desa">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('img/usaha.jpg')}}" class="d-block w-100 tales" alt="Bekerja">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="container mt-4">
        <h3>Tempat Usaha</h3>
    </div>

    {{--card--}}
    <div class="container ">
        <div class="row">
            <div class="col-lg-3 mt-4 d-flex">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('img/kebun.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <div class="row ml-0">
                            <p><i class="fas fa-heart"></i> 8</p>
                            <p><i class="fas fa-star ml-4"></i> 5.0</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mt-4 d-flex">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('img/kebun.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <div class="row ml-0">
                            <p><i class="fas fa-heart"></i> 8</p>
                            <p><i class="fas fa-star ml-4"></i> 5.0</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mt-4 d-flex">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('img/kebun.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <div class="row ml-0">
                            <p><i class="fas fa-heart"></i> 8</p>
                            <p><i class="fas fa-star ml-4"></i> 5.0</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mt-4 d-flex">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('img/kebun.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <div class="row ml-0">
                            <p><i class="fas fa-heart"></i> 8</p>
                            <p><i class="fas fa-star ml-4"></i> 5.0</p>
                        </div>
                    </div>
                </div>
            </div>
            
       
@endsection
