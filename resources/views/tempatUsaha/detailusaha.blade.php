@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mt-4 d-flex">
                <img src="{{asset('storage/'. $tempatusaha -> foto_tempat_usaha)}}" alt="..."
                     class="img-detail-thumbnail">
            </div>
            <div class="col-lg-6 mt-4">
                <h3><strong>{{$tempatusaha -> nama_tempat}} </strong></h3>
                <table>
                    <tr>
                        <td width="30%">
                            <p>Nama Pemilik</p>
                        </td>
                        <td>
                            <p class="ml-1 mr-1">:</p>

                        </td>
                        <td>
                            <p><i> {{$tempatusaha -> user ->nama}}</i></p>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Lokasi</p>
                        </td>
                        <td>
                            <p class="ml-1 mr-1">:</p>

                        </td>
                        <td>
                            <p><i> {{$tempatusaha -> lokasi}}</i></p>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>No. Telp</p>
                        </td>
                        <td>
                            <p class="ml-1 mr-1">:</p>
                        </td>
                        <td>
                            <p><i> {{$tempatusaha -> no_telp}}</i></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Deskripsi</p>
                        </td>
                        <td>
                            <p class="ml-1 mr-1">:</p>

                        </td>
                        <td>
                            <p><i> {{$tempatusaha -> deskripsi}}</i></p>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Alamat</p>
                        </td>
                        <td>
                            <p class="ml-1 mr-1">:</p>

                        </td>
                        <td>
                            <p><i> {{$tempatusaha -> alamat}}</i></p>

                        </td>
                    </tr>
                </table>
                <p>Maps</p>
                <form>
                    <input name="lat" id="lat" hidden value="{{$tempatusaha -> lokasi_lat}}">
                    <input name="lang" id="lang" hidden value="{{$tempatusaha -> lokasi_lang}}">
                    <div id="map-canvas" name="maps">
                </form>
            </div>


        </div>
    </div>
    </div>
    </div>

    <div class="container mt-5">
        <h3>Daftar Produk</h3>
    </div>
    <div class="container ">
        <div class="row">
            @if($products->count())
                @foreach($products as $itemProduct)
                    <div class="col-lg-3 mt-4 d-flex">
                        <div class="card" style="width: 18rem;">
                            <a href="/detailproduk/{{$itemProduct->id}}">
                                <img src="{{ asset('storage/' . $itemProduct->image) }}"
                                     class="card-img-top py-2 card-img-container" alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{$itemProduct->nama_produk}}</h5>
                                <p class="card-text">{{$itemProduct->deskripsi}}</p>
                                <div class="row ml-0">
                                    <p><i class="fas fa-heart"></i> {{$itemProduct->like}}</p>
                                    <p><i class="fas fa-star ml-4"></i> {{$itemProduct->rating}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <div class="text-center">
                        <span class="fas fa-store fa-4x mt-5 mb-3 opacity-3"></span>
                        <h3 class="opacity-3">Tidak ada produk tersedia</h3>
                    </div>
                </div>
            @endif
        </div>
    </div>

            <script>

                // maps
                function initialize() {
                    var lokasi_lat = document.getElementById("lat").value;
                    var lokasi_lang = document.getElementById("lang").value;

                    var propertiPeta = {
                        center: new google.maps.LatLng(lokasi_lat, lokasi_lang),
                        zoom: 15,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };

                    var peta = new google.maps.Map(document.getElementById("map-canvas"), propertiPeta);

                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(lokasi_lat, lokasi_lang),
                        map: peta,

                    });

                }


                google.maps.event.addDomListener(window, 'load', initialize);

            </script>
@endsection