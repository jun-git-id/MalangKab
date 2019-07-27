<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisInvestasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_investasis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis_investasi');
            $table -> timestamps();

        });
        \App\JenisInvestasi::insert([
           'jenis_investasi' => 'Pribadi'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_investasis');
    }
}
