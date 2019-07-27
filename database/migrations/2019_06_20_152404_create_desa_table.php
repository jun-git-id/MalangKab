<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Desa;
class CreateDesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desas', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('kecamatan_id');
            $table->string('nama_desa');
            $table->timestamps();

            $table->foreign('kecamatan_id')->references('id')->on('kecamatans');
        });

        Desa::insert([
            'nama_desa' => 'dampit',
            'kecamatan_id' => 1,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desas');
    }
}
