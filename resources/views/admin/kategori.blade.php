@extends('admin.layouts.master')

@section('title')
    Admin - Kategori
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Kategori</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/administrator') }}">Admin Home</a></li>
                        <li class="breadcrumb-item active">Kategori</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('body')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Semua Kategori</h3>
            <div class="card-tools">
                <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-tambah-kategori">Tambah Kategori Baru</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="kategori_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="kategori_table" class="table table-bordered table-striped dataTable dtr-inline collapsed"
                            role="grid" aria-describedby="kategori_table_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="kategori_table" rowspan="1" colspan="1"
                                        aria-sort="ascending"
                                        aria-label="No: activate to sort column descending">No.
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="kategori_table" rowspan="1" colspan="1"
                                        aria-sort="ascending"
                                        aria-label="Nama Kategori: activate to sort column descending">Nama Kategori
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="kategori_table" rowspan="1" colspan="1"
                                        aria-label="Gambar: activate to sort column ascending">Gambar
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="kategori_table" rowspan="1" colspan="1"
                                        aria-label="Action: activate to sort column ascending" style="display: none;">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $kat)
                                    @php
                                        if ($loop->iteration % 2 == 0) {
                                            $class = 'even';
                                        }
                                        else {
                                            $class = 'odd';
                                        }
                                    @endphp
                                    <tr role="row" class="{{ $class }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td tabindex="0" class="sorting_1">{{ $kat->nama_kategori }}</td>
                                        <td>
                                            <div class="row text-center">
                                                <div class="col">
                                                    <img src="{{ asset('/img/kategori/small/'.$kat->gambar) }}" alt="Preview Gambar Kategori">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row text-center">
                                                <div class="col-4">
                                                    <a href="" data-gambar="{{ asset('/img/kategori/'.$kat->gambar) }}" data-nama="{{ $kat->nama_kategori }}" data-toggle="modal" data-target="#modal-edit-kategori" data-id="{{ $kat->id }}"><i class="fas fa-edit"></i>Ubah</a>
                                                </div>
                                                <div class="col-4">
                                                    <a href="" data-nama="{{ $kat->nama_kategori }}" data-href="{{ url('/administrator/kategori/del') }}" data-id="{{ $kat->id }}" data-toggle="modal" data-target="#modal-delete-kategori"><i class="fas fa-trash-alt"></i>Hapus</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">No.</th>
                                    <th rowspan="1" colspan="1">Nama Kategori</th>
                                    <th rowspan="1" colspan="1">Gambar</th>
                                    <th rowspan="1" colspan="1" style="display: none;">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
{{-- Modal Delete --}}
    <div class="modal fade" id="modal-delete-kategori" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda serius ingin menghapus kategori yang bernama "<span id="nama"></span>" ?</p>
                <p><b>Semua produk yg terkandung dalam kategori ini akan ikut terhapus!</b></p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <form id="delete-form-kategori" action="" method="post">
                    @csrf
                    <input id="kategori-id" type="hidden" name="kat_id">
                    <button type="submit" id="hapus-kategori-button" class="btn btn-danger">Hapus</button>
                </form>
            </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

{{-- Modal Tambah --}}
    <div class="modal fade" id="modal-tambah-kategori" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kategori Baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="tambah-form-kategori" action="{{ url('/administrator/kategori/add') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="Nama_Kategori">Kategori</label>
                        <input type="text" class="form-control" name="kategori" id="Nama_Kategori" placeholder="Masukan Nama Kategori">
                    </div>
                    <div class="form-group">
                        <label for="Gambar_Kategori">Gambar Kategori</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="gambar" type="file" class="custom-file-input" id="Gambar_Kategori" accept="image/png, image/jpeg, images/jpg">
                                <label class="custom-file-label" id="Gambar_Kategori_Label" for="Gambar_Kategori">Choose file</label>
                            </div>
                        </div>
                        <p><small>Direkomendasikan mengupload gambar diatas 270x270 pixel atau sejajar</small><br>
                        <small>Max Size Upload: 4MB</small></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

{{-- Modal Edit --}}
    <div class="modal fade" id="modal-edit-kategori" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="edit-form-kategori" action="{{ url('/administrator/kategori/edit') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <p>Ubah Kategori <span id="kategori-ubah"></span></p>
                    <img id="ubah_kat_gambar" src=""/>
                    <input type="hidden" id="ubah_kat_id" name="kat_id">
                    <div class="form-group">
                        <label for="Nama_Kategori">Nama Kategori</label>
                        <input type="text" class="form-control" name="kategori" id="Nama_Kategori_Ubah" placeholder="Masukan Nama Kategori">
                    </div>
                    <div class="form-group">
                        <label for="Gambar_Kategori">Gambar Kategori Baru</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="gambar" type="file" class="custom-file-input" id="Gambar_Kategori_Ubah" accept="image/png, image/jpeg, images/jpg">
                                <label class="custom-file-label" id="Gambar_Kategori_Ubah_Label" for="Gambar_Kategori_Ubah">Choose file</label>
                            </div>
                        </div>
                        <p><small>Direkomendasikan mengupload gambar diatas 270x270 pixel atau sejajar</small><br>
                        <small>Max Size Upload: 4MB</small></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $(function () {
            $("#kategori_table").DataTable({
                "responsive": true,
                "autoWidth": false,
                "searching": false,
                "paging": false,
            });

            $('#Gambar_Kategori').change(function(e){
                if($('#Gambar_Kategori')[0].files){
                    var numFiles = $('#Gambar_Kategori')[0].files
                    var strings = numFiles[0].name;
                    var res = strings.slice(0, 40)+" ...";
                    document.getElementById('Gambar_Kategori_Label').innerText = res;
                }
            });
            $('#Gambar_Kategori_Ubah').change(function(e){
                if($('#Gambar_Kategori_Ubah')[0].files){
                    var numFiles = $('#Gambar_Kategori_Ubah')[0].files
                    var strings = numFiles[0].name;
                    var res = strings.slice(0, 40)+" ...";
                    document.getElementById('Gambar_Kategori_Ubah_Label').innerText = res;
                }
            });
        });
        var classadmin = document.getElementById("admin_tab");
        classadmin.classList.add("menu-open");
        var classkat = document.getElementById("kategori");
        classkat.classList.add("active");

    // Modal Delete
        $('#modal-delete-kategori').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var nama = button.data('nama');
            var href = button.data('href');
            var id = button.data('id');
            var modal = $(this);
            modal.find('.modal-title').text('Hapus Data Kategori');
            document.getElementById("nama").innerHTML = nama;
            document.getElementById('kategori-id').value = id;
            document.getElementById('delete-form-kategori').action = href;
        });

        $('#modal-edit-kategori').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var gambaredit = button.data('gambar');
            var namaedit = button.data('nama');
            // var href = button.data('href');
            var idedit = button.data('id');
            var modal = $(this);
            modal.find('.modal-title').text('Ubah Data Kategori');
            document.getElementById("kategori-ubah").innerHTML = namaedit;
            document.getElementById("Nama_Kategori_Ubah").value = namaedit;
            document.getElementById('ubah_kat_id').value = idedit;
            document.getElementById('ubah_kat_gambar').src = gambaredit;
        });
    </script>
@endsection
