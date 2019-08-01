@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3>Produk Favorit Saya</h3>
    </div>

    <div class="container ">
        <div class="row">
            @if($products->count())
                @foreach($products as $itemProduct)
                    <div class="col-lg-3 mt-4 d-flex">
                        <div class="card shadow-sm rounded p-2 " style="width: 18rem;">
                            <a href="/detailproduk/{{$itemProduct->likeProduct->id}}">
                                <img src="{{asset('storage/'. $itemProduct->likeProduct->image)}}" class="card-img-top py-2 card-img-container"  alt="...">
                            </a>
                            <div class="card-body pb-0">
                                <h5 class="card-title text-primary">{{$itemProduct->likeProduct->nama_produk}}</h5>
                                <p class="card-text">{{$itemProduct -> likeProduct -> provider-> nama_tempat}}</p>
                                <p class="card-text text-primary font-bold">Rp. {{$itemProduct -> likeProduct ->harga}}</p>
                                <div class="row ml-0">

                                       <button class="btn btn-outline-info ml-5 w-100" onclick="deleteProduct('{{ $itemProduct->id }}','{{ $itemProduct->likeProduct->nama_produk }}','{{$itemProduct->likeProduct->id}}')">Hapus</button>


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

        function deleteProduct(likeProductId, namaTempat, productId) {
            swal({
                title: "Apa anda yakin?",
                text: "Anda Menghapus Product " + namaTempat,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete => {
                if (willDelete) {
                    let theUrlUpdate = "{{ route('product.dislike', ':productId') }}";
                    theUrlUpdate = theUrlUpdate.replace(":productId", productId);
                    $.ajax({
                        type: 'POST',
                        url: theUrlUpdate,
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            _method: "post"},
                        success: function (data) {
                            window.location.href = data;
                        },
                        error: function (data) {
                            swal("Oops", "We couldn't connect to the server!", "error");
                        }
                    });

                    let theUrl = "{{ route('product.deleteFavorit', ':likeProductId') }}";
                    theUrl = theUrl.replace(":likeProductId", likeProductId);
                    $.ajax({
                        type: 'POST',
                        url: theUrl,
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            _method: "delete"},
                        success: function (data) {
                            window.location.href = data;
                        },
                        error: function (data) {
                            swal("Oops", "We couldn't connect to the server!", "error");
                        }
                    });

                }
            }));
        }
    </script>
@endsection