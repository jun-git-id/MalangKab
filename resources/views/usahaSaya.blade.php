@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3>Tempat Usaha Saya <button type="button" class="right btn btn-outline-info">Tambah Usaha</button></h3>
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
                            <p>
                                <button type="button" class="btn btn-outline-info mr-5 ml-2">Edit</button>
                            </p>
                            <p>
                                <button type="button" class="btn btn-outline-info ml-4">Hapus</button>
                            </p>
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
                            <p>
                                <button type="button" class="btn btn-outline-info mr-5 ml-2">Edit</button>
                            </p>
                            <p>
                                <button type="button" class="btn btn-outline-info ml-4">Hapus</button>
                            </p>
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
                            <p>
                                <button type="button" class="btn btn-outline-info mr-5 ml-2">Edit</button>
                            </p>
                            <p>
                                <button type="button" class="btn btn-outline-info ml-4">Hapus</button>
                            </p>
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
                            <p>
                                <button type="button" class="btn btn-outline-info mr-5 ml-2">Edit</button>
                            </p>
                            <p>
                                <button type="button" class="btn btn-outline-info ml-4">Hapus</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection