<?php

namespace App\Http\Controllers;

use App\Desa;
use App\IzinUsaha;
use App\JenisInvestasi;
use App\JenisIzinUsaha;
use App\KategoriUsaha;
use App\Kecamatan;
use App\KegiatanUsaha;
use App\Product;
use App\SektorUsaha;
use App\StatusKepemilikan;
use App\SubSektorUsaha;
use App\TempatUsaha;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
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
        $this->middleware('auth', ['except' => ['index','show']]);
    }

    public function index(Request $request)
    {
        $tempatusaha = TempatUsaha::all()->where('status', '=', 'Approve');
        $kecamatan = Kecamatan::all();
        $sektor = SektorUsaha::all();
        $keywords = $request->get('keywords');



        $kecamatan_id = $request->get('kecamatan');
        $desa_id = $request->get('desa');
        $sektor_id = $request->get('sektor');

        if ($kecamatan_id && $desa_id && $sektor_id){
            $tempatusaha = TempatUsaha::where([
                ['status', '=', 'Approve'],
                ['kecamatan_id', '=', $kecamatan_id],
                ['desa_id','=',$desa_id],
                ['sektor_usaha_id','=',$sektor_id],
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
        }elseif($sektor_id){
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
        return view('TempatUsaha', compact('tempatusaha','kecamatan','sektor'));
    }

    public function tempatUsahaSaya()
    {
        $tempatusaha = TempatUsaha::where('user_id', '=', Auth::user()->id)->get();

        return view('tempatUsaha.usahaSaya', compact('tempatusaha'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = Kecamatan::all();
        $desa = Desa::all();
        $kategoriUsaha = KategoriUsaha::all();
        $kategoriUsahaId = KategoriUsaha::get('id');
        $sektorUsaha = SektorUsaha::all();
        $subSektor = SubSektorUsaha::all();
        $kegiatanUsaha = KegiatanUsaha::all();
        $statusKepemilikan = StatusKepemilikan::all();
        $jenisInvestasi = JenisInvestasi::all();
        $jenisIzinUsaha = JenisIzinUsaha::all();
        return view('tempatUsaha.inputUsaha', compact('kecamatan', 'desa', 'kategoriUsaha','sektorUsaha', 'subSektor', 'kegiatanUsaha',
            'statusKepemilikan', 'jenisInvestasi', 'jenisIzinUsaha'));
    }

    public function filterKecamatan(Request $request)
    {
        $kecamatan_id = $request->get('kecamatan_id');

        $tempatusaha = TempatUsaha::where([
            ['status', '=', 'Approve'],
            ['kecamatan_id', '=', $kecamatan_id],
        ])->get();

        return view('TempatUsaha', compact('tempatusaha'));

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

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
            'desa_id' => $request->desa,
            'user_id' => Auth::user()->id,
            'kategori_usaha_id' => $request->kategori_usaha,
            'sektor_usaha_id' => $request->sektor_usaha,
            'sub_sektor_usaha_id' => $request->sub_sektor_usaha,
            'kegiatan_usaha_id' => $request->kegiatan_usaha,
            'status_kepemilikan_id' => $request->status_kepemilikan,
            'jenis_investasi_id' => $request->jenis_investasi,
            'nominal_investasi' => $request->nominal_investasi,
            'status' => 2,

        ]);
        $no_izin_usaha = $request->no_izin_usaha;
        $id_jenis_izin_usaha = $request->get('id_jenis_izin_usaha');
        $tgl_izin_berakhir = $request->get('tgl_izin_berakhir');
        for ($count = 0; $count < count($no_izin_usaha); $count++) {
            $data = array(
                'id_jenis_izin_usaha' => $id_jenis_izin_usaha[$count],
                'id_tempat_usaha' => $tempatUsaha->id,
                'no_izin_usaha' => $no_izin_usaha[$count],
                'tgl_izin_berakhir' => $tgl_izin_berakhir[$count],
            );
            $insert_data[] = $data;
        }

        IzinUsaha::insert($insert_data);


        return redirect('/tempat-usaha-saya');

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
        $products = Product::where('tempat_usaha_id','=', $tempatusaha->id)->paginate(4);
        return view('tempatUsaha.detailusaha', compact('tempatusaha','products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\TempatUsaha $tempatUsaha
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tempatusaha = TempatUsaha::findOrFail($id);
        $kecamatan = Kecamatan::all();
        $desa = Desa::all();
        $kategoriUsaha = KategoriUsaha::all();
        $sektorUsaha = SektorUsaha::all();
        $subSektor = SubSektorUsaha::all();
        $kegiatanUsaha = KegiatanUsaha::all();
        $statusKepemilikan = StatusKepemilikan::all();
        $jenisInvestasi = JenisInvestasi::all();
        $jenisIzinUsaha = JenisIzinUsaha::all();
        $izinusaha = IzinUsaha::all()->where('id_tempat_usaha', '=', $id);
        return view('tempatUsaha.editUsaha', compact('tempatusaha', 'izinusaha', 'kecamatan', 'desa', 'kategoriUsaha','sektorUsaha', 'subSektor', 'kegiatanUsaha',
            'statusKepemilikan', 'jenisInvestasi', 'jenisIzinUsaha'));
    }


    public function update(Request $request, $id)
    {
        $tempatUsaha = TempatUsaha::findOrFail($id);
        $tempatUsaha->nama_tempat = $request->nama_tempat;

        $tempatUsaha->alamat = $request->alamat;
        $tempatUsaha->no_telp = $request->no_telp;
        $tempatUsaha->deskripsi = $request->deskripsi;
        $tempatUsaha->lokasi = $request->lokasi;
        $tempatUsaha->lokasi_lat = $request->lokasi_lat;
        $tempatUsaha->lokasi_lang = $request->lokasi_lang;
        $tempatUsaha->kecamatan_id = $request->kecamatan;
        $tempatUsaha->desa_id = $request->desa;
        $tempatUsaha->user_id = Auth::user()->id;
        $tempatUsaha->kategori_usaha_id = $request->kategori_usaha;
        $tempatUsaha->sektor_usaha_id = $request->sektor_usaha;
        $tempatUsaha->sub_sektor_usaha_id = $request->sub_sektor_usaha;
        $tempatUsaha->kegiatan_usaha_id = $request->kegiatan_usaha;
        $tempatUsaha->status_kepemilikan_id = $request->status_kepemilikan;
        $tempatUsaha->jenis_investasi_id = $request->jenis_investasi;
        $tempatUsaha->nominal_investasi = $request->nominal_investasi;
        $tempatUsaha->status = 2;
        if ($request->hasFile('foto_tempat')) {
            $img = $request->file('foto_tempat');
            $filename = uniqid() . '.' . $img->getClientOriginalName();
            $photo = Storage::disk('public')->putFileAs('tempat_usaha', $img, $filename);
            Storage::delete('public/' . $tempatUsaha->photo);
            $tempatUsaha->foto_tempat_usaha = $photo;


        }
        $tempatUsaha->save();


        foreach ($request->no_izin_usaha as $i => $noIzinUsaha) {
            if (isset($request['id_izin_usaha'][$i])) {
                $exist = IzinUsaha::where('id', $request['id_izin_usaha'][$i])->first();
                $exist->update([
                    'id_jenis_izin_usaha' => $request['id_jenis_izin_usaha'][$i],
                    'no_izin_usaha' => $noIzinUsaha,
                    'tgl_izin_berakhir' => $request['tgl_izin_berakhir'][$i]
                ]);
            } else {
                IzinUsaha::create([
                    'id_tempat_usaha' => $tempatUsaha['id'],
                    'id_jenis_izin_usaha' => $request['id_jenis_izin_usaha'][$i],
                    'no_izin_usaha' => $noIzinUsaha,
                    'tgl_izin_berakhir' => $request['tgl_izin_berakhir'][$i]
                ]);
            }
        }


        return redirect('/tempat-usaha-saya')->with('status', 'Tempat Usaha successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\TempatUsaha $tempatUsaha
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tempatUsaha = TempatUsaha::findOrFail($id);
        $izinusaha = IzinUsaha::where('id_tempat_usaha', '=', $id)->get();
        foreach ($izinusaha as $i) {
            $i->delete();
        }
        Storage::delete('public/' . $tempatUsaha->foto_tempat_usaha);
        $tempatUsaha->delete();


        return route('tempatusaha.index');
    }
}
