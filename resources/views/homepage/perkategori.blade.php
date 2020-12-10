@extends('homepage.layouts.master')

@section('title')
Detail Kategori
@endsection

@section('body')
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>{{$kategori->nama_kategori}}</h2>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col">
                                <div class="filter__found">
                                    <h6><span>{{$total_p}}</span> Products found</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($produk as $prod)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{ asset('img/produk/'.$prod->gambar) }}">
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text">
                                        <h6><a href="{{ url('/produk'.'/'.$prod->id) }}">{{ $prod->nama_produk }}</a></h6>
                                        <h5>{{ $prod->harga }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
