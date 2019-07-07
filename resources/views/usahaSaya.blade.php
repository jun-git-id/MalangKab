@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3>Tempat Usaha Saya <a href="{{route('tempatusaha.create')}}" class="right btn btn-outline-info">Tambah Usaha</a></h3>
    </div>

    <div class="container ">
        <div class="row">
            @if($tempatusaha->count())
                @foreach($tempatusaha as $itemUsaha)
                    <div class="col-lg-3 mt-4 d-flex">
                        <div class="card" style="width: 18rem;">
                            <a href="/detailusaha/{{$itemUsaha->id}}">
                                <img src="{{asset('storage/'. $itemUsaha->foto_tempat_usaha)}}" class="card-img-top py-2 card-img-container"  alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{$itemUsaha->nama_tempat}}</h5>
                                <p class="card-text">{{$itemUsaha->deskripsi}}</p>
                                <div class="row ml-0">
                                    <p>
                                        <a href="{{route('tempatusaha.edit', $itemUsaha->id)}}" class="btn btn-outline-info mr-5 ml-2">Edit</a>
                                    </p>
                                    <p>
                                    <form action="{{ route('tempatusaha.destroy', $itemUsaha->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-outline-info ml-4" data-toggle="modal" data-target="#deleteUsaha">Hapus</button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteUsaha" tabindex="-1" role="dialog" aria-labelledby="deleteUsahaModal" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteUsahaModal"Hapus Tempat usaha</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin akan menghapus tempat usaha anda?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    </p>
                                </div>
                            </div>
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
@endsection