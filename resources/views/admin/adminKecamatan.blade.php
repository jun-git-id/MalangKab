@extends('admin.app')

@section('content')

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kecamatan</h6>
        </div>
        <div class="card-body">
            <div class="card-body">
                <div class="col-md-12 mb-4">
                    <a href="#" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Kecamatan
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" id="table" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Nama Kecamatan </th>
                            <th width="20%">Aksi</th>
                        </tr>
                        </thead>
                        @foreach($kecamatan as $item)
                            <tr class="item{{$item->id}}">
                                <td>{{$item->id}}</td>
                                <td>{{$item->kecamatan}}</td>
                                <td><button class="edit-modal btn btn-info" data-id="{{$item->id}}"
                                            data-name="{{$item->kecamatan}}">
                                        <i class="fas fa-pencil-alt mr-2"></i> Ubah
                                    </button>
                                    <button class="delete-modal btn btn-danger" data-id="{{$item->id}}"
                                            data-name="{{$item->kecamatan}}">
                                        <i class="fas fa-trash-alt mr-2"></i>Hapus
                                    </button></td>
                            </tr>
                        @endforeach

                        <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>
                                <a href="#"
                                   class="btn btn-primary btn-xs dataTable">
                                    <i class="fas fa-pencil-alt mr-2"></i>Ubah</a>
                                <button onclick=""
                                        class="btn btn-danger btn-xs dataTable">
                                    <i class="fas fa-trash-alt mr-2"></i>Hapus
                                </button>
                            </td>

                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>
                                <a href="#"
                                   class="btn btn-primary btn-xs dataTable">
                                    <i class="fas fa-pencil-alt mr-2"></i>Ubah</a>
                                <button onclick=""
                                        class="btn btn-danger btn-xs dataTable">
                                    <i class="fas fa-trash-alt mr-2"></i>Hapus
                                </button>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kecamatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('kecamatan.store')}}">
                    <label>Nama Kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control" placeholder="masukkan nama kecamatan" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="add">Tambah</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $("#add").click(function() {

            $.ajax({
                type: 'post',
                url: '/addKecamatan',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'name': $('input[name=kecamatan]').val()
                },
                success: function(data) {
                    if ((data.errors)) {
                        $('.error').removeClass('hidden');
                        $('.error').text(data.errors.name);
                    } else {
                        $('.error').remove();
                        $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                    }
                },
            });
        });
    </script>
@endsection

    <script>
        $('#data-table').DataTable({
            "columnDefs": [{
                "targets": 6,
                "orderable": false
            }],
            "responsive": true,
            "pageLength": 10,
            "language": {
                "lengthMenu": "Tampilkan _MENU_ per halaman",
                "zeroRecords": "Tidak ada data",
                "info": "Tampilkan _PAGE_ dari _PAGES_ halaman",
                "infoEmpty": "",
                "search": "Cari Data :",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "previous": "Sebelumnya",
                    "next": "Selanjutnya"
                }
            }
        });
    </script>

