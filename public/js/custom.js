
$(document).ready(function() {

    $("#owl-demo").owlCarousel({

        autoPlay: 3000, //Set AutoPlay to 3 seconds

        items : 4,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]

    });

});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageUpload')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

// maps
var map = new google.maps.Map(document.getElementById('input-map'), {
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
    var lat = marker.getPosition().lat();
    var lng = marker.getPosition().lng();
    $('#lat').val(lat);
    $('#lng').val(lng);
});

//add dynamically form for input usaha
var template = $("#izin_usaha_rows").html(),
    $target = $(".dynamic-rows"),
    $btnAdd = $("button.add"),
    $btnRemove = $("button.remove"),
    $msg = $('.msg'),
    max = 10,
    count = 1,
    inputRow = [];

$btnAdd.click(function(e){
    e.preventDefault();
    addRows();
});

$btnRemove.click(function(e){
    e.preventDefault();
    removeRows();
});

function addRows(){
    if(count <= max){
        inputRow = {
            count : count
        }
        var html = Mustache.to_html(template, inputRow);
        $target.append(html);
        count++;
    }else{
        $msg.text('too many fields!');
    }
}

function removeRows(){
    $target.find('.row').last().remove();
    $msg.text('');
    if(count <= 1){
        count = 1;
    }else{
        count--;
    }
}

// addRows();

