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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $products = Product::all();
        $tempatusaha = TempatUsaha::all();

        return view('beranda', compact(['products','tempatusaha']));
    }
}
