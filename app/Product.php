<?php

namespace App;

use App\ImageProduct;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'harga',
        'stok',
        'unit_product_id',
        'jenis_produk_id',
        'tempat_usaha_id',
        'like',
        'rating', 'views'];

    public function productimage()
    {
        return $this->belongsToMany(ImageProduct::class,'product_images','product_id','image_id');
    }
    public function provider(){
        return $this->belongsTo(TempatUsaha::class,'tempat_usaha_id','id');
    }
    public function jenis(){
        return $this->belongsTo(JenisProduk::class,'jenis_produk_id','id');
    }
    public function unit(){
        return $this->belongsTo(UnitProduct::class,'unit_product_id','id');
    }

    public function getImageAttribute()
    {
        return ($this->productimage[0]->path . $this->productimage[0]->filename);
    }
    public function likeProduct(){
        return $this->hasMany(LikeProduct::class,'product_id','id');
    }

}
