<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataLaundry extends Model
{
 protected $fillable=[
    	'nama_laundry',
    	'alamat',
    	'rating',
    	'foto_laundry',
    	'status',
    	'user_id',
    	'category_id'
    ];
}
