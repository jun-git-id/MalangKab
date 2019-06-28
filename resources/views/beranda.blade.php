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
    <div class="container py-md-3 mt-md-3">
        <div class="card-deck ">
            <div class="card" style="width: 18rem;">
                <img src="{{asset('img/kebun.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <div class="row ml-0">
                        <p><i class="fas fa-heart"></i> 8</p>
                        <p><i class="fas fa-star ml-4"></i> 5.0</p>
                    </div>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="{{asset('img/kebun.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <div class="row ml-0">
                        <p><i class="fas fa-heart"></i> 8</p>
                        <p><i class="fas fa-star ml-4"></i> 5.0</p>
                    </div>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="{{asset('img/kebun.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <div class="row ml-0">
                        <p><i class="fas fa-heart"></i> 8</p>
                        <p><i class="fas fa-star ml-4"></i> 5.0</p>
                    </div>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="{{asset('img/kebun.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <div class="row ml-0">
                        <p><i class="fas fa-heart"></i> 8</p>
                        <p><i class="fas fa-star ml-4"></i> 5.0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <h3>Produk</h3>
    </div>
    <div class="container py-md-3 mt-md-3">
        <div class="card-deck ">
            <div class="card" style="width: 18rem;">
                <img src="{{asset('img/kebun.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <div class="row ml-0">
                        <p><i class="fas fa-heart"></i> 8</p>
                        <p><i class="fas fa-star ml-4"></i> 5.0</p>
                    </div>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="{{asset('img/kebun.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <div class="row ml-0">
                        <p><i class="fas fa-heart"></i> 8</p>
                        <p><i class="fas fa-star ml-4"></i> 5.0</p>
                    </div>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="{{asset('img/kebun.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <div class="row ml-0">
                        <p><i class="fas fa-heart"></i> 8</p>
                        <p><i class="fas fa-star ml-4"></i> 5.0</p>
                    </div>
                </div>
            </div>
            <div class="card" style="width: 18rem;">
                <img src="{{asset('img/kebun.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <div class="row ml-0">
                        <p><i class="fas fa-heart"></i> 8</p>
                        <p><i class="fas fa-star ml-4"></i> 5.0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
