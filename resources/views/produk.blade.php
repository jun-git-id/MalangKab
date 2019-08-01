@extends('layouts.app')
<style type="text/css">
    .pagination {
        float: right !important;
    }
</style>
@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('products.index')}}" class="d-flex form">
                <input name="keywords" class="form-control col-lg-10" type="text" placeholder="Cari..." required>
                <input class="button col-2" type="submit" value="Cari">
            </form>
            <div class="container">
                <div class="row ml-4">
                    <div class="form-group w-25 mr-3">
                        <form action="{{route('products.index')}}">

                            <select name="kecamatan" id="kecamatan" class="form-control">
                                <option disabled selected hidden>Pilih Kecamatan</option>
                                @foreach($kecamatan as $item)
                                    <option value="{{$item -> id}}">{{$item -> nama_kecamatan}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group w-25 ml-4 mr-4">
                        <select name="desa" id="desa" class="form-control">
                            <option disabled selected hidden>Pilih Desa</option>
                        </select>
                    </div>
                    <div class="form-group w-25 ml-4 mr-4">
                        <select name="jenis" class="form-control" id="jenis">
                            <option disabled selected hidden>Pilih Kategori</option>
                            @foreach($jenis as $item)
                                <option value="{{$item -> id}}">{{$item -> jenis_produk}}</option>
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
                @if($count == 1)
                @foreach($products as $itemProduct)
                        <div class="col-lg-3 mt-4 d-flex">
                            <div class="card shadow-sm rounded p-2 " style="width: 18rem;">
                                <a href="/detailproduk/{{$itemProduct->id}}">
                                    <img src="{{asset('storage/'. $itemProduct->image)}}" class="card-img-top py-2 card-img-container"  alt="...">
                                </a>
                                <div class="card-body pb-0">
                                    <h5 class="card-title text-primary">{{$itemProduct->nama_produk}}</h5>
                                    <p class="card-text">{{$itemProduct -> provider -> nama_tempat}}</p>
                                    <p class="card-text text-primary font-bold">Rp. {{$itemProduct -> harga}}</p>
                                    <div class="row ml-0">
                                        <form action="{{route('like.product',$itemProduct->id)}}"  method="post"
                                              enctype="multipart/form-data">
                                            @csrf
                                            {{method_field('put')}}
                                            <button class="btn" type="submit"> <i id="like" class="fas fa-heart"></i> {{$itemProduct->like}}</button>
                                        </form>
                                        {{--                                    <form action="{{route('like.product',$itemProduct->id)}}"  method="post"--}}
                                        {{--                                          enctype="multipart/form-data">--}}
                                        {{--                                        @csrf--}}
                                        {{--                                        {{method_field('put')}}--}}

                                        <button class="btn"><i class="fas fa-star ml-4"></i> {{$itemProduct->rating}}</button>
                                        {{--                                    </form>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @elseif($count != 1 && $count != 0)
                    <div class="col-md-12">
                        <div class="text-center">
                            <span class="fas fa-store fa-4x mt-5 mb-3 opacity-3"></span>
                            <h3 class="opacity-3">Tidak ada Tempat Usaha tersedia</h3>
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="text-center">
                            <span class="fas fa-search fa-4x mt-5 mb-3 opacity-3"></span>
                            <h3 class="opacity-3">Cari / Filter Terlebih dahulu</h3>
                        </div>
                    </div>
                @endif
            </div>
        </div>
            <div class="mt-5 col-lg-12 text-center">
                {{$products -> links()}}
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
