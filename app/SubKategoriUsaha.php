<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubKategoriUsaha extends Model
{
    protected $fillable = [
      'sub_kategori_usaha','id_kategori_usaha'
    ];
    public function tempatUsaha(){
        return $this->hasMany(TempatUsaha::class);
    }
}
