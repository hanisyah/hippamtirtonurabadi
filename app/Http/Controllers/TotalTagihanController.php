<?php

namespace App\Http\Controllers;

use App\TotalTagihan;
use App\Tagihan;
use App\Pegawai;
use App\Pelanggan;
use App\Golongan;
use Illuminate\Http\Request;
use PDF;
use Wablass;

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
        }])->where('idTotalTagihan',$idTotalTagihan)->first();

        $pdf = PDF::loadView('TotalTagihan/strukPDF', ['data' => $data])->setPaper('a5', 'landscape');
        return $pdf->stream();
    }

    public function sentToWhatsapp($idTotalTagihan)
    {
        $data = TotalTagihan::with(['tagihan'=>function($q){
            $q->with('pelanggan')
              ->with('golongan')
              ->with('pegawai');
        }])->where('idTotalTagihan',$idTotalTagihan)->first();

        $nama_invoice = 'Invoice'.$data->idTotalTagihan.'-'.$data->created_at->format('Y-m-d').'.pdf';
        $html = '<html>
        <head>
            <title>Struk Pembayaran Rekening Air</title>
        </head>
        <body>
            <strong><center>Struk Pembayaran Rekening Air</center></strong>
            <strong><center>HIPPAM Tirto Nur Abadi</center></strong>
            <center>Dsn. Basekan - Ds. Banjarsari Wetan</center>
            <center>Kec. Dagangan - Kab. Madiun</center>
            <hr>
            <br>
            <br>
            <table width="100%">
                <tbody>
                    <tr>
                        <td width="20%">KODE METER</td>
                        <td width="2%">:</td>
                        <td width="30%">'.$data['tagihan']['pelanggan']['kodeMeter'].'</td>
                        <td width="20%">GOL</td>
                        <td width="2%">:</td>
                        <td width="26%">'.$data['tagihan']['golongan']['namaGolongan'].'</td>
                    </tr>
                    <tr>
                        <td width="20%">NAMA</td>
                        <td width="2%">:</td>
                        <td width="30%">'.$data['tagihan']['pelanggan']['namaPelanggan'].'</td>
                        <td width="20%">METER KINI</td>
                        <td width="2%">:</td>
                        <td width="26%">'.$data['tagihan']['jumlahMeter'].'</td>
                    </tr>
                    <tr>
                        <td width="20%">ALAMAT</td>
                        <td width="2%">:</td>
                        <td width="30%">'.$data['tagihan']['pelanggan']['alamat'].'</td>
                    </tr>
        
                </tbody>
        
            </table>
            <br>
            <table width="100%">
                <tbody>
        
                    <tr>
                        <td width="20%">PERIODE</td>
                        <td width="2%">:</td>
                        <td width="30%">'.$data['tagihan']['bulan'].'</td>
                        <td width="20%"></td>
                        <td width="2%"></td>
                        <td width="26%"></td>
                    </tr>
                    <tr>
                        <td width="20%">TAGIHAN AIR</td>
                        <td width="2%">:</td>
                        <td width="30%">'.$data['subTotal'].'</td>
                        <td width="20%"></td>
                        <td width="2%"></td>
                        <td width="26%"></td>
                    </tr>
        
                </tbody>
            </table>
            <br>
            <table width="100%">
                <tbody>
        
                    <tr>
                        <td width="20%">TOTAL TAGIHAN</td>
                        <td width="2%">:</td>
                        <td width="30%">'.$data['subTotal'].'</td>
                        <td width="20%"></td>
                        <td width="2%"></td>
                        <td width="26%"></td>
                    </tr>
        
                </tbody>
            </table>
        </body>
        </html>';

        //$pdf = new PDF();
        $pdf = PDF::loadHTML($html);
        $pdf->setPaper('a5', 'landscape');
        $pdf->save(public_path('invoice/'.$nama_invoice));
      
      
        $send_wa = Wablass::send_document([
            'phone'=>$data->tagihan->pelanggan->noHP,
            'document'=>asset('invoice/'.$nama_invoice),
            'caption'=>'Struk Tagihan PDAM A/N '.$data->tagihan->pelanggan->namaPelanggan,
        ]);
        dd($send_wa);
        $send_wa = json_decode($send_wa);
      
        if($send_wa->status == true){
            return redirect()->back()->with(['success'=>'Berhasil mengirim ke whatsapp pelanggan']);
        }else{
            return redirect()->back()->with(['error'=>'Gagal Mengirim ke whatsapp pelanggan!']);
        }
       
        
    }
}
