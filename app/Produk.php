<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'tb_produk';
    protected $fillable = [
        'nama_produk', 'slug', 'deskripsi_singkat', 'deskripsi', 'video',
        'gambar', 'harga', 'discount', 'berat', 'stok', 'status', 'preorder',
        'recommended', 'kategori_id'
    ];

    public function gambarproduk(){
        return $this->hasMany('App\GambarProduk');
    }

    public function kategori(){
        return $this->belongsTo('App\Kategori');
    }
}
