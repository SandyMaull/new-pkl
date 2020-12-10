@extends('homepage.layouts.master')

@section('title')
    Homepage
@endsection

@section('body')
    <!-- Categories Section -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <!-- 4x3 -->
                    @foreach ($kategori as $kat)
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="{{ asset('img/kategori/'.$kat->gambar) }}">
                                <h5><a href="{{ url('/kategori'.'/'.$kat->id) }}">{{ $kat->nama_kategori }}</a></h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section END -->

    <!-- Featured Section -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Products</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach ($produk as $prd)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="{{ asset('img/produk/'.$prd->gambar) }}">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="{{ url('/produk'.'/'.$prd->id) }}">{{ $prd->nama_produk }}</a></h6>
                                <h5>RP. {{$prd->harga}}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Featured Section END -->

    <!-- Banner -->
    <div class="banner">
        <div class="container">
            <div class="row">
                @foreach ($banner as $bn)
                    @if ($bn->tipe == 'Banner Bawah Kanan' || $bn->tipe == 'Banner Bawah Kiri')
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="banner__pic">
                                <img src="{{ asset('img/banner/'.$bn->gambar) }}" alt="">
                            </div>
                        </div>
                    @endif
                @endforeach
                {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ asset('ogani/img/banner/banner-2.jpg') }}" alt="">
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <br>
    <!-- Banner END -->
@endsection
