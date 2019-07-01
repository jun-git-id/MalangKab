@extends('layouts.app')

@section('content')

    <div class="container w-50">
        <form>
            <div class="form-group">
                <label for="formGroupExampleInput">Nama Toko</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-store"></i></span>
                    <input type="text" class="form-control no-border-left" id="formGroupExampleInput"
                           placeholder="Nama Toko">
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Tambah Foto</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-camera"></i></span>
                    <input type="text" class="form-control no-border-left" id="formGroupExampleInput"
                           placeholder="Foto">
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Alamat Toko</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-home"></i></span>
                    <textarea placeholder="Alamat toko" class="form-control no-border-left" id="formGroupExampleInput"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Lokasi Map</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-map-marked-alt"></i></span>
                    <input type="text" class="form-control no-border-left" id="formGroupExampleInput"
                           placeholder="Lokasi pada map">
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Deskripsi</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-info-circle"></i></span>
                    <input type="text" class="form-control no-border-left" id="formGroupExampleInput"
                           placeholder="Deskripsi">
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Nomor Telepon</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-phone"></i></span>
                    <input type="text" class="form-control no-border-left" id="formGroupExampleInput"
                           placeholder="Nomor telepon">
                </div>
            </div>
            <h3 class="py-4">Data Tempat Usaha</h3>
            <div class="form-group">
                <label for="formGroupExampleInput">Kategori Usaha</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-list-ul"></i></span>
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Kegiatan Usaha</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-grip-horizontal"></i></span>
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Status Kepemilikan</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-people-carry"></i></span>
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Jenis Investasi</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-coins"></i></span>
                    <select class="custom-select" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
@endsection
