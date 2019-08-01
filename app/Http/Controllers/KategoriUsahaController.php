<?php

namespace App\Http\Controllers;

use App\KategoriUsaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class KategoriUsahaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index(Request $request)
    {
        if (Auth::user()->id == 2 || Auth::user()->id == 1) {
            $kategori = KategoriUsaha::where('id', '=', $request->id)->first();

            if ($request->ajax()) {

                $data = KategoriUsaha::latest()->get();

                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {

                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-xs dataTable"><i class="fas fa-pencil-alt mr-2"></i>Ubah</a>';

                        $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="delete btn btn-danger btn-xs dataTable"><i class="fas fa-trash-alt mr-2"></i>Hapus</a>';

                        return $btn;

                    })
                    ->rawColumns(['action'])
                    ->make(true);

            }

            return view('admin.adminKategoriUsaha', compact('kategori'));
        } else {
            return view('notfound');
        }

    }

    public function store(Request $request)
    {
        $kategoriId = $request->id;
        if ($kategoriId) {
            $kategori = KategoriUsaha::findOrFail($kategoriId);
            $kategori->nama_kategori_usaha = $request->nama_kategori_usaha;
            $kategori->color = $request->warna;

            $kategori->save();
        } else {
            $kategori = KategoriUsaha::create([
                'nama_kategori_usaha' => $request->nama_kategori_usaha,
                'color' => $request->warna,
            ]);
        }

        return response()->json($kategori);

    }

//    public function readItem(){
//        $kecamatan = Kecamatan::all ();
//        return view ( 'admin.adminKecamatan' ,compact('kecamatan'));
//    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $kategori = KategoriUsaha::where($where)->first();

        return response()->json($kategori);

    }

    public function update()
    {

    }

    public function destroy($id)
    {
        $kategori = KategoriUsaha::where('id', $id)->delete();
        return response()->json($kategori);


    }
}
