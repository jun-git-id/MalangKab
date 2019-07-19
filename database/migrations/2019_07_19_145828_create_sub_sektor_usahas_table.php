<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubSektorUsahasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_sektor_usahas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sub_sektor_usaha');
            $table->unsignedInteger('id_sektor_usaha');

            $table->foreign('id_sektor_usaha')->references('id')->on('sektor_usahas');
        });

        \App\SubSektorUsaha::insert([
            'sub_sektor_usaha' => 'sub sektor 1',
            'id_sektor_usaha' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_sektor_usahas');
    }
}
