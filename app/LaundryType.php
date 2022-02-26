<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaundryType extends Model
{
  protected $fillable=[
    	'mitra_id',
    	'nama_jenis',
    	'harga',
    	'estimasi'
    	
    ];
}
