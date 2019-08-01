<?php

namespace App\Http\Controllers;

use App\Desa;
use App\Kecamatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DesaController extends Controller
{
    public function index(){
        $kecamatan = Kecamatan::all();

        return view('admin.adminDesa',compact('kecamatan'));
    }
    public function show(Request $request){

        if ($request->ajax()) {

            $data = Desa::latest()->get();

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
        return view('admin.adminDesa');
    }
    public function store(Request $request)
    {
        $kecamatanId = $request->kecamatan;
        $desaId = $request->id;
        if ($desaId) {
            $desa = Desa::findOrFail($desaId);
            $desa->nama_desa = $request->nama_desa;
            $desa->kecamatan_id = $kecamatanId;

            $desa->save();
        } else {
            $desa = Desa::create([
                'nama_desa' => $request->nama_desa,
                'kecamatan_id' => $kecamatanId,
            ]);
        }

        return response()->json($desa);

    }
    public function edit($id)
    {
        $where = array('id' => $id);
        $desa = Desa::where($where)->first();

        return response()->json($desa);

    }
    public function destroy($id)
    {
        $desa = Desa::where('id', $id)->delete();
        return response()->json($desa);


    }
}
