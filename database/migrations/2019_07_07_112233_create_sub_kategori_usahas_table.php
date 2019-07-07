<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubKategoriUsahasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_kategori_usahas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sub_kategori_usaha');
            $table->unsignedInteger('id_kategori_usaha');

            $table->foreign('id_kategori_usaha')->references('id')->on('kategori_usahas');
        });

        \App\SubKategoriUsaha::insert([
            'sub_kategori_usaha' => 'sub kategori 1',
            'id_kategori_usaha' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_kategori_usahas');
    }
}
