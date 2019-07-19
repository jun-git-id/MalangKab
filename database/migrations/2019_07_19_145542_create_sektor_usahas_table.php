<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSektorUsahasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sektor_usahas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_sektor_usaha');
        });
        \App\SektorUsaha::insert([
            'nama_sektor_usaha' => 'pertanian'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sektor_usahas');
    }
}
