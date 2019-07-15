<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfile;
use App\User;
use Illuminate\Http\Request;
use App\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

//    public function index()
//    {
//        $user = User::all();
//        return view('beranda', compact('user'));
//    }

    public function edit($id)
    {
        $profile = User::findOrFail($id);
        return view('profile.edit',compact('profile'));

    }
    public function update(Request $request, $id)
    {
        $profile = User::findOrFail($id);
        $profile->nama = $request -> name;
        $profile->username = $request -> username;
        $profile->nik = $request -> nik;
        $profile->no_telp = $request -> no_telp;
        $profile->alamat = $request -> alamat;
        $profile->gender = $request -> gender;
        $profile->password = Hash::make($request -> password);
        if ($request->hasFile('foto')){
            $image = $request-> file('foto');
            $new_name = uniqid() . '.' . $image->getClientOriginalName();
            $foto = Storage::disk('public')->putFileAs('user', $image, $new_name);
            $profile->foto = $foto;
            Storage::delete('public/'.Auth::user()->foto);

        }

        $profile->save();

        return redirect('/editProfile/'.$id)->with('status', 'Profile successfully updated');
    }
}
