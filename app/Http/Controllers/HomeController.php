<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DataLaundry;
use App\Category;
use App\Transaction;
use App\User;
use App\LaundryType;

use Auth;
use Validator;
use Hash;

class HomeController extends Controller
{
    public function index(Request $request)
    {
    	$category = Category::get();

    	 if(isset($request->category_id)){
            $datalaundry = DataLaundry::where('category_id', $request->category_id)
                    ->join('categories', 'categories.id', 'data_laundries.category_id')
                    ->select('data_laundries.*')
                    ->get();
        }else{
            $datalaundry = DataLaundry::select('data_laundries.*')
                        ->join('categories', 'categories.id', 'data_laundries.category_id')
                        ->get();
        }
    		//$datalaundry = DataLaundry::get();
    	// }

    	return view('user.index', compact('category', 'datalaundry'));
    }

    public function checkoutView(Request $request)
    {
    	// if(!Auth::check()){
    	// 	return redirect('/login');
    	// }

    	
    	$datalaundry = DataLaundry::where('id', $request->laundry_id)->first();
        $dataLaundryType = LaundryType::where('mitra_id', $request->laundry_id)->get();
    	//if($datalaundry){
    		return view('user.checkout', compact('datalaundry', 'dataLaundryType'));

    }

    public function checkoutPost(Request $request)
    {
    	if(!Auth::check()){
    		return redirect('/login');
    	}
        // return $request->all();
    	$datalaundry = DataLaundry::where('id', $request->laundry_id)->first();

    	if($datalaundry){
            $tipeLaundry = LaundryType::where('mitra_id', $datalaundry->id)->where('id', $request->jenis_laundry)->first();
    		if($datalaundry->status == "Tutup"){
    			return redirect()->back()->with('failed', 'Gagal Memesan, Toko Ini Belum Buka.');
    		}       
            try {
                $transaksi = new Transaction();
                $transaksi->tgl_pesan = date('Y-m-d H:i:s');
                $transaksi->pembayaran = $request->pembayaran;
                $transaksi->nama_pelanggan = $request->nama;
                $transaksi->no_telpon = $request->no_hp;
                $transaksi->alamat = $request->alamat;
                $transaksi->jenis_paket = $tipeLaundry->nama_jenis;
                $transaksi->jenis_pembayaran = "";
                $transaksi->total_harga = $request->quantity * $tipeLaundry->harga;
                $transaksi->satuan = $request->quantity;
                $transaksi->stasus_pembayaran = "Menunggu Pengiriman";
                $transaksi->user_id = Auth::user()->id;;
                $transaksi->stasus = "Sedang Diproses";
                $transaksi->laundry_id = $datalaundry->id;
                $transaksi->nama_laundry = $datalaundry->nama_laundry;
                $transaksi->save();
                // return $transaksi;

                return redirect()->back()->with('success', 'Sukses melakukan pemesanan, silakan cek pesanan Anda.');
            } catch (Exception $e) {
                return "gagal";
            }
    		
    	}else{
    		return redirect('/');
    	}
    }

    public function myAccount()
    {
        $user_id = Auth::user()->id;

        $transactions = Transaction::select('transactions.*')
                    ->where('transactions.user_id', $user_id)
                    ->get();

        return view('user.riwayat-transaksi', compact('transactions'));
    }

    public function changePw(Request $request)
    {
        $user_id = Auth::user()->id;

        $rules = [
            'new_password'          => 'required|same:new_password_confirm',
        ];
  
        $validator = Validator::make($request->all(), $rules);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        if($request->new_password != $request->new_password_confirm){
            return redirect()->back()->with('failed', 'Password tidak sama');
        }

        $user = User::where('id', $user_id)->first();
        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect()->back()->with('success', 'Berhasil merubah password');
    }

    public function lupaPassword(Request $request)
    {
        $email = $request->email;

       
        \Mail::to($email)->send(new \App\Mail\ResetPassword());

        return redirect()->back();
    }

    public function resetPassword(Request $request)
    {

        $rules = [
            'email'                 => 'required',
            'new_password'          => 'required|same:new_password_confirm',
        ];
  
        $validator = Validator::make($request->all(), $rules);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        if($request->new_password != $request->new_password_confirm){
            return redirect()->back()->with('failed', 'Password tidak sama');
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect()->back()->with('success', 'Berhasil merubah password');
    }
}
