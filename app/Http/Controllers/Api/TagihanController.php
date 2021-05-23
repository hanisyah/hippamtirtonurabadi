<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Response;
use App\Tagihan;
use App\Golongan;
use App\Pelanggan;
use App\Pegawai;
Use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    // public function create(Request $request){
    //     error_reporting(-1);
    //     ini_set('display_errors', 'On');
    //     $tagihan = Tagihan::create([
    //         'pelanggan_id' => $request->idPelanggan,
    //         'pegawai_id' => $request->idPegawai,
    //         'golongan_id' => $request->idGolongan,
    //         'tahun' => $request->tahun,
    //         'bulan' => $request->bulan,
    //         'tanggalCatat' => $request->tanggalCatat,
    //         'jumlahMeter' => $request->jumlahMeter,
    //         'fotoMeteran' => $request->fotoMeteran
    //     ]);

    //     $response = $tagihan;
    //     $response["success"] = 1;
    //     return response()->json($response, 201);
    //     //return response()->json($response)->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
    // }

    public function add(Request $request){
        error_reporting(-1);
        ini_set('display_errors', 'On');
        $nm = $request->fotoMeteran;

        $golongan = Golongan::where('idGolongan',$request->idGolongan)->first();

        $tagihan_sebelumnya = Tagihan::orderBy('idTagihan','desc')->where('pelanggan_id',$request->idPelanggan)->take(1)->get()[0];

      
        $jumlah_meter = $request->jumlahMeter - $tagihan_sebelumnya->jumlahMeter;

        $nominal_tagihan = $golongan->tarif * $jumlah_meter;


        $tagihan = new Tagihan;
        $tagihan->pelanggan_id = $request->idPelanggan;
        $tagihan->pegawai_id = $request->idPegawai;
        $tagihan->golongan_id = $request->idGolongan;
        $tagihan->tahun = $request->tahun;
        $tagihan->bulan = $request->bulan;
        $tagihan->tanggalCatat = $request->tanggalCatat;
        $tagihan->jumlahMeter = $request->jumlahMeter;
        $tagihan->fotoMeteran = $nm;
        $tagihan->save();

        $total_tagihan = new TotalTagihan();
        $total_tagihan->tagihan_id = $tagihan->idTagihan;
        $total_tagihan->subTotal   = $nominal_tagihan;

        $response["success"] = 1;
        return response()->json($response, 201);
    }


    public function uploadImage(Request $request){
        error_reporting(-1);
        ini_set('display_errors', 'On');
        $nm = $request->fotoMeteran;
        $nm->move(public_path().'/img', $nm->getClientOriginalName());
        $response["success"] = 1;
        return response()->json($response, 201);
    }

    public function index() {
        /*$tagihan = Tagihan::all();
        $namaGolongan = Golongan::where('idGolongan', $tagihan[0]['golongan_id'])->first();
        $tagihan['namaGolongan'] = $namaGolongan->namaGolongan;
        $kodeMeter = Pelanggan::where('idPelanggan', $tagihan[0]['pelanggan_id'])->first();
        $tagihan['kodeMeter'] = $kodeMeter->kodeMeter;
        $namaPelanggan = Pelanggan::where('idPelanggan', $tagihan[0]['pelanggan_id'])->first();
        $tagihan['namaPelanggan'] = $namaPelanggan->namaPelanggan;
        $namaPegawai = Pegawai::where('idPegawai', $tagihan[0]['pegawai_id'])->first();
        $tagihan['namaPegawai'] = $namaPegawai->namaPegawai;
        return response()->json([$tagihan]);*/
        $tagihan = DB::table('tagihan')
            ->select('tagihan.*', 'golongan.namaGolongan', 'pelanggan.*')
            ->join('golongan', 'golongan.idGolongan', '=', 'tagihan.golongan_id')
            ->join('pelanggan', 'pelanggan.idPelanggan', '=', 'tagihan.pelanggan_id')
            ->get();

        return response()->json([$tagihan]);
    }

    public function edit(Request $request){
        $tagihan = Tagihan::where('idTagihan', $request->idTagihan)->first();
        $namaGolongan = Golongan::where('idGolongan', $tagihan['golongan_id'])->first();
        $tagihan['namaGolongan'] = $namaGolongan->namaGolongan;
        $kodeMeter = Pelanggan::where('idPelanggan', $tagihan['pelanggan_id'])->first();
        $tagihan['kodeMeter'] = $kodeMeter->kodeMeter;
        $namaPelanggan = Pelanggan::where('idPelanggan', $tagihan['pelanggan_id'])->first();
        $tagihan['namaPelanggan'] = $namaPelanggan->namaPelanggan;
        $namaPegawai = Pegawai::where('idPegawai', $tagihan['pegawai_id'])->first();
        $tagihan['namaPegawai'] = $namaPegawai->namaPegawai;

        return response()->json([$tagihan]);
    }
}
