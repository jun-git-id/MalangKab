@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
        <form class="d-flex">
            <input class="form-control col-lg-10" type="text" placeholder="Cari..." required>
            <input class="button col-2" type="button" value="Cari">
        </form>
        </div>
    </div>
    <div class="container">
        <div class="row ml-4">
            <div class="form-group w-25 mr-5">
                <select class="form-control" id="exampleFormControlSelect1">
                    <option disabled selected hidden>Pilih Kecamatan</option>
                    <option>Semua</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group w-25 ml-5 mr-5">
                <select class="form-control" id="exampleFormControlSelect1">
                    <option disabled selected hidden>Pilih Desa</option>
                    <option>Semua</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="form-group w-25 ml-5">
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

    <form action="/maps">
            <div id="map-canvas"></div>

        <div class="form-group mt-5">
            <label for="">Lat</label>
            <input type="text" class="form-control input-sm" name="lat" id="lat">
        </div>

        <div class="form-group">
            <label for="">Lng</label>
            <input type="text" class="form-control input-sm" name="lng" id="lng">
        </div>

        <button class="btn btn-info" style="color: white; background-color:
#5682a3">Save</button>
    </form>
    </div>

    </div>

    <script>
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
            center: {
                lat: -7.983908,
                lng: 112.621391
            },
            zoom: 15
        });
        var marker = new google.maps.Marker({
            position: {
                lat: -7.983908,
                lng: 112.621391
            },
            map: map,
            draggable: true
        });
        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));
        google.maps.event.addListener(searchBox, 'places_changed', function () {
            var places = searchBox.getPlaces();
            var bounds = new google.maps.LatLngBounds();
            var i, place;
            for (i = 0; place = places[i]; i++) {
                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location); //set marker position new...
            }
            map.fitBounds(bounds);
            map.setZoom(15);
        });
        google.maps.event.addListener(marker, 'position_changed', function () {
            var latlang = marker.getPosition().lat() + '-' + marker.getPosition().lng();
            var lng = marker.getPosition().lng();
            $('#lat').val(latlang);
            $('#lng').val(lng);
        });
    </script>
@endsection