<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $table = 'golongan';
    protected $primaryKey = 'idGolongan';
    protected $fillable = ['kode','namaGolongan','tarif'];

    public function tagihans(){
    	return $this->hasMany('App\Tagihan','golongan_id');
    }

}
