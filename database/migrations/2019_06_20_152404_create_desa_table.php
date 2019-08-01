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
            [
                'nama_desa' => 'LEBAKHARJO',
                'kecamatan_id' => 1,
            ],
            [
                'nama_desa' => 'MULYOASRI',
                'kecamatan_id' => 1,
            ],
            [
                'nama_desa' => 'BANDUNGREJO',
                'kecamatan_id' => 2,
            ],
            [
                'nama_desa' => 'BANTUR',
                'kecamatan_id' => 2,
            ],
            [
                'nama_desa' => 'BAKALAN',
                'kecamatan_id' => 3,
            ],
            [
                'nama_desa' => 'BULULAWANG',
                'kecamatan_id' => 3,
            ],
            [
                'nama_desa' => 'AMADANOM',
                'kecamatan_id' => 4,
            ],
            [
                'nama_desa' => 'BATURETNO',
                'kecamatan_id' => 4,
            ],
            [
                'nama_desa' => 'GADINGKULON',
                'kecamatan_id' => 5,
            ],
            [
                'nama_desa' => 'KALISONGO',
                'kecamatan_id' => 5,
            ],
            [
                'nama_desa' => 'BANJAREJO',
                'kecamatan_id' => 6,
            ],
            [
                'nama_desa' => 'GAJAHREJO',
                'kecamatan_id' => 7,
            ],
            [
                'nama_desa' => 'BULUPITU',
                'kecamatan_id' => 8,
            ],
            [
                'nama_desa' => 'ARGOSARI',
                'kecamatan_id' => 9,
            ],
            [
                'nama_desa' => 'ARJOSARI',
                'kecamatan_id' => 10,
            ],
            [
                'nama_desa' => 'AMPELDENTO',
                'kecamatan_id' => 11,
            ],
            [
                'nama_desa' => 'BAYEM',
                'kecamatan_id' => 12,
            ],
            [
                'nama_desa' => 'ARDIREJO',
                'kecamatan_id' => 13,
            ],
            [
                'nama_desa' => 'JAMBUWER',
                'kecamatan_id' => 14,
            ],
            [
                'nama_desa' => 'BEDALI',
                'kecamatan_id' => 15,
            ],
            [
                'nama_desa' => 'BABADAN',
                'kecamatan_id' => 16,
            ],
            [
                'nama_desa' => 'BANJAREJO',
                'kecamatan_id' => 17,
            ],
            [
                'nama_desa' => 'GAMPINGAN',
                'kecamatan_id' => 18,
            ],
            [
                'nama_desa' => 'BALEARJO',
                'kecamatan_id' => 19,
            ],
            [
                'nama_desa' => 'AMPELDENTO',
                'kecamatan_id' => 20,
            ],
            [
                'nama_desa' => 'GENENGAN',
                'kecamatan_id' => 21,
            ],
            [
                'nama_desa' => 'ARGOSUKO',
                'kecamatan_id' => 22,
            ],
            [
                'nama_desa' => 'BENDOSARI',
                'kecamatan_id' => 23,
            ],
            [
                'nama_desa' => 'ARDIMULYO',
                'kecamatan_id' => 24,
            ],
            [
                'nama_desa' => 'JATIGUWI',
                'kecamatan_id' => 25,
            ],
            [
                'nama_desa' => 'ARGOTIRTO',
                'kecamatan_id' => 26,
            ],
            [
                'nama_desa' => 'GUNUNGRONGGO',
                'kecamatan_id' => 27,
            ],
            [
                'nama_desa' => 'AMPELGADING',
                'kecamatan_id' => 28,
            ],
            [
                'nama_desa' => 'BENJOR',
                'kecamatan_id' => 29,
            ],
            [
                'nama_desa' => 'GEDOG KULON',
                'kecamatan_id' => 30,
            ],
            [
                'nama_desa' => 'DALISODO',
                'kecamatan_id' => 31,
            ],
            [
                'nama_desa' => 'BAMBANG',
                'kecamatan_id' => 32,
            ],
            [
                'nama_desa' => 'BANGELAN',
                'kecamatan_id' => 33,
            ],

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
