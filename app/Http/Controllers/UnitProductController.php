<?php

namespace App\Http\Controllers;

use App\UnitProduct;
use Illuminate\Http\Request;

class UnitProductController extends Controller
{
    public function index(){
        $unit = UnitProduct::all();
        return view('inputProduct',compact('unit'));
    }
}
