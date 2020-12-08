<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGambarProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_gambar_produk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('gambar');
            $table->unsignedBigInteger('produk_id');
            $table->foreign('produk_id')->references('id')->on('tb_produk')->onDelete('cascade');
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
        Schema::dropIfExists('tb_gambar_produk');
    }
}
