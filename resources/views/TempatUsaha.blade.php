@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form class="d-flex col-lg ml-2 form">
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
            @if($tempatusaha->count())
                @foreach($tempatusaha as $itemUsaha)
                    <div class="col-lg-3 mt-4 d-flex">
                        <div class="card" style="width: 18rem;">
                            <a href="/detailusaha/{{$itemUsaha->id}}">
                                <img src="{{asset('storage/'. $itemUsaha->foto_tempat_usaha)}}" class="card-img-top py-2 card-img-container"  alt="...">
                            </a>
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
                        <span class="fas fa-store fa-4x mt-5 mb-3 opacity-3"></span>
                        <h3 class="opacity-3">Tidak ada Tempat Usaha tersedia</h3>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
