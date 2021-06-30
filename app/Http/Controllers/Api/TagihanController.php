<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Response;
use App\Tagihan;
use App\Golongan;
use App\Pelanggan;
use App\Pegawai;
use App\TotalTagihan;
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

        try{
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
            $tagihan->jumlahMeterKemarin = $tagihan_sebelumnya->jumlahMeter;
            $tagihan->fotoMeteran = $nm;
            $tagihan->save();

            $total_tagihan = new TotalTagihan();
            $total_tagihan->tagihan_id = $tagihan->idTagihan;
            $total_tagihan->subTotal   = $nominal_tagihan;
            $total_tagihan->save();

            $response["success"] = 1;
            return response()->json($response, 201);
        }catch(\Exception $e){
            \Log::error($e);
            $response["success"] = 0;
            return response()->json($response, 500);
        }

    }


    public function uploadImage(Request $request){
        error_reporting(-1);
        ini_set('display_errors', 'On');
        $nm = $request->fotoMeteran;
        $nm->move(public_path().'/img', $nm->getClientOriginalName());
        $response["success"] = 1;
        return response()->json($response, 201);
    }

    public function index($pegawai_id) {

        $tagihan = DB::table('tagihan')
            ->select('tagihan.*', 'golongan.namaGolongan', 'pelanggan.kodeMeter', 'pelanggan.namaPelanggan', 'pegawai.namaPegawai')
            ->join('golongan', 'golongan.idGolongan', '=', 'tagihan.golongan_id')
            ->join('pelanggan', 'pelanggan.idPelanggan', '=', 'tagihan.pelanggan_id')
            ->join('pegawai', 'pegawai.idPegawai', '=', 'tagihan.pegawai_id')
            ->where('tagihan.pegawai_id', $pegawai_id)
            ->get();

        return response()->json($tagihan);
    }

    public function edit(Request $request){
        error_reporting(-1);
        ini_set('display_errors', 'On');
        $nm = $request->fotoMeteran;

        $tagihan_sebelumnya = Tagihan::orderBy('idTagihan','desc')->where('pelanggan_id',$request->idPelanggan)->take(1)->get()[0];

        $tagihan = Tagihan::where('idTagihan', $request -> idTagihan)->first();
        $tagihan->pelanggan_id = $request->idPelanggan;
        $tagihan->pegawai_id = $request->idPegawai;
        $tagihan->golongan_id = $request->idGolongan;
        $tagihan->tahun = $request->tahun;
        $tagihan->bulan = $request->bulan;
        $tagihan->tanggalCatat = $request->tanggalCatat;
        $tagihan->jumlahMeter = $request->jumlahMeter;
        $tagihan->jumlahMeterKemarin = $tagihan_sebelumnya->jumlahMeter;
        $tagihan->fotoMeteran = $nm;
        $tagihan->save();

        $response["success"] = 1;
        return response()->json($response, 201);

    }
}
