<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IzinUsaha extends Model
{
    protected $fillable = [
        'no_izin_usaha','tgl_izin_berakhir','id_jenis_izin_usaha',
    ];

    public function tempatUsaha()
    {
        return $this->hasOne(TempatUsaha::class);
    }
}
