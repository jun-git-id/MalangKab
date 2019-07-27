<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    public function index(){
        $kecamatan = Kecamatan::all();

        return view('admin.adminDesa',compact('kecamatan'));
    }
}
