<?php

namespace App\Http\Controllers;

use App\Http\Resources\KecamatanResource;
use App\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KecamatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }
//    public function index(){
//
////        $kecamatan = Kecamatan::all();
////        return view('tempatUsaha.inputUsaha',compact('kecamatan'));
//    }
//
//    public function create(){
//        return view('admin.adminKecamatan');
//    }
//    public function store(Request $request){
//        $kecamatan  = Kecamatan::create($request->all());
//
//        return view('admin.adminKecamatan',compact('kecamatan'));
//    }
    public function addItem(Request $request){
        $rules = array (
            'nama_kecamatan' => 'required'
        );
        $validator = Validator::make ( Input::all (), $rules );
        if ($validator->fails ())
            return Response::json ( array (

                'errors' => $validator->getMessageBag ()->toArray ()
            ) );
        else {
            $kecamatan = new adminKecamatan ();
            $kecamatan->nama_kecamatan = $request->nama_kecamatan;
            $kecamatan->save ();
            return response ()->json ( $kecamatan );
        }
    }
    public function readItem(){
        $kecamatan = Kecamatan::all ();
        return view ( 'welcome' )->withData ( $kecamatan );
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }

}
