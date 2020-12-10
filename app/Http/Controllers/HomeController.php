<?php

namespace App\Http\Controllers;

use App\Banner;
use App\GambarProduk;
use App\Kategori;
use App\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $firstbanner = Banner::where('tipe', 'Banner Utama Atas')->first();
        $banner = Banner::all();
        $produk = Produk::paginate(10);
        $kategori = Kategori::all();
        return view('homepage.index',['fbanner' => $firstbanner, 'banner' => $banner, 
        'produk' => $produk, 'kategori' => $kategori, 'allkategori' => $kategori]);
    }

    public function kategori($id)
    {
        $kategori = Kategori::where('id', $id)->first();
        $allkategori = Kategori::all();
        $produk = Produk::where('kategori_id', $id)->get();
        $total_produk = $produk->count();
        $firstbanner = Banner::where('tipe', 'Banner Utama Atas')->first();
        return view('homepage.perkategori', ['fbanner' => $firstbanner, 'kategori' => $kategori,
        'produk' => $produk, 'allkategori' => $allkategori, 'total_p' => $total_produk
        ]);
    }

    public function produk($id)
    {
        $gambar_produk = GambarProduk::where('produk_id', $id)->get();
        $produk = Produk::where('id', $id)->first();
        $allkategori = Kategori::all();
        $firstbanner = Banner::where('tipe', 'Banner Utama Atas')->first();
        return view('homepage.perproduk', ['fbanner' => $firstbanner,
        'produk' => $produk, 'allkategori' => $allkategori, 'gam_prod' => $gambar_produk
        ]);
    }

}
