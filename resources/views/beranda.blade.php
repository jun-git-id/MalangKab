@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('img/sawah.jpg')}}" class="d-block w-100 tales" alt="Sawah di desa">
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
        @if($tempatusaha->count())
            @foreach($tempatusaha as $itemUsaha)
            <div class="col-lg-3 mt-4 d-flex">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('storage/'. $itemUsaha->foto_tempat_usaha)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$itemUsaha->nama_tempat}}</h5>
                        <p class="card-text">{{$itemUsaha->deskripsi}}</p>
                        <div class="row ml-0">
                            <p><i class="fas fa-heart"></i> {{$itemUsaha->like}}</p>
                            <p><i class="fas fa-star ml-4"></i> {{$itemUsaha->rating}}</p>
                        </div>
                    </div>
                </div>
            </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <div class="text-center">
                            <span class="fas fa-store fa-4x mt-3 mb-3 opacity-3"></span>
                            <h3 class="opacity-3">Tidak ada produk tersedia</h3>
                    </div>
                </div>
            @endif
            </div>
        </div>
    <div class="container mt-4">
        <h3>Produk</h3>
    </div>
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
    </div>

@endsection
