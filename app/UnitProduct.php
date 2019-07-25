<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitProduct extends Model
{
    protected $fillable = [
        'unit_product',
    ];
    public function unit(){
        return $this->hasMany(Product::class,'unit_product_id','id');
    }
}
