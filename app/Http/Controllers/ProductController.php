<?php

namespace App\Http\Controllers;

use App\ImageProduct;

use App\Product;
use App\TempatUsaha;
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
        $products = Product::all();

        return view('produk', compact('products'));
    }

    public function produkSaya()
    {
        $tempatUsaha = TempatUsaha::where('user_id', '=', Auth::user()->id)->first();
        $products = Product::where('tempat_usaha_id', '=', $tempatUsaha->id)->get();
        return view('produkSaya', ['products' => $products]);

    }

    public function create()
    {
        return view('inputProduk');
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

    public function edit(Product $product)
    {
        $images = $product->productimage()->get();
        dd($images);
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
