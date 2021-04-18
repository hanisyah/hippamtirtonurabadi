<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view ('pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pelanggan::create($request->all());
        return redirect('/pelanggan')->with(['success' => 'Data Pelanggan Berhasil Ditambahkan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelanggan $pelanggan)
    {
        $pelanggan = Pelanggan::find($pelanggan->idPelanggan);
        return view('pelanggan.update', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        Pelanggan::where('idPelanggan', $pelanggan->idPelanggan)
            ->update([
                'namaPelanggan' => $request->namaPelanggan,
                'alamat' => $request->alamat,
                'noHP' => $request->noHP,
                'tanggalPasang' => $request->tanggalPasang,
                'kodeMeter' => $request->kodeMeter
            ]);
        return redirect('/pelanggan')->with(['success' => 'Data Pelanggan Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelanggan $pelanggan)
    {
        Pelanggan::destroy($pelanggan->idPelanggan);
        return redirect('/pelanggan')->with(['success' => 'Data Pelanggan Berhasil Dihapus!']);
    }

    public function qrcode() {

    }
}
