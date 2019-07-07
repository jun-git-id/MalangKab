@extends('layouts.app')

@section('content')

    <div class="container w-50">


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
        <form role="form" action="{{route('tempatusaha.update',$tempatusaha->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            {{method_field('put')}}
            <div class="form-group">
                <label for="nama_tempat">Nama Toko</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-store"></i></span>
                    <input type="text" name="nama_tempat" class="form-control no-border-left"
                           id="nama_tempat" placeholder="Nama Toko" value="{{$tempatusaha -> nama_tempat}}" required>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Tambah Foto</label>
                <div class="form-group inputDnD">
                    <label class="sr-only" for="inputFile">File Upload</label>
                    <div class="text-center">
                        <img class="w-50" id="imageUpload" src="{{asset('storage/'.$tempatusaha -> foto_tempat_usaha)}}"
                             alt="">
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
                        <option selected value="{{$tempatusaha -> kecamatan -> id}}">{{$tempatusaha -> kecamatan -> nama_kecamatan}}</option>
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
                        <option selected value="{{$tempatusaha -> desa -> id}}">{{$tempatusaha -> desa -> nama_desa}}</option>
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
                              id="formGroupExampleInput" aria-invalid="{{$tempatusaha->alamat}}" required>{{$tempatusaha->alamat}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Lokasi Map</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-map-marked-alt"></i></span>
                    <input name="lokasi" type="text" class="form-control no-border-left" id="searchmap"
                           placeholder="Lokasi pada map" value="{{$tempatusaha->lokasi}}">
                </div>
                <div id="map-canvas" class="mt-3"></div>
            </div>

            <div class="form-group">
                <label for="">Lat</label>
                <input type="text" class="form-control input-sm" name="lokasi_lat" id="lat"
                       value="{{$tempatusaha->lokasi_lat}}">
            </div>

            <div class="form-group">
                <label for="">Lng</label>
                <input type="text" class="form-control input-sm" name="lokasi_lang" id="lng"
                       value="{{$tempatusaha->lokasi_lang}}">
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput">Deskripsi</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-info-circle"></i></span>
                    <input name="deskripsi" type="text" class="form-control no-border-left" id="formGroupExampleInput"
                           placeholder="Deskripsi" required value="{{$tempatusaha->deskripsi}}">
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Nomor Telepon</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-phone"></i></span>
                    <input type="number" name="no_telp" class="form-control no-border-left" id="formGroupExampleInput"
                           placeholder="Nomor telepon" required value="{{$tempatusaha->no_telp}}">
                </div>
            </div>
            <h3 class="py-4">Data Tempat Usaha</h3>
            <div class="form-group">
                <label for="formGroupExampleInput">Kategori Usaha</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-list-ul"></i></span>
                    <select name="kategori_usaha" class="custom-select" id="inputGroupSelect01" required>
                        <option selected value="{{$tempatusaha -> kategoriUsaha -> id}}">{{$tempatusaha->kategoriUsaha->nama_kategori_usaha}}</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Sub Kategori Usaha</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-list-ul"></i></span>
                    <select name="sub_kategori_usaha" class="custom-select" id="inputGroupSelect01" required>
                        <option selected value="{{$tempatusaha -> subKategoriUsaha -> id}}">{{$tempatusaha->subKategoriUsaha -> sub_kategori_usaha}}</option>
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
                        <option selected value="{{$tempatusaha -> kegiatanUsaha -> id}}">{{$tempatusaha->kegiatanUsaha->nama_kegiatan_usaha}}</option>
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
                        <option selected value="{{$tempatusaha -> statusKepemilikan -> id}}">{{$tempatusaha->statusKepemilikan -> status_kepemilikan}}</option>
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
                        <option selected value="{{$tempatusaha -> jenisInvestasi -> id}}">{{$tempatusaha->jenisInvestasi -> jenis_investasi}}</option>
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
                           id="formGroupExampleInput" value="{{$tempatusaha -> nominal_investasi}}"
                           placeholder="Nominal">
                </div>
            </div>
            <h3 class="py-4">Detail Izin Usaha</h3>
            <div class="dynamic-rows">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Jenis Izin Usaha</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text no-border-right"><i
                                            class="fas fa-clipboard-check"></i></span>
                                <select name="id_jenis_izin_usaha" class="custom-select" id="inputGroupSelect01"
                                        required>
                                    <option selected value="{{$izinusaha -> jenisIzin -> id}}">{{$izinusaha -> jenisIzin -> jenis_izin_usaha}}</option>
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
                                       value="{{$izinusaha -> no_izin_usaha}}">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Tanggal Izin Berakhir</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text no-border-right"><i
                                            class="fas fa-calendar-alt"></i></span>
                                <input name="tgl_izin_berakhir" type="date" class="form-control no-border-left"
                                       placeholder="" required value="{{$izinusaha -> tgl_izin_berakhir}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary add">Tambah Izin Usaha</button>
            <button type="button" class="btn btn-danger remove ml-2">Hapus Izin Usaha</button>


            <button type="submit" class="btn btn-primary mt-4 w-100">Update Tempat Usaha</button>

        </form>

    </div>


    <script type="text/template" id="izin_usaha_rows">
        {{--            <div class="col-lg-4">--}}
        {{--                <p>--}}
        {{--                    <label for="FirstName_{{count}}">{{count}}. First Name</label><br>--}}
        {{--                    <input type="text" name="FirstName" id="FirstName_{{count}}">--}}
        {{--                </p>--}}
        {{--            </div>--}}
        {{--            <div class="col-lg-4">--}}
        {{--                <p>--}}
        {{--                    <label for="LastName_{{count}}">Last Name</label><br>--}}
        {{--                    <input type="text" name="LastName" id="LastName_{{count}}">--}}
        {{--                </p>--}}
        {{--            </div>--}}
        {{--            <div class="col-lg-4">--}}
        {{--                <p>--}}
        {{--                    <label for="EmailAddress_{{count}}">Email Address</label><br>--}}
        {{--                    <input type="text" name="EmailAddress" id="EmailAddress_{{count}}">--}}
        {{--                </p>--}}
        {{--            </div>--}}
        {{--        </div>--}}


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

    </script>
@endsection
