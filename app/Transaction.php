<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable=[
    	'user_id',
        'laundry_id',
        'tgl_pesan',
    	'pembayaran',
    	'nama_pelanggan',
        'nama_laundry',
    	'alamat',
        'no_telpon',
        'jenis_paket',
        'satuan',
    	'total_harga',
        'jenis_pembayaran',
    	'stasus_pembayaran',
        'stasus'

    ];
}
