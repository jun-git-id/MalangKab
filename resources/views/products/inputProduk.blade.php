@extends('layouts.app')

@section('content')

    <div class="container w-50">
        <form role="form" action="{{route('products.store')}}" method="post" enctype="multipart/form-data" id="thisproduct">
            @csrf
            <div class="form-group">
                <label for="formGroupExampleInput">Jenis Produk / Layanan</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-list-ul"></i></span>
                    <select name="jenis_produk_id" class="custom-select" id="inputGroupSelect01" required>
                        <option selected disabled>Pilih Jenis Produk</option>
                        @foreach($jenisProduk as $item)
                        <option value="{{$item -> id}}">{{$item -> jenis_produk}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Pilih Tempat Usaha</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-list-ul"></i></span>
                    <select name="tempat_usaha_id" class="custom-select" id="inputGroupSelect01" required>
                        <option selected disabled>Pilih tempat usaha</option>
                        @if($tempatUsaha ->count())
                        @foreach($tempatUsaha as $item)
                            <option value="{{$item -> id}}">{{$item -> nama_tempat}}</option>
                        @endforeach
                            @else
                            <option value="">Tidak ada</option>

                        @endif
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Nama Produk</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-info-circle"></i></span>
                    <input name="nama_produk" type="text" class="form-control no-border-left" id="formGroupExampleInput"
                           placeholder="Nama Produk" required>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Deskripsi</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-info-circle"></i></span>
                    <textarea name="deskripsi" class="form-control no-border-left" id="formGroupExampleInput"
                              placeholder="Deskripsi" value="{{old('deskripsi')}}" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="dropzone">Upload Image <a href="#" data-toggle="image-kesenian"
                                                      title="Upload Foto Product mu! (multiple image)"><i
                                class="fa fa-info-circle"></i></a></label>
                <div id="file" class="dropzone"></div>
            </div>

            <div class="form-group">
                <label for="formGroupExampleInput">Harga</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right">Rp.</span>
                    <input type="number" name="harga" class="form-control no-border-left" id="formGroupExampleInput"
                           placeholder="Harga" required>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Unit Produk</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-list-ul"></i></span>
                    <select name="unit_product_id" class="custom-select" id="inputGroupSelect01" required>
                        <option selected disabled>Pilih unit</option>
                        @foreach($unit as $item)
                            <option value="{{$item -> id}}">{{$item -> unit_product}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput">Stok</label>
                <div class="input-group-prepend">
                    <span class="input-group-text no-border-right"><i class="fas fa-info-circle"></i></span>
                    <input name="stok" type="number" class="form-control no-border-left" id="formGroupExampleInput"
                           placeholder="Stok" required>
                </div>
            </div>
            <button type="submit" class="btn btn-info mt-4 w-100">Tambah Produk</button>

        </form>

    </div>
    <script type="text/javascript">
        let drop = new Dropzone('#file', {
            addRemoveLinks: true,
            url: '{{ route('upload.image') }}',
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
            },

        });

        drop.on("success", function (file, res) {
            file.id = res.id;
            $("#thisproduct").append($('<input type="hidden" ' + 'name="product_images[]" ' + 'value="' + res.id + '" id="image' + res.id + '">'))
        });


        drop.on('removedfile', function (file) {
            axios.delete('/delete-image/' + file.id)
                .then(function (response) {
                    console.log(response.status);
                    $('#image' + file.id).remove();
                })
                .catch(function (error) {
                });
        });

        function tambah() {
            $('#input_video').before($('#form-clone').clone());
        }

        $("body").on("click", ".remove", function () {
            $(this).closest(".form-group").remove();
        });

    </script>
@endsection



