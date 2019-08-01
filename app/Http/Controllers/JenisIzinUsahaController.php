<?php

namespace App\Http\Controllers;

use App\JenisIzinUsaha;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JenisIzinUsahaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = JenisIzinUsaha::latest()->get();

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

        return view('admin.adminJenisIzinUsaha');
    }

    public function store(Request $request)
    {

        $jenisizinId = $request->id;
        $jenisizin = JenisIzinUsaha::updateOrCreate(['id' => $jenisizinId],
            ['jenis_izin_usaha' => $request->jenis_izin_usaha]);
        return response()->json($jenisizin);

    }

//    public function readItem(){
//        $kecamatan = Kecamatan::all ();
//        return view ( 'admin.adminKecamatan' ,compact('kecamatan'));
//    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $jenisizin = JenisIzinUsaha::where($where)->first();

        return response()->json($jenisizin);

    }

    public function update()
    {

    }

    public function destroy($id)
    {
        $jenisizin = JenisIzinUsaha::where('id', $id)->delete();
        return response()->json($jenisizin);


    }
}
