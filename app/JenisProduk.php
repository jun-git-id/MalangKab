<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisProduk extends Model
{
    protected $fillable = [
        'jenis_produk'
    ];

    public function jenis(){
        return $this->hasMany(Product::class,'jenis_produk_id','id');
    }

}
