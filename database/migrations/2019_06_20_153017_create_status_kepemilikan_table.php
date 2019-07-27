<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusKepemilikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_kepemilikans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status_kepemilikan');
            $table -> timestamps();

        });
        \App\StatusKepemilikan::insert([
            'status_kepemilikan' => 'Pribadi'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_kepemilikans');
    }
}
