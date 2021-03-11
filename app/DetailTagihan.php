<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTagihan extends Model
{
    protected $primaryKey = 'idDetailTagihan';
    protected $fillable = ['tanggalCatat','bulanAwal','bulanAkhir','fotoMeteran','subTotal'];

    // public function tagihans(){
    // 	return $this->hasMany('App\Tagihan','detailtagihan_id');
    // }

}
