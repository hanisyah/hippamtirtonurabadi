<?php

namespace App\Http\Controllers\Api;
use App\Tagihan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    public function create(Request $request){
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
        $response = $tagihan;
        $response["success"] = 1;
        return response()->json($response);

    }

    public function add(Request $request){
        $tagihan = new Tagihan;
        $tagihan->pelanggan_id = $request->idPelanggan;
        $tagihan->pegawai_id = $request->idPegawai;
        $tagihan->golongan_id = $request->idGolongan;
        $tagihan->tahun = $request->tahun;
        $tagihan->bulan = $request->bulan;
        $tagihan->tanggalCatat = $request->tanggalCatat;
        $tagihan->jumlahMeter = $request->jumlahMeter;
        $tagihan->fotoMeteran = $request->fotoMeteran;
        $tagihan->save();

        $response["success"] = 1;
        return response()->json($response);
    }
}
