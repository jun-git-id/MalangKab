<?php

namespace App\Http\Controllers;

use App\Desa;
use App\Kecamatan;
use App\Product;
use App\TempatUsaha;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

        if (Auth::user()->role_id == 2 ||  Auth::user()->role_id == 1){
            $product = Product::all();
            $kecamatan = Kecamatan::all();
            $desa = Desa::all();
            $users = User::all();
            $tempatusaha = TempatUsaha::all();
            $currYear = Carbon::now()->year;
            $usahaCurrMonth = TempatUsaha::whereYear('created_at','=',$currYear)->get();
            foreach ($kecamatan as $key => $item){
                $usahaByKec[$key] = $usahaCurrMonth->first()->where('kecamatan_id','=',$item->id)->get();
            }
            $usahaJan = $usahaCurrMonth->first()->whereMonth('created_at','=','01')->get();
            $usahaFeb = $usahaCurrMonth->first()->whereMonth('created_at','=','02')->get();
            $usahaMar = $usahaCurrMonth->first()->whereMonth('created_at','=','03')->get();
            $usahaApr = $usahaCurrMonth->first()->whereMonth('created_at','=','04')->get();
            $usahaMei = $usahaCurrMonth->first()->whereMonth('created_at','=','05')->get();
            $usahaJun = $usahaCurrMonth->first()->whereMonth('created_at','=','06')->get();
            $usahaJul = $usahaCurrMonth->first()->whereMonth('created_at','=','07')->get();
            $usahaAug = $usahaCurrMonth->first()->whereMonth('created_at','=','08')->get();
            $usahaSep = $usahaCurrMonth->first()->whereMonth('created_at','=','09')->get();
            $usahaOkt = $usahaCurrMonth->first()->whereMonth('created_at','=','10')->get();
            $usahaNov = $usahaCurrMonth->first()->whereMonth('created_at','=','11')->get();
            $usahaDes = $usahaCurrMonth->first()->whereMonth('created_at','=','12')->get();



            if (!$tempatusaha || !$product){
                $tempatusaha = 0;
                $product = 0;
            }
            return view('admin.dashboard',compact('tempatusaha','product','kecamatan','desa','users','usahaJun','usahaJan',
                'usahaFeb','usahaMar','usahaMei','usahaJul','usahaApr','usahaAug','usahaSep','usahaOkt','usahaDes','usahaNov','usahaByKec'));
        }else {
            return view('notfound');

        }



    }
}
