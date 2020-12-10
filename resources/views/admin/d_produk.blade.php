@extends('admin.layouts.master')

@section('title')
    Admin - Detail Produk
@endsection

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}"> --}}
@endsection

@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail Produk {{ $produk->nama_produk }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/administrator') }}">Admin Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/administrator/produk/') }}">Seluruh Produk</a></li>
                        <li class="breadcrumb-item active">Detail Produk</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('body')
    <div class="card card-default">
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-group row">
                <p class="col-sm-2 col-form-label">Nama Produk</p>
                <div class="col-sm-10">
                    <p class="form-control">{{ $produk->nama_produk }}</p>
                </div>
            </div>
            <div class="form-group row">
                <p class="col-sm-2 col-form-label">Deskripsi Singkat</p>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" placeholder="Deskripsi Singkat" disabled>{{ $produk->deskripsi_singkat }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <p class="col-sm-2 col-form-label">Deskripsi</p>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" placeholder="Deskripsi" disabled>{{ $produk->deskripsi }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <p class="col-sm-2 col-form-label">Harga</p>
                <div class="col-sm-10">
                    <p class="form-control">{{ $produk->harga }}</p>
                </div>
            </div>
            <div class="form-group row">
                <p class="col-sm-2 col-form-label">Discount</p>
                <div class="col-sm-10">
                    <p class="form-control">{{ $produk->discount }}</p>
                </div>
            </div>
            <div class="form-group row">
                <p class="col-sm-2 col-form-label">Berat</p>
                <div class="col-sm-10">
                    <p class="form-control">{{ $produk->berat }}</p>
                </div>
            </div>
            <div class="form-group row">
                <p class="col-sm-2 col-form-label">Stock</p>
                <div class="col-sm-10">
                    <p class="form-control">{{ $produk->stok }}</p>
                </div>
            </div>
            <div class="form-group row">
                <p class="col-sm-2 col-form-label">Kategori</p>
                <div class="col-sm-10">
                    <p class="form-control">{{ $produk->kategori->nama_kategori }}</p>
                </div>
            </div>
            <div class="form-group row">
                <p class="col-sm-2 col-form-label">Gambar</p>
                <div class="col-sm-10">
                    <img src="{{ asset('/img/produk/'.$produk->gambar) }}" alt="Gambar Produk">
                </div>
            </div>
        <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a href="{{ url('/administrator/produk') }}" class="btn btn-default">Kembali</a>
            <a href="{{ url('/administrator/produk/edit/'.$produk->id) }}" class="btn btn-info float-right">Edit</a>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        var classadmin = document.getElementById("admin_tab");
        classadmin.classList.add("menu-open");
        var classkat = document.getElementById("produk");
        classkat.classList.add("active");

        $(function () {
            //Initialize Select2 Elements
            // $('.select2').select2()

            //Initialize Select2 Elements
            // $('.select2bs4').select2({
            // theme: 'bootstrap4'
            // })
        })
    </script>
@endsection
