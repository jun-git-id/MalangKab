@extends('layouts.app')

@section('content')

    <div class="container w-50">
        <form role="form" action="{{route('tempatusaha.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            {{method_field('POST')}}
            <div class="form-group">
                <label for="formGroupExampleInput">Jenis Produk / Layanan</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-list-ul"></i></span>
                    <select name="jenis_produk" class="custom-select" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Pilih Tempat Usaha</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-list-ul"></i></span>
                    <select name="jenis_usaha" class="custom-select" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Nama Produk</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-info-circle"></i></span>
                    <input name="nama_produk" type="text" class="form-control no-border-left" id="formGroupExampleInput"
                           placeholder="Nama Produk">
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Deskripsi</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-info-circle"></i></span>
                    <textarea name="deskripsi_produk" type="text" class="form-control no-border-left" id="formGroupExampleInput"
                              placeholder="Deskripsi"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Tambah Foto</label>
                <div class="form-group inputDnD">
                    <label class="sr-only" for="inputFile">File Upload</label>
                    <input type="file" name="foto_produk" class="form-control-file text-primary font-weight-bold py-5"
                           id="inputFile"
                           accept="image/*" onchange="readUrl(this)" data-title="Drag and drop a file">
                </div>
            </div>


            <div class="form-group">
                <label for="formGroupExampleInput">Harga</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right">Rp.</span>
                    <input type="number" name="harga" class="form-control no-border-left" id="formGroupExampleInput"
                           placeholder="Harga">
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Unit Produk</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-list-ul"></i></span>
                    <select name="unit_produk" class="custom-select" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Stok</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-info-circle"></i></span>
                    <input name="stok" type="number" class="form-control no-border-left" id="formGroupExampleInput"
                           placeholder="Stok">
                </div>
            </div>
            <button type="submit" class="btn btn-info mt-4 w-100">Tambah Produk</button>

        </form>
    </div>
@endsection
