<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('tgl_pesan');
            $table->string('pembayaran');
            $table->string('nama_pelanggan');
            $table->string('alamat');
            $table->integer('total_harga');
            $table->string('jenis_pembayaran');
            $table->string('stasus_pembayaran');
            $table->string('stasus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
