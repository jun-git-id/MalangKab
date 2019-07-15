<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_produk');
            $table->string('deskripsi');
            $table->integer('harga');
            $table->integer('stok');
            $table->unsignedInteger('unit_product_id');
            $table->unsignedInteger('jenis_produk_id');
            $table->unsignedInteger('tempat_usaha_id');
            $table->integer('like')->nullable()->default(0);
            $table->double('rating')->nullable()->default(0);
            $table->integer('views')->nullable()->default(0);
            $table->timestamps();

            $table->foreign('jenis_produk_id')->references('id')->on('jenis_produks');
            $table->foreign('tempat_usaha_id')->references('id')->on('tempat_usahas')->onDelete('cascade');
            $table->foreign('unit_product_id')->references('id')->on('unit_products');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
