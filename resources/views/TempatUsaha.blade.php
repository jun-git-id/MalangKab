@extends('layouts.app')
<style type="text/css">
    .pagination {
        float: right !important;
    }
</style>
@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('tempatusaha.index')}}" class="d-flex col-lg form">
                <input class="form-control col-10" name="keywords" type="text" placeholder="Cari..." required>
                <input class="button col-2" type="submit" value="Cari">
            </form>
            <div class="container">
                <div class="row ml-1">
                    <div class="form-group w-25 mr-3">
                        <form action="{{route('tempatusaha.index')}}">

                            <select name="kecamatan" class="form-control" id="kecamatan">
                                <option disabled selected hidden>Pilih Kecamatan</option>
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
                </div>
            </div>
            </form>
            {{--card--}}
            <div class="container ">
                <div class="row">
                    @if($tempatusaha->count())
                        @foreach($tempatusaha as $itemUsaha)
                            <div class="col-lg-3 mt-4 d-flex">
                                <div class="card" style="width: 18rem;">
                                    <a href="/detailusaha/{{$itemUsaha->id}}">
                                        <img src="{{asset('storage/'. $itemUsaha->foto_tempat_usaha)}}"
                                             class="card-img-top py-2 card-img-container" alt="...">
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

            <div class="mt-5 col-lg-12 text-center">
                {{$tempatusaha -> links()}}
            </div>


        </div>
    </div>

    <script>
        $('#kecamatan').on('change', function (e) {
            console.log(e);
            var kategori_id = e.target.value;
            $.get('/json-desa?id=' + kategori_id, function (data) {
                console.log(data);
                $('#desa').empty();
                $('#desa').append('<option value="0" disable="true" selected="true">Pilih Desa</option>');

                $.each(data, function (index, desaObj) {
                    $('#desa').append('<option value="' + desaObj.id + '">' + desaObj.nama_desa + '</option>');
                })
            });
        });
    </script>
@endsection
