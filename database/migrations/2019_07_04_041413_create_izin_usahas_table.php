<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIzinUsahasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('izin_usahas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_izin_usaha');
            $table->unsignedInteger('id_jenis_izin_usaha');
            $table->date('tgl_izin_berakhir');
            $table->timestamps();

            $table->foreign('id_jenis_izin_usaha')->references('id')->on('jenis_izin_usahas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('izin_usahas');
    }
}
