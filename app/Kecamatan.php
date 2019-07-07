<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $fillable = [
        'nama_kecamatan'
    ];

    public function tempatUsaha(){
        return $this->hasMany(TempatUsaha::class);
    }
}
