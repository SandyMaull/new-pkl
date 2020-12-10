@extends('admin.layouts.master')

@section('title')
    Admin - Tambah Produk
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambah Produk</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/administrator') }}">Admin Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/administrator/produk/') }}">Seluruh Produk</a></li>
                        <li class="breadcrumb-item active">Tambah Produk</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('body')
    <form action="{{ url('/administrator/produk/add_post') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card card-default">
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group row">
                    <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_prod" class="form-control" id="nama_produk" placeholder="Nama Produk">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="desc_sing_produk" class="col-sm-2 col-form-label">Deskripsi Singkat</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="desc_sing_prod" rows="3" id="desc_sing_produk" placeholder="Deskripsi Singkat"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="desc_produk" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="desc_prod" rows="3" id="desc_produk" placeholder="Deskripsi"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gambar_produk" class="col-sm-2 col-form-label">Gambar Produk</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" name="gambar_prod" class="custom-file-input" id="gambar_produk" accept="image/png, image/jpeg, images/jpg">
                            <label class="custom-file-label form-control" id="gambar_produk_label" for="gambar_produk">Choose file</label>
                            <small>Disarankan mengupload resolusi image 270x270 px</small><br>
                            <small>Max Size Upload: 4Mb</small>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga_produk" class="col-sm-2 col-form-label">Harga Produk</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">RP.</span>
                            </div>
                            <input id="harga_produk" name="hrg_prod" type="number" class="form-control">
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="discount_produk" class="col-sm-2 col-form-label">Discount Produk</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input id="discount_produk" name="disc_prod" type="number" class="form-control" step=".01">
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                        <small>Format: 0.0, contoh: 0.5</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="berat_produk" class="col-sm-2 col-form-label">Berat Produk</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input id="berat_produk" name="berat_prod" type="number" class="form-control">
                            <div class="input-group-append">
                                <span class="input-group-text">gram</span>
                            </div>
                        </div>
                        <small>Format berat dalam bentuk gram</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stock_produk" class="col-sm-2 col-form-label">Stok Produk</label>
                    <div class="col-sm-10">
                        <input type="number" name="stok_prod" class="form-control" id="stock_produk">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kategori_produk" class="col-sm-2 col-form-label">Kategori Produk</label>
                    <div class="col-sm-10">
                        {{-- <input type="number" nama="stok_prod" class="form-control" id="kategori_produk"> --}}
                        <select name="kat_prod" class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                            <option selected="selected" disabled="disabled">Pilih Kategori</option>
                            @foreach ($kategori as $kat)
                                <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            <!-- /.row -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ url('/administrator/produk') }}" class="btn btn-default">Kembali</a>
                <button type="submit" class="btn btn-info float-right">Tambah</button>
            </div>
        </div>
    </form>

@endsection

@section('script')
    <script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        var classadmin = document.getElementById("admin_tab");
        classadmin.classList.add("menu-open");
        var classkat = document.getElementById("produk");
        classkat.classList.add("active");

        $(function () {
            // Initialize Select2 Elements
            $('.select2bs4').select2({
            theme: 'bootstrap4'
            });
            $('#gambar_produk').change(function(e){
                if($('#gambar_produk')[0].files){
                    var numFiles = $('#gambar_produk')[0].files
                    var strings = numFiles[0].name;
                    var res = strings.slice(0, 40)+" ...";
                    document.getElementById('gambar_produk_label').innerText = res;
                }
            });
        })
    </script>
@endsection
