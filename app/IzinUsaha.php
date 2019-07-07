<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TempatUsaha;
use App\JenisIzinUsaha;

class IzinUsaha extends Model
{
    protected $fillable = [
        'no_izin_usaha','id_tempat_usaha','tgl_izin_berakhir','id_jenis_izin_usaha',
    ];

    public function tempatUsaha()
    {
        return $this->hasOne(TempatUsaha::class,'izin_usaha_id','id');
    }
    public function jenisIzin(){
        return $this->belongsTo(JenisIzinUsaha::class);
    }
}
