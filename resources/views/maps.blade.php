@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <form action="{{route('maps.index')}}" class="d-flex col-lg form">
                <input class="form-control col-10" name="keywords" type="text" placeholder="Cari..." required>
                <input class="button col-2" type="submit" value="Cari">
            </form>
            <div class="container">
                <div class="row ml-1">
                    <div class="form-group w-25 mr-3">
                        <form action="{{route('maps.index')}}">

                            <select name="kecamatan" class="form-control" id="kecamatan">
                                <option disabled selected hidden value="0">Pilih Kecamatan</option>
                                @foreach($kecamatan as $item)
                                    <option value="{{$item -> id}}">{{$item -> nama_kecamatan}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group w-25 ml-4 mr-4">
                        <select name="desa" class="form-control" id="desa">
                            <option disabled selected hidden>Pilih Desa</option>
                        </select>
                    </div>
                    <div class="form-group w-25 ml-4 mr-4">
                        <select name="sektor" class="form-control" id="sektor">
                            <option disabled selected hidden>Pilih Sektor</option>
                            @foreach($sektor as $item)
                                <option value="{{$item -> id}}">{{$item -> nama_sektor_usaha}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mr-4 ml-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>


            <form class="form">
                @if($tempatusaha -> count())
                @foreach($tempatusaha as $item)
                    <input name="lat[]" id="lat[]" hidden value="{{$item -> lokasi_lat}}">
                    <input name="lng[]" id="lng[]" hidden value="{{$item -> lokasi_lang}}">
                    <input name="nama_tempat[]" hidden id="nama_tempat[]" value="{{$item -> nama_tempat}}">
                @endforeach

            </form>
            <div id="map-index"></div>
            @else
                <div class="col-md-12">
                    <div class="text-center">
                        <span class="fas fa-store fa-4x mt-5 mb-3 opacity-3"></span>
                        <h3 class="opacity-3">Tidak ada Tempat Usaha tersedia</h3>
                    </div>
                </div>
            @endif
            <script>

                var marker;
                var markers = [];

                var infoWindow = new google.maps.InfoWindow(), marker, i;
                var map = {
                    center: new google.maps.LatLng(-8.1300669209114, 112.66096750488282),
                    zoom: 11,

                };

                peta = new google.maps.Map(document.getElementById("map-index"), map);

                var n = $("input[name^='lat']").length;

                var lokasi_lat = $("input[name^='lat']");
                var lokasi_lng = $("input[name^='lng']");
                var nama_tempat = $("input[name^='nama_tempat']");

                function initMap() {

                    for (let i = 0; i < n; i++) {
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(lokasi_lat[i].value, lokasi_lng[i].value),
                            map: peta,
                        });
                        // Check content
                        console.log(nama_tempat[i].value);
                        google.maps.event.addListener(marker, 'click', (function (marker, i) {
                            return function () {
                                infoWindow.setContent(nama_tempat[i].value);
                                infoWindow.open(map, marker);
                            }
                        })(marker, i));

                    }
                }

                google.maps.event.addDomListener(window, 'load', initMap());

            </script>
            <script>
                $('#kecamatan').on('change', function (e) {
                    // console.log(e);
                    var kategori_id = e.target.value;
                    $.get('/json-desa?id=' + kategori_id, function (data) {
                        // console.log(data);
                        $('#desa').empty();
                        $('#desa').append('<option value="0" disable="true" selected="true">Pilih Desa</option>');

                        $.each(data, function (index, desaObj) {
                            $('#desa').append('<option value="' + desaObj.id + '">' + desaObj.nama_desa + '</option>');
                        })
                    });
                });
            </script>
@endsection