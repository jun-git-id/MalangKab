@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3>Produk Saya <a href="{{route('products.create')}}" class="right btn btn-outline-info">Tambah Produk</a></h3>
    </div>

    <div class="container ">
        <div class="row">
            @if($products->count())
                @foreach($products as $item)
                    <div class="col-lg-3 mt-4 d-flex">
                        <div class="card" style="width: 18rem;">
{{--                            @foreach($products->productimage as $img)--}}
                            <img src="{{asset('storage/uploads/product/')}}" class="card-img-top" alt="...">
{{--                            @endforeach--}}
                            <div class="card-body">
                                <h5 class="card-title">{{$item -> id}}</h5>
                                <p class="card-text">{{$item -> deskripsi}}</p>
                                <div class="row ml-0">
                                    <p>
                                        <a href="{{route('products.edit',$item->id)}}" class="btn btn-outline-info mr-5 ml-2">Edit</a>
                                    </p>
                                    <p>
                                        <button class="btn btn-outline-info ml-4" onclick="deleteProduct('{{ $item->id }}','{{ $item->name }}')">Hapus
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <div class="text-center">
                        <span class="fas fa-store fa-4x mt-5 mb-3 opacity-3"></span>
                        <h3 class="opacity-3">Tidak ada Produk tersedia</h3>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>

        function deleteProduct(productId, productName) {
            swal({
                title: "Apa anda yakin?",
                text: "Anda Menghapus Product " + productName,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete => {
                if (willDelete) {
                    let theUrl = "{{ route('products.destroy', ':productId') }}";
                    theUrl = theUrl.replace(":productId", productId);
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