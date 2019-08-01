@extends('layouts.app')

@section('content')
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('img/sawah.jpg')}}" class="d-block w-100 slidenya" alt="Sawah di desa">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('img/kebun.jpg')}}" class="d-block w-100 slidenya" alt="Kebun di desa">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('img/usaha.jpg')}}" class="d-block w-100 slidenya" alt="Bekerja">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="container mt-5 ">
        <h3>Tempat Usaha <a href="/Tempat" class="right" style="font-size: 18px" >Lihat semua</a></h3>
    </div>

    {{--card--}}
    <div class="container ">
        <div class="row">
        @if($tempatusaha->count())
            @foreach($tempatusaha as $itemUsaha)
            <div class="col-lg-3 mt-4 d-flex">
                <div class="card shadow-sm rounded p-2" style="width: 18rem;">
                    <a href="/detailusaha/{{$itemUsaha->id}}">
                    <img src="{{asset('storage/'. $itemUsaha->foto_tempat_usaha)}}" class="card-img-top py-2 card-img-container"  alt="...">
                    </a>
                    <div class="card-body pb-0">
                        <h5 class="card-title text-primary">{{$itemUsaha->nama_tempat}}</h5>
                        <p class="card-text">{{$itemUsaha->deskripsi}}</p>
                        <div class="row">
                            <form action="{{route('like.usaha',$itemUsaha->id)}}"  method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                {{method_field('put')}}
                                <button class="btn" type="submit"> <i id="like" class="fas fa-heart"></i> {{$itemUsaha->like}}</button>
                            </form>
{{--                            <form action=""  method="post"--}}
{{--                                  enctype="multipart/form-data">--}}
{{--                                @csrf--}}
{{--                                {{method_field('put')}}--}}
                                <button class="btn"><i class="fas fa-star ml-4"></i> {{$itemUsaha->rating}}</button>
{{--                            </form>--}}
                        </div>

                    </div>
                    <div data-toggle="tooltip" data-placement="left" title="{{$itemUsaha->kategoriUsaha->nama_kategori_usaha}}" style="height:10px;border-bottom: 0.5rem solid {{$itemUsaha->kategoriUsaha->color}} !important;"></div>

                </div>
            </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <div class="text-center">
                            <span class="fas fa-store fa-4x mt-3 mb-3 opacity-3"></span>
                            <h3 class="opacity-3">Tidak ada Tempat Usaha tersedia</h3>
                    </div>
                </div>
            @endif
            </div>
        </div>
    <div class="container mt-5">
        <h3>Produk<a href="#" class="right" style="font-size: 18px" >Lihat semua</a></h3>
    </div>
    <div class="container ">
        <div class="row">
            @if($products->count())
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
            @else
                <div class="col-md-12">
                    <div class="text-center">
                        <span class="fas fa-store fa-4x mt-3 mb-3 opacity-3"></span>
                        <h3 class="opacity-3">Tidak ada produk tersedia</h3>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script>
        $('#like').on('click', function () {
            var i = 1;
            $('#totalLike').append(i++);
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(this).tooltip();
        });
    </script>
@endsection
