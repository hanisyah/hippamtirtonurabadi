<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'idPelanggan';
    protected $fillable = ['namaPelanggan','alamat','noHP','tanggalPasang','kodeMeter'];

    public function tagihans(){
    	return $this->hasMany('App\Tagihan','pelanggan_id');
    }
}
