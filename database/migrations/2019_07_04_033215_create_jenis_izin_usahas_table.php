<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisIzinUsahasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_izin_usahas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis_izin_usaha');
            $table -> timestamps();

        });

        \App\JenisIzinUsaha::insert([
            'jenis_izin_usaha' => 'NIB'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_izin_usahas');
    }
}
