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
        // $totaltagihan = TotalTagihan::all();
        // $tagihan = Tagihan::all();
        // $pegawai = Pegawai::all();
        // $pelanggan = Pelanggan::all();
        // $golongan = Golongan::all();
        $totalTagihan = TotalTagihan::with(['tagihan'=>function($q){
            $q->with('pelanggan')
              ->with('golongan')
              ->with('pegawai');
        }])->orderby('idTotalTagihan','desc')->get();
        return view ('totaltagihan.index', compact('totalTagihan'));
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
    public function generatePDF($idTotalTagihan)

    {
        $data = TotalTagihan::with(['tagihan'=>function($q){
            $q->with('pelanggan')
              ->with('golongan')
              ->with('pegawai');
        }])->where('idTotalTagihan',$idTotalTagihan)->orderby('idTotalTagihan','desc')->first();
        // dd($data);

        $pdf = PDF::loadView('TotalTagihan/strukPDF', ['data' => $data])->setPaper('a5', 'landscape');
        return $pdf->stream();
    }
}
