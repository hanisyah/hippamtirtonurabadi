<?php

namespace App\Http\Controllers\Api;
use App\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index(Request $request)
    {
        $pelanggan = Pelanggan::where('idPelanggan', $request->idPelanggan)->get();
        return response()->json([
            'data' => $pelanggan,
            'message' => 'Sukses ambil data',
        ]);
    }
}
