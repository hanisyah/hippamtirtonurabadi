<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'idPelanggan';
    protected $fillable = ['golongan_id','namaPelanggan','alamat','noHP','tanggalPasang','kodeMeter'];

    public function tagihans(){
    	return $this->hasMany('App\Tagihan','pelanggan_id');
    }
    public function golongan(){
    	return $this->belongsTo('App\Golongan','golongan_id');
    }
}
