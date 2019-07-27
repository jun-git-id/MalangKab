@extends('admin.app')

@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Jenis Investasi</h6>
        </div>
        <div class="card-body">
            <div class="card-body">
                <div class="col-md-12 mb-4">
                    <a href="javascript:void(0)" class="btn btn-primary btn-sm " id="createNewInvestasi">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Jenis Investasi
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered data-table dataTable float-left" id="laravel_datatable">
                        <thead>
                        <tr>
                            <th>Nama </th>
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
                    <form id="investasiForm" name="investasiForm" class="form-horizontal">
                        <input hidden id="id" name="id">

                        <div class="form-group">
                            <label for="jenis_investasi" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="jenis_investasi" name="jenis_investasi"
                                       placeholder="Masukan Jenis Investasi" value="" maxlength="50" required="">
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
                ajax: "{{ route('adminJenisInvestasi.index') }}",
                columns: [
                    {data: 'jenis_investasi', name: 'jenis_investasi'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $('#createNewInvestasi').click(function () {
                $('#saveBtn').val("create-investasi");
                $('#id').val();
                $('#investasiForm').trigger("reset");
                $('#modelHeading').html("Tambah Jenis Investasi Baru");
                $('#ajaxModel').modal('show');
            });

            $('tbody').on('click', '.edit', function () {
                var id = $(this).data('id');

                $.get("{{ route('adminJenisInvestasi.index') }}" + '/' + id + '/edit', function (data) {
                    $('#ajaxModel').modal('show');
                    $('#modelHeading').html("Edit Product");
                    $('#saveBtn').val("edit-investasi");
                    $('#id').val(data.id);
                    $('#jenis_investasi').val(data.jenis_investasi);
                })

            });

            $('#saveBtn').click(function (e) {
                e.preventDefault();
                $(this).html('Sending..');
                $.ajax({

                    data: $('#investasiForm').serialize(),
                    url: "{{ route('adminJenisInvestasi.store') }}",
                    type: "POST",
                    dataType: 'json',

                    success: function (data) {
                        $('#investasiForm').trigger("reset");
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
                    text: "Anda Menghapus Jenis Investasi ini",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete => {
                    if (willDelete) {
                        $.ajax({

                            type: "DELETE",
                            url: "{{ route('adminJenisInvestasi.store') }}" + '/' + product_id,

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