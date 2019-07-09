@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3>Produk Saya <a href="#" class="right btn btn-outline-info" >Tambah Produk</a></h3>
    </div>

    <div class="container ">
        <div class="row">
            <div class="col-lg-3 mt-4 d-flex">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('img/kebun.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <div class="row ml-0">
                            <p>
                                <a href="#" class="btn btn-outline-info mr-5 ml-2">Edit</a>
                            </p>
                            <p>

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
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection