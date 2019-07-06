<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'harga',
        'stok',
        'foto',
        'jenis_produk_id',
        'tempat_usaha_id',
        'like',
        'rating', 'views'];
}
