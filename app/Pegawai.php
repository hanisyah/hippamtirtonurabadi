<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'idPegawai';
    protected $fillable = ['namaPegawai','alamat','noHP'];

    public function tagihans(){
    	return $this->hasMany('App\Tagihan','pegawai_id');
    }

    public function user()
    {
    	return $this->hasOne('App\User','pegawai_id');
    }
}
