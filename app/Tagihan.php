<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $table = 'tagihan';
    protected $primaryKey = 'idTagihan';
    protected $fillable = ['pelanggan_id','pegawai_id','golongan_id','tanggalCatat','tahun','bulan','jumlahMeter','fotoMeteran','subTotal'];

    public function pelanggan(){
    	return $this->belongsTo('App\Pelanggan','pelanggan_id');
    }

    public function pegawai(){
    	return $this->belongsTo('App\Pegawai','pegawai_id');
    }

    public function golongan(){
    	return $this->belongsTo('App\Golongan','golongan_id');
    }

    // public function detailtagihan(){
    // 	return $this->belongsTo('App\DetailTagihan','detailtagihan_id');
    // }
}
