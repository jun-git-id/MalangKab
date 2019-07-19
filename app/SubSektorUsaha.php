<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubSektorUsaha extends Model
{
    protected $fillable = [
      'sub_sektor_usaha','id_sektor_usaha'
    ];
    public function tempatUsaha(){
        return $this->hasMany(TempatUsaha::class);
    }
}
