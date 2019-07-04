@extends('layouts.app')

@section('content')


    <div class="container w-50">
        <div>
            <h1>Add Vendor, Location</h1>

            <form action="/maps">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control input-sm" name="title">
            </div>

            <div class="form-group">
                <label for="">Map</label>
                <input type="text" id="searchmap">
                <div id="map-canvas"></div>
            </div>

            <div class="form-group">
                <label for="">Lat</label>
                <input type="text" class="form-control input-sm" name="lat" id="lat">
            </div>

            <div class="form-group">
                <label for="">Lng</label>
                <input type="text" class="form-control input-sm" name="lng" id="lng">
            </div>

            <button class="btn btn-sm btn-danger">Save</button>
            </form>
        </div>

    </div>

    <script>
        var map = new google.maps.Map(document.getElementById('map-canvas'),{
            center:{
                lat: -7.983908,
                lng: 112.621391
            },
            zoom:15
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
        google.maps.event.addListener(searchBox,'places_changed',function(){
            var places = searchBox.getPlaces();
            var bounds = new google.maps.LatLngBounds();
            var i, place;
            for(i=0; place=places[i];i++){
                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location); //set marker position new...
            }
            map.fitBounds(bounds);
            map.setZoom(15);
        });
        google.maps.event.addListener(marker,'position_changed',function(){
            var latlang = marker.getPosition().lat() + '-'+ marker.getPosition().lng();
            var lng = marker.getPosition().lng();
            $('#lat').val(latlang);
            $('#lng').val(lng);
        });
    </script>
    @endsection