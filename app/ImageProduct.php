<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class ImageProduct extends Model
{
    protected $table = 'image_product';

    protected $fillable = [
        'filename',
        'path',
        'size',
    ];

    public function productimage()
    {
        return $this->belongsToMany(Product::class,'product_images','image_id','product_id');
    }
}
