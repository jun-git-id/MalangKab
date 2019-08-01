<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikeUsaha extends Model
{
    protected $fillable = ['tempat_usaha_id','liked_by'];
    public function likeUsaha(){
        return $this->belongsTo(TempatUsaha::class,'tempat_usaha_id','id');
    }
}
