@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mt-4 d-flex">
                <img src="{{asset('img/kebun.jpg')}}" alt="..." class="img-thumbnail">
            </div>
            <div class="col-lg-6 mt-4">
                <h3><strong>Nama Tempat Usaha </strong></h3>
                <h5 class="mt-4">Nama Pemilik</h5>
                <h5 class="mt-4">Deskripsi</h5>
                <h5 class="mt-4">Nomor telepon</h5>
                <h5 class="mt-4">Alamat tempat usaha</h5>
                <h5 class="mt-4">Maps</h5>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h3>Daftar Produk</h3>
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
@endsection