<?php

namespace App\Http\Controllers;

use App\Tagihan;
use App\Pelanggan;
use App\Pegawai;
use App\Golongan;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tagihan = Tagihan::all();
        $pelanggan = Pelanggan::all();
        return view ('tagihan.index', compact('tagihan','pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tagihan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tagihan::create($request->all());
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
        Tagihan::where('idTagihan', $tagihan->idTagihan)
            ->update([
                'pelanggan_id' => $request->idPelanggan,
                'pegawai_id' => $request->idPegawai,
                'golongan_id' => $request->idGolongan,
                'tanggalCatat' => $request->tanggalCatat,
                'tahun' => $request->tahun,
                'bulan' => $request->bulan,
                'jumlahMeter' => $request->jumlahMeter,
                'fotoMeteran' => $request->fotoMeteran
            ]);
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
        //
    }
}
