<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikeUsahasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('like_usahas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tempat_usaha_id');
            $table->unsignedInteger('liked_by');
            $table->timestamps();

            $table->foreign('tempat_usaha_id')->references('id')->on('tempat_usahas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('like_usahas');
    }
}
