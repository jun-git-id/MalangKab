@extends('layouts.app')

@section('content')

    <div class="container w-50">
        <form role="form" action="{{route('tempatusaha.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())

                <div class="alert alert-danger alert-dismissible fade show">
                    @foreach ($errors->all() as $error)
                        <ul>
                            <li> {{ $error }} </li>
                        </ul>
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            @endif
            <div class="form-group">
                <label for="formGroupExampleInput">Nama Toko</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-store"></i></span>
                    <input type="text" name="nama_tempat"
                           class="form-control no-border-left"
                           id="nama_tempat" placeholder="Nama Toko"
                           value="{{old('nama_tempat')}}" required>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Tambah Foto</label>
                <div class="form-group inputDnD">
                    <label class="sr-only" for="inputFile">File Upload</label>
                    <div class="text-center">
                        <img class="w-50" id="imageUpload" alt="">
                    </div>
                    <input type="file" name="foto_tempat"
                           class="form-control-file text-primary font-weight-bold py-5"
                           accept="image/*" onchange="readURL(this)" data-title="Drag and drop a file" required>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Kecamatan</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-list-ul"></i></span>
                    <select name="kecamatan" class="custom-select @error('kecamatan') is-invalid @enderror"
                            id="inputGroupSelect01" required>
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Desa</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-list-ul"></i></span>
                    <select name="desa" class="custom-select" id="inputGroupSelect01" required>
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Alamat Toko</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-home"></i></span>
                    <textarea name="alamat" placeholder="Alamat toko" class="form-control no-border-left"
                              id="formGroupExampleInput" required value="{{old('alamat')}}"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Lokasi Map</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-map-marked-alt"></i></span>
                    <input name="koordinat_lokasi" type="text" class="form-control no-border-left" id="searchmap"
                           placeholder="Lokasi pada map">
                </div>
                <div id="map-canvas" class="mt-3"></div>
            </div>

            <div class="form-group">
                <label for="">Lat</label>
                <input type="text" class="form-control input-sm" name="lat" id="lat">
            </div>

            <div class="form-group">
                <label for="">Lng</label>
                <input type="text" class="form-control input-sm" name="lng" id="lng">
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

            <div class="form-group">
                <label for="formGroupExampleInput">Deskripsi</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-info-circle"></i></span>
                    <input name="deskripsi" type="text" class="form-control no-border-left" id="formGroupExampleInput"
                           placeholder="Deskripsi" required value="{{old('deskripsi')}}">
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Nomor Telepon</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-phone"></i></span>
                    <input type="number" name="no_telp" class="form-control no-border-left" id="formGroupExampleInput"
                           placeholder="Nomor telepon" required value="{{old('no_telp')}}">
                </div>
            </div>
            <h3 class="py-4">Data Tempat Usaha</h3>
            <div class="form-group">
                <label for="formGroupExampleInput">Kategori Usaha</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-list-ul"></i></span>
                    <select name="kategori_usaha" class="custom-select" id="inputGroupSelect01" required>
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Kegiatan Usaha</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-grip-horizontal"></i></span>
                    <select name="kegiatan_usaha" class="custom-select" id="inputGroupSelect01" required>
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Status Kepemilikan</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-people-carry"></i></span>
                    <select name="status_kepemilikan" class="custom-select" id="inputGroupSelect01" required>
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Jenis Investasi</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-coins"></i></span>
                    <select name="jenis_investasi" class="custom-select" id="inputGroupSelect01" required>
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Nominal</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right">Rp.</span>
                    <input name="nominal_investasi" type="number" class="form-control no-border-left"
                           id="formGroupExampleInput"
                           placeholder="Nominal">
                </div>
            </div>
            <h3 class="py-4">Detail Izin Usaha</h3>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Jenis Izin Usaha</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text no-border-right"><i class="fas fa-clipboard-check"></i></span>
                            <select name="id_jenis_izin_usaha" class="custom-select" id="inputGroupSelect01" required>
                                <option selected>Choose...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nomor Izin Usaha</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text no-border-right">No.</span>
                            <input name="no_izin_usaha" type="number" class="form-control no-border-left"
                                   id="formGroupExampleInput" placeholder="nomor" required
                                   value="{{old('no_izin_usaha')}}">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Tanggal Izin Berakhir</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text no-border-right"><i class="fas fa-calendar-alt"></i></span>
                            <input name="tgl_izin_berakhir" type="date" class="form-control no-border-left"
                                   placeholder="" required value="{{old('tgl_izin_usaha')}}">
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-info">Tambah Izin Usaha</button>
            <button type="submit" class="btn btn-info mt-4 w-100">Tambah Toko</button>

        </form>
    </div>
@endsection
