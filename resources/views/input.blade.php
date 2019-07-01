@extends('layouts.app')

@section('content')

    <div class="container w-50">
        <form enctype="multipart/form-data">
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
                <div class="form-group inputDnD">
                    <label class="sr-only" for="inputFile">File Upload</label>
                    <input type="file" class="form-control-file text-primary font-weight-bold py-5" id="inputFile"
                           accept="image/*" onchange="readUrl(this)" data-title="Drag and drop a file">
                </div>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput">Alamat Toko</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-home"></i></span>
                    <textarea placeholder="Alamat toko" class="form-control no-border-left"
                              id="formGroupExampleInput"></textarea>
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
                    <input type="number" class="form-control no-border-left" id="formGroupExampleInput"
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
            <div class="form-group">
                <label for="formGroupExampleInput">Nominal</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right">Rp.</span>
                    <input type="number" class="form-control no-border-left" id="formGroupExampleInput"
                           placeholder="Nominal">
                </div>
            </div>
            <h3 class="py-4">Detail Izin Usaha</h3>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Jenis Izin Usaha</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text no-border-right"><i class="fas fa-clipboard-check"></i></span>
                            <select class="custom-select" id="inputGroupSelect01">
                                <option selected>Choose...</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nomor Izin Usaha</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text no-border-right">No.</i></span>
                            <input type="number" class="form-control no-border-left" id="formGroupExampleInput"
                                   placeholder="nomor">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Tanggal Izin Berakhir</label>
                        <div class="input-group-prepend">
                            <span class="input-group-text no-border-right"><i class="fas fa-calendar-alt"></i></span>
                            <input type="date" class="form-control no-border-left"
                                   placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-info">Tambah Izin Usaha</button>
        </form>
        <button type="button" class="btn btn-info mt-4 w-100">Tambah Toko</button>
    </div>
@endsection
