<?php

namespace App\Http\Controllers;

use App\Http\Resources\KecamatanResource;
use App\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }
    public function index(){
//        $kecamatan = Kecamatan::all();
//        return view('tempatUsaha.inputUsaha',compact('kecamatan'));
    }

    public function create(){
        return view('admin.adminKecamatan');
    }
    public function store(Request $request){
        $kecamatan  = Kecamatan::create($request->all());

        return view('admin.adminKecamatan',compact('kecamatan'));
    }
    public function edit(){

    }
    public function update(){

    }
    public function destroy(){

    }

}
