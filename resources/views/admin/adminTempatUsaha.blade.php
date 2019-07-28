@extends('admin.app')

@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Tempat Usaha</h6>
        </div>
        <div class="card-body">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable data-table" id="dataTable" width="100%"
                           cellspacing="0">
                        <thead>
                        <tr>
                            <th>Nama Tempat Usaha</th>
                            <th>Status</th>
                            <th width="20%">Aksi</th>
                        </tr>
                        </thead>

                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <!-- Modal -->
    <!-- Modal -->
@if($usaha != null)
    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="usahaForm" name="usahaForm" class="form-horizontal">
                        <input hidden id="id" name="id">

                        <div class="form-group">
                            <label for="nama_tempat" class="col-sm-12 control-label">Nama Tempat Usaha</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nama_tempat" name="nama_tempat"
                                       disabled value="{{$usaha->nama_tempat}}" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama_pemilik" class="col-sm-12 control-label">Nama Pemilik</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik"
                                       disabled value="{{$usaha->user->nama}}" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="col-sm-12 control-label">Deskripsi</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                                       disabled value="{{$usaha->deskripsi}}" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="foto_tempat" class="col-sm-12 control-label">Foto Tempat Usaha</label>
                            <div class="col-sm-12 text-center">
                                <img id="foto_tempat" src="{{asset('storage/'.$usaha->foto_tempat_usaha)}}" alt=""
                                     width="50%">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="col-sm-12 control-label">Alamat</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                       disabled value="{{$usaha->alamat}}" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="notelp" class="col-sm-12 control-label">No. Telpon</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="notelp" name="notelp"
                                       disabled value="{{$usaha->no_telp}}" maxlength="50" required="">
                            </div>
                        </div>
                        @if($izinusaha ->count())
                            @foreach($izinusaha as $i => $item)
                                <div class="ml-1 form-group row">
                                    <label for="izin_usaha" class="col-sm-12 control-label">Izin Usaha {{$i+1}} </label>
                                    <div class="col-sm-6">
                                        <p>{{$item->jenisIzin->jenis_izin_usaha}}</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="izin_usaha[]" name="izin_usaha[]"
                                               disabled value="{{$item->no_izin_usaha}}" maxlength="50" required="">
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="form-group">
                                <label for="izin_usaha" class="col-sm-12 control-label">Izin Usaha</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="izin_usaha[]" name="izin_usaha[]"
                                           disabled value="" maxlength="50" required="">
                                </div>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="status" class="col-sm-12 control-label">Status</label>
                            <select id="status" name="status[]" class="status custom-select ml-1">
                                <option selected="true" value="{{$usaha -> status}}">{{$usaha->status}}</option>
                                <option value="Approve">Approve</option>
                                <option value="Pending">Pending</option>
                            </select>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('usaha.adminIndex') }}",
                columns: [
                    {data: 'nama_tempat', name: 'nama_tempat'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });


            $('tbody').on('click', '.edit', function () {
                var id = $(this).data('id');

                $.get("{{ url('/ajax-adminTempatUsaha') }}" + '/' + id, function (data) {
                    $('#ajaxModel').modal('show');
                    $('#modelHeading').html("Edit Usaha");
                    $('#saveBtn').val("edit-usaha");
                    $('#id').val(data.id);
                    $('.status').val(data.status);

                })

            });

            $('#saveBtn').click(function (e) {
                e.preventDefault();
                $(this).html('Sending..');
                $.ajax({

                    data: $('#usahaForm').serialize(),
                    url: "{{ route('usaha.adminUpdate') }}",
                    type: "POST",
                    dataType: 'json',

                    success: function (data) {
                        $('#usahaForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();

                    },

                    error: function (data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }

                });

            });


            $('body').on('click', '.delete', function () {
                var product_id = $(this).data("id");
                // confirm("Are You sure want to delete !");
                swal({
                    title: "Apa anda yakin?",
                    text: "Anda Menghapus Kecamatan ini",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete => {
                    if (willDelete) {
                        $.ajax({

                            type: "DELETE",
                            url: "{{ url('/ajax-adminTempatUsaha/delete') }}" + '/' + product_id,

                            success: function (data) {
                                table.draw();
                            },

                            error: function (data) {
                                console.log('Error:', data);
                            }
                        });
                    }
                }));

            });


        });
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


