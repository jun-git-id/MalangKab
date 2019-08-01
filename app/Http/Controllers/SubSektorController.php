<?php

namespace App\Http\Controllers;

use App\SektorUsaha;
use App\SubSektorUsaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class SubSektorController extends Controller
{
    public function index(){
        if (Auth::user()->id == 2 || Auth::user()->id == 1) {
            $sektor = SektorUsaha::all();

            return view('admin.adminSubSektorUsaha',compact('sektor'));
        }else {
            return view('notfound');
        }

    }
    public function show(Request $request){

        if ($request->ajax()) {

            $data = SubSektorUsaha::latest()->get();

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
        return view('admin.adminSubSektorUsaha');
    }
    public function store(Request $request)
    {
        $sektorId = $request->nama_sektor_usaha;
        $subSektorId = $request->id;
        if ($subSektorId) {
            $subsektor = SubSektorUsaha::findOrFail($subSektorId);
            $subsektor->sub_sektor_usaha = $request->sub_sektor_usaha;
            $subsektor->id_sektor_usaha = $sektorId;

            $subsektor->save();
        } else {
            $subsektor = SubSektorUsaha::create([
                'sub_sektor_usaha' => $request->sub_sektor_usaha,
                'id_sektor_usaha' => $sektorId,
            ]);
        }
//        $sektorId = $request->sektor;
//        $subsektor = SubSektorUsaha::updateOrCreate(
//            ['id' => $request->id],
//            ['sub_sektor_usaha' => $request->sub_sektor_usaha],
//            ['id_sektor_usaha' => $sektorId]);
        return response()->json($subsektor);

    }
    public function edit($id)
    {
        $where = array('id' => $id);
        $subsektor = SubSektorUsaha::where($where)->first();

        return response()->json($subsektor);

    }
    public function destroy($id)
    {
        $subsektor = SubSektorUsaha::where('id', $id)->delete();
        return response()->json($subsektor);


    }
}
