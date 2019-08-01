<?php

namespace App\Http\Controllers;

use App\KegiatanUsaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class KegiatanUsahaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index(Request $request)
    {
        if (Auth::user()->id == 2 || Auth::user()->id == 1) {
            if ($request->ajax()) {

                $data = KegiatanUsaha::latest()->get();

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

            return view('admin.adminKegiatanUsaha');
        }else {
            return view('notfound');
        }


    }

    public function store(Request $request)
    {

        $kegiatanId = $request->id;
        $kegiatan = KegiatanUsaha::updateOrCreate(['id' => $kegiatanId],
            ['nama_kegiatan_usaha' => $request->nama_kegiatan_usaha]);
        return response()->json($kegiatan);

    }

//    public function readItem(){
//        $kecamatan = Kecamatan::all ();
//        return view ( 'admin.adminKecamatan' ,compact('kecamatan'));
//    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $kegiatan = KegiatanUsaha::where($where)->first();

        return response()->json($kegiatan);

    }

    public function update()
    {

    }

    public function destroy($id)
    {
        $kegiatan = KegiatanUsaha::where('id', $id)->delete();
        return response()->json($kegiatan);


    }
}
