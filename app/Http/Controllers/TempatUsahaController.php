<?php

namespace App\Http\Controllers;

use App\IzinUsaha;
use App\TempatUsaha;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class TempatUsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);


    }
    public function index()
    {
        $tempatusaha = TempatUsaha::all();

        return view('beranda', compact('tempatusaha'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $img = $request->file('foto_tempat');
        $filename = uniqid() . '.' . $img->getClientOriginalName();
        $photo = Storage::disk('public')->putFileAs('tempat_usaha', $img, $filename);
        $izinUsaha = new IzinUsaha();
        TempatUsaha::create([
            'nama_tempat' => $request->nama_tempat,
            'foto_tempat_usaha' => $photo,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'deskripsi' => $request->deskripsi,
            'koordinat_lokasi' => $request->koordinat_lokasi,
            'kecamatan_id' => $request->kecamatan,
            'izin_usaha_id' => $izinUsaha->tempatUsaha->id,
            'desa_id' => $request->desa,
            'user_id'=>Auth::user()->id,
            'kategori_usaha_id' => $request->kategori_usaha,
            'kegiatan_usaha_id' => $request->kegiatan_usaha,
            'status_kepemilikan_id' => $request->status_kepemilikan,
            'jenis_investasi_id' => $request->jenis_investasi,
            'status' => 2,

        ]);
        IzinUsaha::create([
            'no_izin_usaha' => $request->no_izin_usaha,
            'jenis_izin_usaha_id' => $request->jenis_izin_usaha,
            'tgl_izin_berakhir' => $request->tgl_izin_berkhir,
        ]);
//        return redirect()->back();
        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TempatUsaha  $tempatUsaha
     * @return \Illuminate\Http\Response
     */
    public function show(TempatUsaha $tempatUsaha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TempatUsaha  $tempatUsaha
     * @return \Illuminate\Http\Response
     */
    public function edit(TempatUsaha $tempatUsaha)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TempatUsaha  $tempatUsaha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TempatUsaha $tempatUsaha)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TempatUsaha  $tempatUsaha
     * @return \Illuminate\Http\Response
     */
    public function destroy(TempatUsaha $tempatUsaha)
    {
        //
    }
}
