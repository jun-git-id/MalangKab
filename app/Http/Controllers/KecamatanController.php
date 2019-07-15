<?php

namespace App\Http\Controllers;

use App\Http\Resources\KecamatanResource;
use App\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function index(){
        $kecamatan = Kecamatan::all();
        return view('tempatUsaha.inputUsaha',compact('kecamatan'));
    }

}
