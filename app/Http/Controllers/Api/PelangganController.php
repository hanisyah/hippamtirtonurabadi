<?php

namespace App\Http\Controllers\Api;
use App\Pelanggan;
use App\Golongan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index(Request $request){
        $pelanggan = Pelanggan::where('idPelanggan', $request->idPelanggan)->first();
        $namaGolongan = Golongan::where('idGolongan', $pelanggan['golongan_id'])->first();
        $pelanggan['namaGolongan'] = $namaGolongan->namaGolongan;

        return response()->json([$pelanggan]);
    }
}
