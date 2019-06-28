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
            $table->string('nama_desa');
        });
        Desa::insert([
            'nama_desa' => 'dampit'
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
