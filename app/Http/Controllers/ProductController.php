<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
//    public function index()
//    {
//        $products = Product::all();
//
//        return view('beranda', compact('products'));
//    }

    public function create()
    {
        return view('inputProduct');
    }

    public function store(Request $request)
    {
        $img = $request->file('foto');
        $filename = uniqid() . '.' . $img->getClientOriginalName();
        $photo = Storage::disk('public')->putFileAs('product', $img, $filename);

        Product::create([
            'nama_produk' => $request -> nama_produk,
            'deskripsi'  => $request -> deskripsi,
            'harga'  => $request -> harga,
            'stok'  => $request -> stok,
            'foto'  => $photo,
            'jenis_produk_id'  => $request -> jenis_produk_id,
            'tempat_usaha_id'  => $request -> tempat_usaha_id,
            'like'  => $request -> like ,
            'rating'  => $request -> rating,
            'views'  => $request -> views,

        ]);
        return redirect('/');

    }
}
