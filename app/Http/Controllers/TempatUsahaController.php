<?php

namespace App\Http\Controllers;

use App\IzinUsaha;
use App\JenisIzinUsaha;
use App\TempatUsaha;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


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
        return view('inputUsaha');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_tempat' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'username' => ['required','string','unique:users'],
            'nik' => ['required','string','unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
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

        TempatUsaha::create([
            'nama_tempat' => $request->nama_tempat,
            'foto_tempat_usaha' => $photo,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'deskripsi' => $request->deskripsi,
            'koordinat_lokasi' => $request->koordinat_lokasi,
            'kecamatan_id' => $request->kecamatan,
//            'izin_usaha_id' => $izinUsaha->tempatUsaha->id,
            'desa_id' => $request->desa,
            'user_id'=>Auth::user()->id,
            'kategori_usaha_id' => $request->kategori_usaha,
            'kegiatan_usaha_id' => $request->kegiatan_usaha,
            'status_kepemilikan_id' => $request->status_kepemilikan,
            'jenis_investasi_id' => $request->jenis_investasi,
            'status' => 2,

        ]);
//        $date = new Carbon();
//        $inputDate = $request->tgl_izin_berkhir;
        IzinUsaha::create([
            'no_izin_usaha' => $request->no_izin_usaha,
            'id_jenis_izin_usaha' => $request->get('id_jenis_izin_usaha'),
            'tgl_izin_berakhir' => $request->get('tgl_izin_berakhir'),
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
    public function show($id)
    {
        $tempatusaha = TempatUsaha::findOrFail($id);
        return view('detailusaha',compact('tempatusaha'));
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
