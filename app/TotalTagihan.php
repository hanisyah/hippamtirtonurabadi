<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TotalTagihan extends Model
{
    protected $table = 'totaltagihan';
    protected $primaryKey = 'idTotalTagihan';
    protected $fillable = ['tagihan_id','subTotal'];
}
