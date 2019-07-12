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
                        <option selected value="0">Pilih Kecamatan</option>
                        @foreach($kecamatan as $item)
                            <option value="{{$item->id}}">{{$item->nama_kecamatan}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Desa</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-list-ul"></i></span>
                    <select name="desa" class="custom-select" id="inputGroupSelect01" required>
                        <option selected value="0">Pilih Desa</option>
                        @foreach($desa as $item)
                            <option value="{{$item->id}}">{{$item->nama_desa}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Alamat Toko</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-home"></i></span>
                    <textarea name="alamat" placeholder="Alamat toko" value="{{old('alamat')}}"
                              class="form-control no-border-left"
                              id="formGroupExampleInput" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Lokasi Map</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-map-marked-alt"></i></span>
                    <input name="lokasi" type="text" class="form-control no-border-left" id="searchmap"
                           placeholder="Lokasi pada map" value="{{old('lokasi')}}">
                </div>
                <div id="map-canvas" class="mt-3"></div>
            </div>

            <div class="form-group">
                <label for="">Lat</label>
                <input type="text" class="form-control input-sm" name="lokasi_lat" id="lat">
            </div>

            <div class="form-group">
                <label for="">Lng</label>
                <input type="text" class="form-control input-sm" name="lokasi_lang" id="lng">
            </div>

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
                    <select name="kategori_usaha" class="custom-select dynamic" id="kategori" data-dependent="kategori" required>
                        <option selected value="0">Pilih Kategori Usaha</option>
                        @foreach($kategoriUsaha as $item)
                            <option value="{{$item->id}}">{{$item->nama_kategori_usaha}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Sub Kategori Usaha</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right dynamic"><i class="fas fa-list-ul"></i></span>
                    <select name="sub_kategori_usaha" class="custom-select" id="subKategori" data-dependent="subKategori" required>
{{--                        <option selected value="0">Pilih Sub Kategori Usaha</option>--}}
{{--                        @foreach($subKategori as $item)--}}
{{--                            <option value="{{$item->id}}">{{$item->sub_kategori_usaha}}</option>--}}
{{--                        @endforeach--}}
                        <option value=""></option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Kegiatan Usaha</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-grip-horizontal"></i></span>
                    <select name="kegiatan_usaha" class="custom-select" id="inputGroupSelect01" required>
                        <option selected value="0">Pilih Kegiatan Usaha</option>

                        @foreach($kegiatanUsaha as $item)
                            <option value="{{$item->id}}">{{$item->nama_kegiatan_usaha}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Status Kepemilikan</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-people-carry"></i></span>
                    <select name="status_kepemilikan" class="custom-select" id="inputGroupSelect01" required>
                        <option selected value="0">Pilih Status Kepemilikan</option>
                        @foreach($statusKepemilikan as $item)
                            <option value="{{$item->id}}">{{$item->status_kepemilikan}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Jenis Investasi</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-coins"></i></span>
                    <select name="jenis_investasi" class="custom-select" id="inputGroupSelect01" required>
                        <option selected value="0">Pilih Jenis Investasi</option>
                        @foreach($jenisInvestasi as $item)
                            <option value="{{$item->id}}">{{$item->jenis_investasi}}</option>
                        @endforeach
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
            <div class="dynamic-rows">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Jenis Izin Usaha</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text no-border-right"><i
                                            class="fas fa-clipboard-check"></i></span>
                                <select name="id_jenis_izin_usaha[]" class="custom-select" id="inputGroupSelect01"
                                        required>
                                    <option selected value="0">Pilih Jenis Izin Usaha</option>
                                    @foreach($jenisIzinUsaha as $item)
                                        <option value="{{$item->id}}">{{$item->jenis_izin_usaha}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Nomor Izin Usaha</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text no-border-right">No.</span>
                                <input name="no_izin_usaha[]" type="text" class="form-control no-border-left"
                                       id="formGroupExampleInput" placeholder="nomor" required
                                       value="{{old('no_izin_usaha')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Tanggal Izin Berakhir</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text no-border-right"><i
                                            class="fas fa-calendar-alt"></i></span>
                                <input name="tgl_izin_berakhir[]" type="date" class="form-control no-border-left"
                                       placeholder="" required value="{{old('tgl_izin_usaha')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary add">Tambah Izin Usaha</button>
            <button type="button" class="btn btn-danger remove ml-2">Hapus Izin Usaha</button>
            <button type="submit" class="btn btn-primary mt-4 w-100">Tambah Toko</button>

        </form>
    </div>

    <script type="text/template" id="izin_usaha_rows">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="formGroupExampleInput">Jenis Izin Usaha</label>
                        <div class="input-group-prepend">
                                <span class="input-group-text no-border-right"><i
                                            class="fas fa-clipboard-check"></i></span>
                        <select name="id_jenis_izin_usaha[]" class="custom-select" id="inputGroupSelect01"
                                required>
                            <option selected value="0">Pilih Jenis Izin Usaha</option>
                            @foreach($jenisIzinUsaha as $item)
                                <option value="{{$item->id}}">{{$item->jenis_izin_usaha}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="formGroupExampleInput">Nomor Izin Usaha</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text no-border-right">No.</span>
                        <input name="no_izin_usaha[]" type="text" class="form-control no-border-left"
                               id="formGroupExampleInput" placeholder="nomor" required
                               value="{{old('no_izin_usaha')}}">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="formGroupExampleInput">Tanggal Izin Berakhir</label>
                    <div class="input-group-prepend">
                                <span class="input-group-text no-border-right"><i
                                            class="fas fa-calendar-alt"></i></span>
                        <input name="tgl_izin_berakhir[]" type="date" class="form-control no-border-left"
                               placeholder="" required value="{{old('tgl_izin_usaha')}}">
                    </div>
                </div>
            </div>
        </div>
    </script>
    <script>
        $(document).ready(function(){

            $('.dynamic').change(function(){
                if($(this).val() != '')
                {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{ route('dynamicdependent.fetch') }}",
                        method:"POST",
                        data:{select:select, value:value, _token:_token, dependent:dependent},
                        success:function(result)
                        {
                            $('#'+dependent).html(result);
                        }

                    })
                }
            });

            $('#kategori').change(function(){
                $('#subKategori').val('');

            });

        });
    </script>

@endsection
