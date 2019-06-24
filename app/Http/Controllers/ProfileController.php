<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\UserProfile;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index($username)
    {
        $user = User::where('username', $username)->first();
        return view('beranda', compact('user'));
    }
}
