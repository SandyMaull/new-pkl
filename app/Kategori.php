<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'tb_kategori';
    protected $fillable = [
        'nama_kategori', 'gambar', 'slug', 'status'
    ];

    public function produk(){
        return $this->hasMany('App\Produk');
    }
}
