<?php

namespace App\Http\Controllers;

use App\ImageProduct;

use App\JenisProduk;
use App\Product;
use App\TempatUsaha;
use App\UnitProduct;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index()
    {
        return view('produk', [
            'products' => Product::with(['productimage'])->get(),
        ]);
    }

    public function produkSaya()
    {
        $tempatUsaha = TempatUsaha::where('user_id', '=', Auth::user()->id)->first();
        if ($tempatUsaha){
            $products = Product::where('tempat_usaha_id', '=', $tempatUsaha->id)->get();

        }else{
            $products = Product::all()->where('tempat_usaha_id', '=', $tempatUsaha);
        }
        return view('produkSaya', ['products' => $products]);
    }

    public function create()
    {
        $jenisProduk = JenisProduk::all();
        $unit = UnitProduct::all();
        $tempatUsaha = TempatUsaha::where('user_id', '=', Auth::user()->id)->get();
        return view('inputProduk',compact('jenisProduk','unit','tempatUsaha'));
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());

        $product->productimage()->sync($request['product_images']);
        return redirect()->back();

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

    public function edit($id)
    {
        $products = Product::findOrFail($id);
        return view('editProduk',compact('products'));
    }

    public function update(Request $request, Product $product)
    {

        $product->update($request->all());

        $product->productimage()->syncWithoutDetaching($request['product_images']);

        Session::flash('success', 'Berhasil');
        return redirect()->back();
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
}
