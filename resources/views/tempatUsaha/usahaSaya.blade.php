@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3>Tempat Usaha Saya @if(Auth::user()->role_id != 3)<a href="{{route('tempatusaha.create')}}" class="right btn btn-outline-info" >Tambah Usaha</a>@endif</h3>
    </div>

    <div class="container ">
        <div class="row">

                @if(Auth::user()->role_id == 3 && $cekStatus)
                    <div class="col-md-12">
                        <div class="text-center">
                            <span class="fas fa-sad-tear fa-4x mt-3 mb-3 opacity-3"></span>
                            <h3 class="opacity-3">Status Pengajuan Anda Belum Terverifikasi!</h3>
                        </div>
                    </div>
                @elseif(Auth::user()->role_id == 3)
                    <div class="col-md-12">
                        <div class="text-center">
                            <span class="fas fa-sad-cry fa-4x mt-3 mb-3 opacity-3"></span>
                            <h3 class="opacity-3">Anda belum terdaftar sebagai pelaku usaha</h3>
                            <a href="{{route('tempatusaha.create')}}" class="mt-3 btn btn-outline-info" >Daftar Usaha Anda!</a>
                        </div>
                    </div>
            @elseif($tempatusaha->count())
                @foreach($tempatusaha as $itemUsaha)
                    <div class="col-lg-3 mt-4 d-flex">
                        <div class="card shadow-sm rounded p-2" style="width: 18rem;">
                            <a href="/detailusaha/{{$itemUsaha->id}}">
                                <img src="{{asset('storage/'. $itemUsaha->foto_tempat_usaha)}}" class="card-img-top py-2 card-img-container"   alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title text-primary">{{$itemUsaha->nama_tempat}}</h5>
                                <p class="card-text">{{$itemUsaha->deskripsi}}</p>
                                <p class="card-text">Status <i class="font-bold">{{$itemUsaha->status}}</i></p>
                                <div class="row ml-0">
                                    <p>
                                        <a href="{{route('tempatusaha.edit',$itemUsaha->id)}}" class="btn btn-outline-info mr-5 ml-2">Edit</a>
                                    </p>
                                    <p>
                                        <button class="btn btn-outline-info ml-4" onclick="deleteProduct('{{ $itemUsaha->id }}','{{ $itemUsaha->nama_tempat }}')">Hapus
                                        </button>
                                    </p>
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
    <script>

        function deleteProduct(tempatUsahaId, namaTempat) {
            swal({
                title: "Apa anda yakin?",
                text: "Anda Menghapus Product " + namaTempat,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete => {
                if (willDelete) {
                    let theUrl = "{{ route('tempatusaha.destroy', ':tempatUsahaId') }}";
                    theUrl = theUrl.replace(":tempatUsahaId", tempatUsahaId);
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