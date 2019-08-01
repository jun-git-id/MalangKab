@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3>Tempat Usaha Favorit</h3>
    </div>

    <div class="container ">
        <div class="row">
            @if($tempatusaha->count())
                @foreach($tempatusaha as $itemUsaha)
                    <div class="col-lg-3 mt-4 d-flex">
                        <div class="card shadow-sm rounded p-2" style="width: 18rem;">
                            <a href="/detailusaha/{{$itemUsaha->likeUsaha->id}}">
                                <img src="{{asset('storage/'. $itemUsaha->likeUsaha->foto_tempat_usaha)}}" class="card-img-top py-2 card-img-container"  alt="...">
                            </a>
                            <div class="card-body pb-0">
                                <h5 class="card-title text-primary">{{$itemUsaha->likeUsaha->nama_tempat}}</h5>
                                <p class="card-text">{{$itemUsaha->likeUsaha->deskripsi}}</p>
                                <div class="row">
                                    <button class="btn btn-outline-info ml-5 w-100" onclick="deleteProduct('{{ $itemUsaha->id }}','{{ $itemUsaha->likeUsaha->nama_tempat }}','{{$itemUsaha->likeUsaha->id}}')">Hapus</button>

                                </div>

                            </div>
                            <div class="mt-3" data-toggle="tooltip" data-placement="left" title="{{$itemUsaha->likeUsaha->kategoriUsaha->nama_kategori_usaha}}" style="height:10px;border-bottom: 0.5rem solid {{$itemUsaha->likeUsaha->kategoriUsaha->color}} !important;"></div>

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

            {{--<div class="col-md-12">--}}
            {{--<div class="text-center">--}}
            {{--<span class="fas fa-store fa-4x mt-3 mb-3 opacity-3"></span>--}}
            {{--<h3 class="opacity-3">Tidak ada Tempat Usaha tersedia</h3>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--@endif--}}

        </div>
    </div>
    <script>

        function deleteProduct(likeUsahaId, namaTempat, usahaId) {
            swal({
                title: "Apa anda yakin?",
                text: "Anda Menghapus Product " + namaTempat,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete => {
                if (willDelete) {
                    let theUrlUpdate = "{{ route('tempatUsaha.dislike', ':usahaId') }}";
                    theUrlUpdate = theUrlUpdate.replace(":usahaId", usahaId);
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

                    let theUrl = "{{ route('tempatUsaha.deleteFavorit', ':likeUsahaId') }}";
                    theUrl = theUrl.replace(":likeUsahaId", likeUsahaId);
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