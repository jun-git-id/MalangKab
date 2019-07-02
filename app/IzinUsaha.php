<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IzinUsaha extends Model
{
    protected $fillable = [
        'no_izin_usaha','tgl_izin_berakhir',
    ];

    public function tempatUsaha()
    {
        return $this->hasOne(TempatUsaha::class);
    }
}
