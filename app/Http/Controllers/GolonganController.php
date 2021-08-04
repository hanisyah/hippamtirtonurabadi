<?php

namespace App\Http\Controllers;

use App\Golongan;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $golongan = Golongan::all()->SortByDesc('idGolongan');
        return view ('golongan.index', compact('golongan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('golongan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getGolongan = Golongan::where('kode', '=', $request->kode)->first();
        // dd($getGolongan);
        if($getGolongan == null) {
            Golongan::create($request->all());
            return redirect('/golongan')->with(['success' => 'Data Golongan Berhasil Ditambahkan!']);
        } else {
            return redirect('/golongan')->with(['error' => 'Kode Golongan Sudah Digunakan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function show(Golongan $golongan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function edit(Golongan $golongan)
    {
        $golongan = Golongan::find($golongan->idGolongan);
        return view('golongan.update', compact('golongan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Golongan $golongan)
    {
        Golongan::where('idGolongan', $golongan->idGolongan)
            ->update([
                'kode' => $request->kode,
                'namaGolongan' => $request->namaGolongan,
                'tarif' => $request->tarif
            ]);
        return redirect('/golongan')->with(['success' => 'Data Golongan Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Golongan $golongan)
    {
        Golongan::destroy($golongan->idGolongan);
        return redirect('/golongan')->with(['success' => 'Data Golongan Berhasil Dihapus!']);
    }
}
