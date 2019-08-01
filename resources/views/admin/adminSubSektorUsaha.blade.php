@extends('admin.app')

@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Sub Bidang Usaha</h6>
        </div>
        <div class="card-body">
            <div class="card-body">
                <div class="col-md-12 mb-4">
                    <a href="javascript:void(0)" class="btn btn-primary btn-sm " id="createNewSubSektor">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Sub Bidang Usaha
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered data-table dataTable float-left" id="laravel_datatable">
                        <thead>
                        <tr>
                            <th>Nama Sub Bidang Usaha</th>
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
                    <form id="subsektorForm" name="subsektorForm" class="form-horizontal">

                        <div class="form-group">
                            <input hidden id="id" name="id">

                            <label for="nama_sektor_usaha" class="col-sm-2 control-label">Bidang Usaha</label>
                            <div class="col-sm-12">
                                <select name="nama_sektor_usaha" class="custom-select"
                                        id="nama_sektor_usaha" required>
                                    <option selected value="0">Pilih Bidang Usaha</option>
                                    @foreach($sektor as $item)
                                        <option value="{{$item->id}}">{{$item->nama_sektor_usaha}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="sub_sektor_usaha" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="sub_sektor_usaha" name="sub_sektor_usaha"
                                       placeholder="Masukan Sub Bidang Usaha" value="" maxlength="50" required="">
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
                ajax: "{{ route('subsektor.dataIndex') }}",
                columns: [
                    {data: 'sub_sektor_usaha', name: 'sub_sektor_usaha'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $('#createNewSubSektor').click(function () {
                $('#saveBtn').val("create-subsektor");
                $('#id').val();
                $('#subsektorForm').trigger("reset");
                $('#modelHeading').html("Tambah Sub Bidang Usaha Baru");
                $('#ajaxModel').modal('show');
            });

            $('tbody').on('click', '.edit', function () {
                var id = $(this).data('id');

                $.get("{{ route('adminSubSektorUsaha.index') }}" + '/' + id + '/edit', function (data) {
                    console.log(data);
                    $('#ajaxModel').modal('show');
                    $('#modelHeading').html("Edit Sub Bidang Usaha");
                    $('#saveBtn').val("edit-subsektor");
                    $('#id').val(data.id);
                    $('#sub_sektor_usaha').val(data.sub_sektor_usaha);
                    $('#nama_sektor_usaha').val(data.id_sektor_usaha);
                })

            });

            $('#saveBtn').click(function (e) {
                e.preventDefault();
                $(this).html('Sending..');
                $.ajax({

                    data: $('#subsektorForm').serialize(),
                    url: "{{ route('adminSubSektorUsaha.store') }}",
                    type: "POST",
                    dataType: 'json',

                    success: function (data) {
                        $('#subsektorForm').trigger("reset");
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
                    text: "Anda Menghapus Sub Bidang Usaha ini",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete => {
                    if (willDelete) {
                        $.ajax({

                            type: "DELETE",
                            url: "{{ route('adminSubSektorUsaha.store') }}" + '/' + product_id,

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



