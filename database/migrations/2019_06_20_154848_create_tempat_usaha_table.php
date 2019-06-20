<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempatUsahaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempat_usaha', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_tempat');
            $table->string('alamat');
            $table->string('pemilik');
            $table->string('no_telp');
            $table->string('deskripsi');
            $table->string('no_izin_usaha');
            $table->string('foto_izin_usaha');
            $table->date('tgl_izin_berkhir');
            $table->string('koordinat_lokasi');
            $table->unsignedInteger('kecamatan_id');
            $table->unsignedInteger('desa_id');
            $table->unsignedInteger('kategori_usaha_id');
            $table->unsignedInteger('kegiatan_usaha_id');
            $table->unsignedInteger('status_kepemilikan_id');
            $table->unsignedInteger('jenis_investasi_id');
            $table->integer('like');
            $table->double('rating');
            $table->integer('views');
            $table->tinyInteger('verified');
            $table->timestamps();

            $table->foreign('kecamatan_id')->references('id')->on('kecamatan');
            $table->foreign('desa_id')->references('id')->on('desa');
            $table->foreign('kategori_usaha_id')->references('id')->on('kategori_usaha');
            $table->foreign('kegiatan_usaha_id')->references('id')->on('kegiatan_usaha');
            $table->foreign('status_kepemilikan_id')->references('id')->on('status_kepemilikan');
            $table->foreign('jenis_investasi_id')->references('id')->on('jenis_investasi');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tempat_usaha');
    }
}
