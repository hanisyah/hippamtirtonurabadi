<?php

namespace App\Http\Controllers;

use App\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::all()->SortByDesc('idPegawai');
        return view ('pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getPegawai = Pegawai::where('kodePegawai', '=', $request->kodePegawai)->first();
        if($getPegawai == null) {
            Pegawai::create($request->all());
            return redirect('/pegawai')->with(['success' => 'Data Pegawai Berhasil Ditambahkan!']);
        } else {
            return redirect('/pegawai')->with(['error' => 'Kode Pegawai Sudah Digunakan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        $pegawai = Pegawai::find($pegawai->idPegawai);
        return view('pegawai.update', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        Pegawai::where('idPegawai', $pegawai->idPegawai)
            ->update([
                'kodePegawai' => $request->kodePegawai,
                'namaPegawai' => $request->namaPegawai,
                'alamat' => $request->alamat,
                'noHP' => $request->noHP,
                'email' => $request->email
            ]);
        return redirect('/pegawai')->with(['success' => 'Data Pegawai Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        // dd($pegawai);
        Pegawai::destroy($pegawai->idPegawai);
        return redirect('/pegawai')->with(['success' => 'Data Pegawai Berhasil Dihapus!']);
    }
}
