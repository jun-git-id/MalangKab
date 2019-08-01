<?php

namespace App\Http\Controllers;

use App\JenisProduk;
use App\Product;
use App\TempatUsaha;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $products = Product::with(['provider'])->select('*')->whereIn('tempat_usaha_id',function ($query){
            $query->select('id')->from('tempat_usahas')->where([
                ['status', '=', 'Approve']]);
        })->paginate(4);
        $tempatusaha = TempatUsaha::with('kategoriUsaha')->where('status','=','Approve')->paginate(4);

        return view('beranda', compact(['tempatusaha','products']));
    }
    public function like($id){
        $product = Product::findOrFail($id);
        $product->like++;
        $product->save();

        return redirect()->back();
    }
//    public function kategori(){
//        $kategoriProduk = JenisProduk::all();
//
//        return view('layouts.app',compact('kategoriProduk'));
//    }
}
