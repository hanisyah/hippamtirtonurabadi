<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TotalTagihan extends Model
{
    protected $table = 'totaltagihan';
    protected $primaryKey = 'idTotalTagihan';
    protected $fillable = ['tagihan_id','subTotal'];

    // public function pelanggan(){
    // 	return $this->belongsTo('App\Pelanggan','pelanggan_id');
    // }

    // public function pegawai(){
    // 	return $this->belongsTo('App\Pegawai','pegawai_id');
    // }

    // public function golongan(){
    // 	return $this->belongsTo('App\Golongan','golongan_id');
    // }

    public function tagihan(){
    	return $this->belongsTo('App\Tagihan','tagihan_id');
    }
}
