<?php

namespace App\Http\Controllers;

use App\JenisProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class JenisProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index(Request $request)
    {
        if (Auth::user()->id == 2 || Auth::user()->id == 1){
            if ($request->ajax()) {

                $data = JenisProduk::latest()->get();

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

            return view('admin.adminJenisProduk');
        }else {
            return view('notfound');
        }

    }

    public function store(Request $request)
    {

        $jenisprodukId = $request->id;
        $jenisproduk = JenisProduk::updateOrCreate(['id' => $jenisprodukId],
            ['jenis_produk' => $request->jenis_produk]);
        return response()->json($jenisproduk);

    }

//    public function readItem(){
//        $kecamatan = Kecamatan::all ();
//        return view ( 'admin.adminKecamatan' ,compact('kecamatan'));
//    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $jenisproduk = JenisProduk::where($where)->first();

        return response()->json($jenisproduk);

    }

    public function update()
    {

    }

    public function destroy($id)
    {
        $jenisproduk = JenisProduk::where('id', $id)->delete();
        return response()->json($jenisproduk);


    }
}
