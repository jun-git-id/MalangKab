<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeProduct extends Model
{
    protected $fillable = ['product_id','liked_by'];

    public function likeProduct(){
        return $this->belongsTo(Product::class,'product_id','id');

    }
}
