@extends('admin.app')

@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Desa</h6>
        </div>
        <div class="card-body">
            <div class="card-body">
                <div class="col-md-12 mb-4">
                    <a href="javascript:void(0)" class="btn btn-primary btn-sm " id="createNewDesa">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Desa
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered data-table dataTable float-left" id="laravel_datatable">
                        <thead>
                        <tr>
                            <th>Nama Desa</th>
                            <th width="30%">Action</th>
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

    <div class="modal fade" id="ajaxModel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelHeading"></h4>
                </div>
                <div class="modal-body">
                    <form id="desaForm" name="desaForm" class="form-horizontal">

                            <div class="form-group">
                                <input hidden id="id" name="id">

                                <label for="kecamatan" class="col-sm-2 control-label">Kecamatan</label>
                                <div class="col-sm-12">
                                    <select name="kecamatan" class="custom-select"
                                            id="kecamatan" required>
                                        <option selected value="0">Pilih Kecamatan</option>
                                        @foreach($kecamatan as $item)
                                            <option value="{{$item->id}}">{{$item->nama_kecamatan}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                        <div class="form-group">
                            <label for="nama_desa" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nama_desa" name="nama_desa"
                                       placeholder="Masukan Desa" value="" maxlength="50" required="">
                            </div>
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
                ajax: "{{ route('desa.dataIndex') }}",
                columns: [
                    {data: 'nama_desa', name: 'nama_desa'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $('#createNewDesa').click(function () {
                $('#saveBtn').val("create-desa");
                $('#id').val();
                $('#desaForm').trigger("reset");
                $('#modelHeading').html("Tambah Kecamatan Baru");
                $('#ajaxModel').modal('show');
            });

            $('tbody').on('click', '.edit', function () {
                var id = $(this).data('id');

                $.get("{{ route('adminDesa.index') }}" + '/' + id + '/edit', function (data) {
                    console.log(data);
                    $('#ajaxModel').modal('show');
                    $('#modelHeading').html("Edit Desa");
                    $('#saveBtn').val("edit-kecamatan");
                    $('#id').val(data.id);
                    $('#nama_desa').val(data.nama_desa);
                    $('#kecamatan').val(data.kecamatan_id);
                })

            });

            $('#saveBtn').click(function (e) {
                e.preventDefault();
                $(this).html('Sending..');
                $.ajax({

                    data: $('#desaForm').serialize(),
                    url: "{{ route('adminDesa.store') }}",
                    type: "POST",
                    dataType: 'json',

                    success: function (data) {
                        $('#desaForm').trigger("reset");
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
                            url: "{{ route('adminDesa.store') }}" + '/' + product_id,

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
    </script>
@endsection



