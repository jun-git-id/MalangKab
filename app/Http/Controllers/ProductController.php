<?php

namespace App\Http\Controllers;

use App\Desa;
use App\ImageProduct;

use App\JenisProduk;
use App\KategoriUsaha;
use App\Kecamatan;
use App\LikeProduct;
use App\Product;
use App\TempatUsaha;
use App\UnitProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'desa','show']]);
    }

    public function index(Request $request)
    {

        $products = Product::with(['productimage'])->paginate(20);
        $kecamatan = Kecamatan::all();
        $desa = Desa::all();
        $jenis = JenisProduk::all();
        $keywords = $request->get('keywords');


        $kecamatan_id = $request->get('kecamatan');

        $desa_id = $request->get('desa');
        $jenis_id = $request->get('jenis');

        if ($jenis_id) {
            $products = Product::with('provider')->where('jenis_produk_id', '=', $jenis_id)->select('*')->whereIn('tempat_usaha_id', function ($query) {
                $query->select('id')->from('tempat_usahas')->where([
                    ['status', '=', 'Approve']]);
            })->paginate(20);
        } else {
            $products = Product::with('provider')->select('*')->whereIn('tempat_usaha_id', function ($query) use ($request) {
                if ($request->get('kecamatan')) {
                    $query->select('id')->from('tempat_usahas')->where([
                        ['status', '=', 'Approve'],
                        ['kecamatan_id', '=', $request->get('kecamatan')],
                    ]);
                }
                if ($request->get('desa')) {
                    $query->select('id')->from('tempat_usahas')->where([
                        ['status', '=', 'Approve'],
                        ['desa_id', '=', $request->get('desa')],
                    ]);
                }
                $query->select('id')->from('tempat_usahas')->where([
                    ['status', '=', 'Approve']]);
            })->paginate(20);
        }

        if ($keywords) {
            $products = Product::with(['productimage'])->where([
                ['nama_produk', 'LIKE', "%$keywords%"],
            ])->paginate(20);

        }

        return view('produk', compact(['products', 'kecamatan', 'desa', 'jenis']));

    }

    public function produkSaya()
    {
        $tempatUsaha = TempatUsaha::where('user_id', '=', Auth::user()->id)->first();
        if ($tempatUsaha) {
            $products = Product::where('tempat_usaha_id', '=', $tempatUsaha->id)->get();

        } else {
            $products = Product::all()->where('tempat_usaha_id', '=', $tempatUsaha);
        }
        return view('products.produkSaya', compact('products'));
    }

    public function desa()
    {
        $kecamatan_id = Input::get('id');
        $desa = Desa::where('kecamatan_id', '=', $kecamatan_id)->get();

        return response()->json($desa);
    }

    public function create()
    {
        $jenisProduk = JenisProduk::all();
        $unit = UnitProduct::all();
        $tempatUsaha = TempatUsaha::where('user_id', '=', Auth::user()->id)->get();
        return view('products.inputProduk', compact('jenisProduk', 'unit', 'tempatUsaha'));
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());

        $product->productimage()->sync($request['product_images']);
        return redirect('/produk-saya');

    }

    public function uploadImage(Request $request)
    {
        $uploadedFile = $request->file('file');

        $fileName = uniqid() . $uploadedFile->getClientOriginalName();
        $path = 'uploads/product/';
        $size = $uploadedFile->getSize();

        Storage::disk('public')->putFileAs($path, $uploadedFile, $fileName);

        $upload = new ImageProduct;
        $upload->fill([
            'filename' => $fileName,
            'path' => $path,
            'size' => $size,
        ])->save();

        return response()->json([
            'id' => $upload->id
        ]);
    }

    public function show($id)
    {
        $products = Product::with(['productimage'])->findOrFail($id);
        $relatedProducts = Product::where('jenis_produk_id','=',$products->jenis_produk_id)->paginate(4);
        return view('products.detailProduk',compact('products','relatedProducts'));
    }

    public function edit($id)
    {
        $products = Product::findOrFail($id);
        $jenisProduk = JenisProduk::all();
        $unit = UnitProduct::all();
        $tempatUsaha = TempatUsaha::where('user_id', '=', Auth::user()->id)->get();
        return view('products.editProduk', compact('products','jenisProduk', 'unit', 'tempatUsaha'));
    }

    public function update(Request $request, Product $product)
    {

        $product->update($request->all());

        $product->productimage()->syncWithoutDetaching($request['product_images']);

        Session::flash('success', 'Berhasil');
        return redirect('/produk-saya');
    }

    public function deleteImage($id)
    {
        $image = ImageProduct::find($id);

        $fullPath = $image['path'] . $image['filename'];

        Storage::disk('public')->delete($fullPath);

        $image->delete();

        return response('success', 204);
    }

    public function destroy(Product $product)
    {
        $images = $product->productimage()->get();
        foreach ($images as $img) {
            Storage::disk('public')->delete($img->filename);
        }

        $product->delete();

        Session::flash('success', 'Berhasil Menghapus Product');

        return route('products.index');
    }
    public function like($id){
        $product = Product::findOrFail($id);
        $like = LikeProduct::where('liked_by','=',Auth::user()->id)->first();
        if (!$like){
            $product->like++;
            $product->save();

            $like = LikeProduct::create([
                'product_id' => $product->id,
                'liked_by' => Auth::user()->id,
            ]);
        }


        return redirect()->back();
    }
    public function deleteFavorit($id){
        $likeProduct = LikeProduct::where('id','=',$id)->delete();

        Session::flash('success', 'Berhasil Menghapus Product');
        return route('products.favorit');
    }
    public function dislike($id){
        $product = Product::find($id);
        $product->like--;
        $product->save();
        return route('products.favorit');

    }

    public function product_favorit(){
        $products = LikeProduct::with(['likeProduct'])->where('liked_by','=',Auth::user()->id)->get();

        $tempat = Product::with(['provider'])->first();
        return view('products.produkFavorit',compact('products','tempat'));
    }
}
