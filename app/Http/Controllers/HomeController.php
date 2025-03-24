<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user(); // Ambil pengguna yang login
        $role = $user->roles->first(); // Ambil role pertama yang dimiliki
        $rolePermissions = $role ? $role->permissions : collect(); // Ambil permissions jika role ada

        return view('home', compact('user', 'role', 'rolePermissions'));
    }
}
