<?php

namespace App\Http\Controllers;

use App\Desa;
use App\Kecamatan;
use App\SektorUsaha;
use App\SubSektorUsaha;
use App\TempatUsaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MapController extends Controller
{

    public function index(Request $request){
        $tempatusaha = 0;
        $kecamatan = Kecamatan::all();
        $sektor = SektorUsaha::all();
        $subsektor = SubSektorUsaha::all();
        $keywords = $request->get('keywords');


        $kecamatan_id = $request->get('kecamatan');
        $desa_id = $request->get('desa');
        $sektor_id = $request->get('sektor');
        $subsektor_id = $request->get('subsektor');

        if ($kecamatan_id && $desa_id && $sektor_id && $subsektor_id){
            $tempatusaha = TempatUsaha::where([
                ['status', '=', 'Approve'],
                ['kecamatan_id', '=', $kecamatan_id],
                ['desa_id','=',$desa_id],
                ['sektor_usaha_id','=',$sektor_id],
                ['sub_sektor_usaha_id','=',$subsektor_id]
            ])->get();
        }elseif ($kecamatan_id && $desa_id){
            $tempatusaha = TempatUsaha::where([
                ['status', '=', 'Approve'],
                ['kecamatan_id', '=', $kecamatan_id],
                ['desa_id','=',$desa_id],
            ])->get();
        } elseif($kecamatan_id) {
            $tempatusaha = TempatUsaha::where([
                ['status', '=', 'Approve'],
                ['kecamatan_id', '=', $kecamatan_id],
            ])->get();
        }elseif ($sektor_id && $subsektor_id){
            $tempatusaha = TempatUsaha::where([
                ['status', '=', 'Approve'],
                ['sektor_usaha_id','=',$sektor_id],
                ['sub_sektor_usaha_id','=',$subsektor_id]
            ])->get();
        } elseif($sektor_id){
            $tempatusaha = TempatUsaha::where([
                ['status', '=', 'Approve'],
                ['sektor_usaha_id','=',$sektor_id],
            ])->get();
        }else{
            $tempatusaha = TempatUsaha::all()->where('status', '=', 'Approve');
        }
        if ($keywords) {
            $tempatusaha = TempatUsaha::where([
                ['status', '=', 'Approve'],
                ['nama_tempat', 'LIKE', "%$keywords%"],
            ])->get();

        }

        return view('maps', compact('tempatusaha','kecamatan','sektor','subsektor'));
    }
    public function maps(Request $request){
//
    }
    public function subSektor()
    {
        $sektor_id = Input::get('id');
        $subSektor = SubSektorUsaha::where('id_sektor_usaha', '=', $sektor_id)->get();

        return response()->json($subSektor);
    }

    public function desa()
    {
        $kecamatan_id = Input::get('id');
        $desa = Desa::where('kecamatan_id', '=', $kecamatan_id)->get();

        return response()->json($desa);
    }

}
