<?php

namespace App\Http\Controllers;

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

        $products = Product::all();
        $tempatusaha = TempatUsaha::all()->where('status','=','Approve');

        return view('beranda', compact(['tempatusaha','products']));
    }
}
