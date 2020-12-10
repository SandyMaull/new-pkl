@extends('admin.layouts.master')

@section('title')
    Admin - Produk
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
                    <h1 class="m-0 text-dark">Produk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/administrator') }}">Admin Home</a></li>
                        <li class="breadcrumb-item active">Produk</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('body')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Semua Produk</h3>
            <div class="card-tools">
                <a href="{{ url('/administrator/produk/add') }}" class="btn btn-primary btn-sm">Tambah Produk Baru</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="produk_table_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="produk_table" class="table table-bordered table-striped dataTable dtr-inline collapsed"
                            role="grid" aria-describedby="produk_table_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="produk_table" rowspan="1" colspan="1"
                                        aria-sort="ascending"
                                        aria-label="No: activate to sort column descending">No.
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="produk_table" rowspan="1" colspan="1"
                                        aria-sort="ascending"
                                        aria-label="Nama produk: activate to sort column descending">Nama produk
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="produk_table" rowspan="1" colspan="1"
                                        aria-sort="ascending"
                                        aria-label="Kategori: activate to sort column descending">Kategori
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="produk_table" rowspan="1" colspan="1"
                                        aria-label="Gambar: activate to sort column ascending">Gambar
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="produk_table" rowspan="1" colspan="1"
                                        aria-label="Action: activate to sort column ascending" style="display: none;">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produk as $prod)
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
                                        <td tabindex="0" class="sorting_1">{{ $prod->nama_produk }}</td>
                                        <td tabindex="0" class="sorting_1">{{ $prod->kategori->nama_kategori }}</td>
                                        <td>
                                            <div class="row text-center">
                                                <div class="col">
                                                    <img src="{{ asset('/img/produk/small/'.$prod->gambar) }}" alt="Preview Gambar Produk">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row text-center">
                                                <div class="col-4">
                                                    <a href="{{ url('/administrator/produk/detail/'.$prod->id) }}" ><i class="fas fa-edit"></i>Detail</a>
                                                </div>
                                                <div class="col-4">
                                                    <a href="{{ url('/administrator/produk/edit/'.$prod->id) }}" ><i class="fas fa-edit"></i>Ubah</a>
                                                </div>
                                                <div class="col-4">
                                                    <a href="" data-nama="{{ $prod->nama_produk }}" data-href="{{ url('/administrator/produk/del') }}" data-id="{{ $prod->id }}" data-toggle="modal" data-target="#modal-delete-produk"><i class="fas fa-trash-alt"></i>Hapus</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">No.</th>
                                    <th rowspan="1" colspan="1">Nama Produk</th>
                                    <th rowspan="1" colspan="1">Kategori</th>
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
    <div class="modal fade" id="modal-delete-produk" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda serius ingin menghapus produk yang bernama "<span id="nama"></span>" ?</p>
                <p><b>Data yg terhapus tidak bisa dikembalikan lagi!</b></p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <form id="delete-form-produk" action="" method="post">
                    @csrf
                    <input id="produk-id" type="hidden" name="prod_id">
                    <button type="submit" id="hapus-produk-button" class="btn btn-danger">Hapus</button>
                </form>
            </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
TEST
@endsection

@section('script')
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $(function () {
            $("#produk_table").DataTable({
                "responsive": true,
                "autoWidth": false,
                "searching": false,
                "paging": false,
            });

        });
        var classadmin = document.getElementById("admin_tab");
        classadmin.classList.add("menu-open");
        var classkat = document.getElementById("produk");
        classkat.classList.add("active");

    // Modal Delete
        $('#modal-delete-produk').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var nama = button.data('nama');
            var href = button.data('href');
            var id = button.data('id');
            var modal = $(this);
            modal.find('.modal-title').text('Hapus Data Produk');
            document.getElementById("nama").innerHTML = nama;
            document.getElementById('produk-id').value = id;
            document.getElementById('delete-form-produk').action = href;
        });

    </script>
@endsection
