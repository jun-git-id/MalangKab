<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\KegiatanUsaha;
class CreateKegiatanUsahaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan_usahas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kegiatan_usaha');
            $table -> timestamps();

        });
        KegiatanUsaha::insert([
            'nama_kegiatan_usaha' => 'Toko Kelontong'
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiatan_usahas');
    }
}
