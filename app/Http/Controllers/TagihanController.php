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

        $data = $request->except(['fotoMeteran']);

        if ($request->hasFile('fotoMeteran')) {
            $extension = $request->fotoMeteran->extension();
            $filename = Uuid::uuid4() . ".{$extension}";
            $oldfile = basename($tagihan->fotoMeteran);
            Storage::delete("tagihan/{$oldfile}");
            $request->fotoMeteran->storeAs('tagihan', $filename);
            $data['fotoMeteran'] = asset("/storage/tagihan/{$filename}");
        }

        $tagihan->fill($data);
        $tagihan->save();

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

}
