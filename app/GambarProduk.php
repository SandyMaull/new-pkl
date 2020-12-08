<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GambarProduk extends Model
{
    protected $table = 'tb_gambar_produk';
    protected $fillable = [
        'gambar', 'produk_id'
    ];

    public function produk(){
        return $this->belongsTo('App\Produk');
    }
}
