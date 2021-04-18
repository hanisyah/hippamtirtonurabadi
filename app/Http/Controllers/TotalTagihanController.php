<?php

namespace App\Http\Controllers;

use App\TotalTagihan;
use App\Tagihan;
use App\Pegawai;
use App\Pelanggan;
use App\Golongan;
use Illuminate\Http\Request;
use PDF;

class TotalTagihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totaltagihan = TotalTagihan::all();
        $tagihan = Tagihan::all();
        $pegawai = Pegawai::all();
        $pelanggan = Pelanggan::all();
        $golongan = Golongan::all();
        return view ('totaltagihan.index', compact('totaltagihan','tagihan','pegawai','pelanggan','golongan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TotalTagihan  $totalTagihan
     * @return \Illuminate\Http\Response
     */
    public function show(TotalTagihan $totalTagihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TotalTagihan  $totalTagihan
     * @return \Illuminate\Http\Response
     */
    public function edit(TotalTagihan $totalTagihan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TotalTagihan  $totalTagihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TotalTagihan $totalTagihan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TotalTagihan  $totalTagihan
     * @return \Illuminate\Http\Response
     */
    public function destroy(TotalTagihan $totalTagihan)
    {
        //
    }

    // Cetak Tagihan
    public function generatePDF()

    {
        $data = ['title' => 'Struk Tagihan Meter Air'];

        $pdf = PDF::loadView('TotalTagihan/strukPDF', $data);
        // return $pdf->download('totaltagihan-pdf.pdf');
        return $pdf->stream();
    }
}
