<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_produk');
            $table->string('deskripsi');
            $table->integer('harga');
            $table->integer('stok');
            $table->string('foto');
            $table->unsignedInteger('jenis_produk_id');
            $table->unsignedInteger('kategori_usaha_id');
            $table->integer('like');
            $table->double('rating');
            $table->integer('views');
            $table->timestamps();

            $table->foreign('jenis_produk_id')->references('id')->on('jenis_produks');
            $table->foreign('kategori_usaha_id')->references('id')->on('kategori_usahas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
}
