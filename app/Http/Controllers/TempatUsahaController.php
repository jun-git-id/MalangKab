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

//    public function index()
//    {
//        $tempatusaha = TempatUsaha::with(['user']);
//
//        return view('beranda', compact('tempatusaha'));
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tempatUsaha.inputUsaha');
    }
//    protected function validator(Request $request)
//    {
//        $validator = Validator::make($request->all(), [
//            'nama_tempat' => ['required', 'string', 'max:255'],
//            'alamat' => ['required', 'string', 'max:255'],
//            'foto_tempat_usaha' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:10000',
//            'no_telp' => ['required', 'string', 'max:12'],
//            'deskripsi' => ['required', 'string'],
//            'lokasi' => ['required', 'string', 'max:255'],
//            'kecamatan_id' => 'required|array|min:1',
//            'izin_usaha_id' => 'required|array|min:1',
//            'desa_id' => 'required|array|min:1',
//            'kategori_usaha_id' => 'required|array|min:1',
//            'kegiatan_usaha_id' => 'required|array|min:1',
//            'status_kepemilikan_id' => 'required|array|min:1',
//            'jenis_investasi_id' => 'required|array|min:1',
//            'no_izin_usaha' => 'required|array|min:1',
//            'id_jenis_izin_usaha' => 'required|array|min:1',
//            'tgl_izin_berakhir' => ['required','date'],
//        ]);
//
//        if ($validator->fails()) {
//            return redirect('/inputUsaha')
//                ->withErrors($validator)
//                ->withInput();
//        }
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $validator = Validator::make($request->all(), [
//            'nama_tempat' => ['bail','required', 'string', 'max:255'],
//            'alamat' => ['required', 'string', 'max:255'],
//            'foto_tempat_usaha' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:10000',
//            'no_telp' => ['required', 'string', 'max:12'],
//            'deskripsi' => ['required', 'string'],
//            'lokasi' => ['required', 'string', 'max:255'],
//            'kecamatan_id' => 'required|array|min:1',
//            'izin_usaha_id' => 'required|array|min:1',
//            'desa_id' => 'required|array|min:1',
//            'kategori_usaha_id' => 'required|array|min:1',
//            'kegiatan_usaha_id' => 'required|array|min:1',
//            'status_kepemilikan_id' => 'required|array|min:1',
//            'jenis_investasi_id' => 'required|array|min:1',
//            'no_izin_usaha' => 'required|unique:izin_usahas',
//            'id_jenis_izin_usaha' => 'required|array|min:1',
//            'tgl_izin_berakhir' => ['required','date'],
//        ]);
//
//        if ($validator->fails()) {
//            return redirect('/inputUsaha')
//                ->withErrors($validator)
//                ->withInput();
//        }

        $img = $request->file('foto_tempat');
        $filename = uniqid() . '.' . $img->getClientOriginalName();
        $photo = Storage::disk('public')->putFileAs('tempat_usaha', $img, $filename);

        $tempatUsaha = TempatUsaha::create([
            'nama_tempat' => $request->nama_tempat,
            'foto_tempat_usaha' => $photo,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'deskripsi' => $request->deskripsi,
            'lokasi' => $request->lokasi,
            'lokasi_lat' => $request->lokasi_lat,
            'lokasi_lang' => $request->lokasi_lang,
            'kecamatan_id' => $request->kecamatan,
//            'izin_usaha_id' => $izinUsaha->id,
            'desa_id' => $request->desa,
            'user_id' => Auth::user()->id,
            'kategori_usaha_id' => $request->kategori_usaha,
            'sub_kategori_usaha_id' => $request->sub_kategori_usaha,
            'kegiatan_usaha_id' => $request->kegiatan_usaha,
            'status_kepemilikan_id' => $request->status_kepemilikan,
            'jenis_investasi_id' => $request->jenis_investasi,
            'nominal_investasi' => $request->nominal_investasi,
            'status' => 2,

        ]);
        IzinUsaha::create([
            'no_izin_usaha' => $request->no_izin_usaha,
            'id_tempat_usaha' => $tempatUsaha -> id,
            'id_jenis_izin_usaha' => $request->get('id_jenis_izin_usaha'),
            'tgl_izin_berakhir' => $request->get('tgl_izin_berakhir'),
        ]);



        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\TempatUsaha $tempatUsaha
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tempatusaha = TempatUsaha::findOrFail($id);
        return view('tempatUsaha.detailusaha', compact('tempatusaha'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\TempatUsaha $tempatUsaha
     * @return \Illuminate\Http\Response
     */
    public function edit(TempatUsaha $tempatUsaha)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\TempatUsaha $tempatUsaha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TempatUsaha $tempatUsaha)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\TempatUsaha $tempatUsaha
     * @return \Illuminate\Http\Response
     */
    public function destroy(TempatUsaha $tempatUsaha)
    {
        //
    }
}
