<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Kecamatan;
class CreateKecamatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecamatans', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nama_kecamatan');
            $table -> timestamps();
        });

        Kecamatan::insert([
           ['nama_kecamatan' => 'AMPELGADING'],
            ['nama_kecamatan' =>'BANTUR'],
            ['nama_kecamatan' =>'BULULAWANG'],
            ['nama_kecamatan' =>'DAMPPIT'],
            ['nama_kecamatan' =>'DAU'],
            ['nama_kecamatan' =>'DONOMULYO'],
            ['nama_kecamatan' =>'GEDANGAN'],
            ['nama_kecamatan' =>'GONDANGLEGI'],
            ['nama_kecamatan' =>'JABUNG'],
            ['nama_kecamatan' =>'KALIPARE'],
            ['nama_kecamatan' =>'KARANGPLOSO'],
            ['nama_kecamatan' =>'KASEMBON'],
            ['nama_kecamatan' =>'KEPANJEN'],
            ['nama_kecamatan' =>'KROMENGAN'],
            ['nama_kecamatan' =>'LAWANG'],
            ['nama_kecamatan' =>'NGAJUM'],
            ['nama_kecamatan' =>'NGANTANG'],
            ['nama_kecamatan' =>'PAGAK'],
            ['nama_kecamatan' =>'PAGELARAN'],
            ['nama_kecamatan' =>'PAKIS'],
            ['nama_kecamatan' =>'PAKISAJI'],
            ['nama_kecamatan' =>'PONCOKUSOMO'],
                ['nama_kecamatan' =>'PUJON'],
            ['nama_kecamatan' =>'SINGOSARI'],
            ['nama_kecamatan' =>'SUMBERPUCUNG'],
            ['nama_kecamatan' =>'SUMBERMANING WETAN'],
            ['nama_kecamatan' =>'TAJINAN'],
            ['nama_kecamatan' =>'TIRTOYUDO'],
            ['nama_kecamatan' =>'TUMPANG'],
            ['nama_kecamatan' =>'TUREN'],
            ['nama_kecamatan' =>'WAGIR'],
            ['nama_kecamatan' =>'WAJAK'],
            ['nama_kecamatan' =>'WONOSARI'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()

    {
        Schema::dropIfExists('kecamatans');
    }
}
