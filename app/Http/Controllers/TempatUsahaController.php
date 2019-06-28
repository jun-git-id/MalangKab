<?php

namespace App\Http\Controllers;

use App\TempatUsaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TempatUsahaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('createTempatUsaha');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $img = $request->file('photo');
        $filename = uniqid() . '.' . $img->getClientOriginalExtension();
        $photo = Storage::disk('public')->putFileAs('tempat_usaha', $img, $filename);
        $photoIzinUsaha = Storage::disk('public')->putFileAs('izin_usaha', $img, $filename);

        TempatUsaha::create([
            'nama_tempat' => $request->nama_tempat,
            'foto_tempat_usaha' => $photo,
            'alamat' => $request->alamat,
            'pemilik' => $request->pemilik,
            'no_telp' => $request->no_telp,
            'deskripsi' => $request->deskripsi,
            'no_izin_usaha' => $request->no_izin_usaha,
            'foto_izin_usaha' => $photoIzinUsaha,
            'tgl_izin_berkhir' => $request->tgl_izin_berkhir,
            'koordinat_lokasi' => $request->koordinat_lokasi,
            'kecamatan_id' => $request->kecamatan_id,
            'desa_id' => $request->desa_id,
            'kategori_usaha_id' => $request->kategori_usaha_id,
            'kegiatan_usaha_id' => $request->kegiatan_usaha_id,
            'status_kepemilikan_id' => $request->status_kepemilikan_id,
            'jenis_investasi_id' => $request->jenis_investasi_id,
            'status' => 2,
            'created_by'=> Auth::user()->id,
        ]);
        return redirect()->back();


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
