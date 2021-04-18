<?php

namespace App\Http\Controllers\Api;
use App\Tagihan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    public function create(Request $request)
    {
        $tagihan =  Tagihan::create([
            'pelanggan_id' => $request->idPelanggan,
            'pegawai_id' => $request->idPegawai,
            'golongan_id' => $request->idGolongan,
            'tahun' => $request->tahun,
            'bulan' => $request->bulan,
            'tanggalCatat' => $request->tanggalCatat,
            'jumlahMeter' => $request->jumlahMeter,
            'fotoMeteran' => $request->fotoMeteran
        ]);
        $response["tagihan"] = $tagihan;
        $response["success"] = 1;
        return response()->json($response);

    }
}
