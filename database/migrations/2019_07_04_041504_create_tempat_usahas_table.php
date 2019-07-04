<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempatUsahasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempat_usahas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_tempat');
            $table->string('foto_tempat_usaha')->nullable();
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('deskripsi');
            $table->unsignedInteger('izin_usaha_id')->nullable();
            $table->string('koordinat_lokasi');
            $table->unsignedInteger('kecamatan_id');
            $table->unsignedInteger('desa_id');
            $table->unsignedInteger('kategori_usaha_id');
            $table->unsignedInteger('kegiatan_usaha_id');
            $table->unsignedInteger('status_kepemilikan_id');
            $table->unsignedInteger('jenis_investasi_id');
            $table->unsignedInteger("user_id");
            $table->integer("updated_by")->nullable();
            $table->integer('like')->nullable()->default(0);
            $table->double('rating')->nullable()->default(0);
            $table->integer('views')->nullable()->default(0);
            $table->enum('status', ['Approve','Pending'])->default('Pending');
            $table->timestamps();

            $table->foreign('izin_usaha_id')->references('id')->on('izin_usahas');
            $table->foreign('kecamatan_id')->references('id')->on('kecamatans');
            $table->foreign('desa_id')->references('id')->on('desas');
            $table->foreign('kategori_usaha_id')->references('id')->on('kategori_usahas');
            $table->foreign('kegiatan_usaha_id')->references('id')->on('kegiatan_usahas');
            $table->foreign('status_kepemilikan_id')->references('id')->on('status_kepemilikans');
            $table->foreign('jenis_investasi_id')->references('id')->on('jenis_investasis');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tempat_usahas');
    }
}
