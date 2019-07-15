<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $fillable = [
        'nama_desa'
    ];

    public function tempatUsaha(){
        return $this->hasMany(TempatUsaha::class);
    }
}
