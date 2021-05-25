<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use App\Golongan;
use App\Pegawai;
use App\Tagihan;

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
        $pelanggan = Pelanggan::count();
        $golongan = Golongan::count();
        $pegawai = Pegawai::count();
        $tagihan = Tagihan::count();
        return view('home',compact('pelanggan','golongan','pegawai','tagihan'));
    }
}
