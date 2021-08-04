<?php

namespace App\Http\Controllers;

use App\Tagihan;
use App\Pelanggan;
use App\Pegawai;
use App\Golongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tagihan = Tagihan::with('pelanggan');

        if(isset($request->dates)){
            if(!empty($request->dates)){
                $dates = explode('-',$request->dates);
                $start = Carbon::parse($dates[0])->toDateTimeString();
                $end   = Carbon::parse($dates[1])->toDateTimeString();

                $from = explode(' ',$start)[0].' 00:00:00';
                $to   = explode(' ',$end)[0].' 23:59:59';
                $tagihan = $tagihan->whereBetween('created_at',[$from,$to]);
            }
        }
        $tagihan = $tagihan->orderby('idTagihan','desc')->get();


        return view ('tagihan.index', compact('tagihan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tagihan = Tagihan::all();
        $pelanggan = Pelanggan::all();
        $pegawai = Pegawai::all();
        $golongan = Golongan::all();
        return view('tagihan.create', compact('tagihan','pelanggan','pegawai','golongan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nm = $request->fotoMeteran;
        $namaFile = time().rand(100,999).".".$nm->getClientOriginalExtension();

        $tagihan = new Tagihan;
        $tagihan->pelanggan_id = $request->idPelanggan;
        $tagihan->pegawai_id = $request->idPegawai;
        $tagihan->golongan_id = $request->idGolongan;
        $tagihan->tanggalCatat = $request->tanggalCatat;
        $tagihan->tahun = $request->tahun;
        $tagihan->bulan = $request->bulan;
        $tagihan->jumlahMeterKemarin = $request->jumlahMeterKemarin;
        $tagihan->jumlahMeter = $request->jumlahMeter;
        $tagihan->fotoMeteran = $namaFile;

        $nm->move(public_path().'/img/', $namaFile);
        $tagihan->save();
        return redirect('/tagihan')->with(['success' => 'Data Tagihan Berhasil Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function show(Tagihan $tagihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tagihan $tagihan)
    {
        $tagihan = Tagihan::find($tagihan->idTagihan);
        $pelanggan = Pelanggan::all();
        $pegawai = Pegawai::all();
        $golongan = Golongan::all();
        return view('tagihan.update', compact('tagihan','pelanggan','pegawai','golongan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tagihan $tagihan)
    {
        // dd($request->all());
        // $tagihan = Tagihan::find($tagihan->idTagihan);
        // $nm = $request->fotoMeteran;
        // $namaFile = $nm->getClientOriginalName();

        // $data = [
        //         'pelanggan_id' => $request->idPelanggan,
        //         'pegawai_id' => $request->idPegawai,
        //         'golongan_id' => $request->idGolongan,
        //         'tanggalCatat' => $request->tanggalCatat,
        //         'tahun' => $request->tahun,
        //         'bulan' => $request->bulan,
        //         'jumlahMeter' => $request->jumlahMeter,
        //         'fotoMeteran' => $nm
        // ];
        // $request->fotoMeteran->move(public_path().'/img/', $nm);
        // $tagihan->update($data);

        // Tagihan::where('idTagihan', $tagihan->idTagihan)
        //     ->update([
        //         'pelanggan_id' => $request->idPelanggan,
        //         'pegawai_id' => $request->idPegawai,
        //         'golongan_id' => $request->idGolongan,
        //         'tanggalCatat' => $request->tanggalCatat,
        //         'tahun' => $request->tahun,
        //         'bulan' => $request->bulan,
        //         'jumlahMeter' => $request->jumlahMeter,
        //         'fotoMeteran' => $request->fotoMeteran
        //     ]);
        return redirect('/tagihan')->with(['success' => 'Data Tagihan Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tagihan  $tagihan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tagihan $tagihan)
    {
        Tagihan::destroy($tagihan->idTagihan);
        return redirect('/tagihan')->with(['success' => 'Data Tagihan Berhasil Dihapus!']);
    }

    public function getDataPelanggan(Request $request)
    {
        $pelanggan = Pelanggan::with('golongan')->where([
            'idPelanggan' => $request->idPelanggan
        ])->first();

        $data['status'] = 'ok';
        $data['result'] = array('kodeMeter' => $pelanggan->kodeMeter,
                                'golongan_id' => $pelanggan->golongan_id,
                                'namaGolongan' => $pelanggan->golongan->namaGolongan);

        echo json_encode($data);
    }

}
