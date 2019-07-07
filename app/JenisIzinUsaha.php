<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisIzinUsaha extends Model
{
    protected $fillable = [
        'jenis_izin_usaha'
    ];

    public function izinUsaha(){
        return $this->hasMany(IzinUsaha::class);
    }
}
