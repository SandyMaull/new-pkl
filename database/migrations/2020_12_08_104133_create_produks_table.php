<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_produk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_produk');
            $table->string('slug');
            $table->text('deskripsi_singkat');
            $table->text('deskripsi');
            $table->string('video')->nullable();
            $table->string('gambar');
            $table->string('harga');
            $table->string('discount')->nullable();
            $table->string('berat');
            $table->string('stok');
            $table->boolean('status')->default(0);
            $table->boolean('preorder')->default(0);
            $table->boolean('recommended')->default(0);
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('tb_kategori')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_produk');
    }
}
