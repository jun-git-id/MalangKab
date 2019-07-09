@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form class="d-flex col-lg form">
                <input class="form-control col-10" type="text" placeholder="Cari..." required>
                <input class="button col-2" type="button" value="Cari">
            </form>

    <div class="container">
        <div class="row">
            <div class="form-group w-25 col-lg-4 d-flex">
                <select class="form-control" id="exampleFormControlSelect1">
                    <option disabled selected hidden>Pilih Kecamatan</option>
                    <option>Semua</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group w-25 col-lg-4 d-flex">
                <select class="form-control" id="exampleFormControlSelect1">
                    <option disabled selected hidden>Pilih Desa</option>
                    <option>Semua</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group w-25 col-lg-4 d-flex">
                <select class="form-control" id="exampleFormControlSelect1">
                    <option disabled selected hidden>Pilih Kategori</option>
                    <option>Semua</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
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

        </div>
    </div>
@endsection
