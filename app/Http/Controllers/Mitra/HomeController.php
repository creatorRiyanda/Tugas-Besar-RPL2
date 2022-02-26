<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\DataLaundry;
use App\laundryType;
use App\Transaction;
use App\Category;

use Auth;

class HomeController extends Controller
{
    public function index()
    {
    	return view('mitra.index');
    }

    public function settingDataLaundry()
    {
    	$categories = Category::get();
    	$datalaundry = DataLaundry::where('user_id', Auth::user()->id)->first();
    	return view('mitra.add-datalaundry', compact('datalaundry', 'categories'));
    }

    public function settingDataLaundryPost(Request $request)
    {
    	$input = $request->all();

    	$datalaundry = DataLaundry::where('user_id', Auth::user()->id)->first();
    	if(!$datalaundry){
    		$datalaundry = new DataLaundry();
    	}
    	$datalaundry->category_id = $input['category_id'];
    	$datalaundry->nama_laundry = $input['nama_laundry'];
    	$datalaundry->alamat = $input['alamat'];
    	$datalaundry->rating = $input['rating'];
        $datalaundry->status = (isset($input['status'])) ? $input['status'] : "Buka";
        $datalaundry->user_id = Auth::user()->id;
        if($request->hasFile('foto_laundry')){
            if ($request->file('foto_laundry')->isValid()) {
                $image_name = date('mdYHis') . uniqid() . $request->file('foto_laundry')->getClientOriginalName();
                $path = base_path() . '/public/img';
                $request->file('foto_laundry')->move($path,$image_name);
                $datalaundry->foto_laundry = '/img/'.$image_name;
            }
        }
        // $datalaundry->foto_laundry = "";
    	$datalaundry->save();

    	return redirect()->back();
    }

    public function deleteDataLaundry(Request $request)
    {
        $input = $request->all();

        if(isset($input['datalaundry_id'])){
            $datalaundry = DataLaundry::where('id', $input['datalaundry_id'])->delete();
        }
        
        return redirect('/mitra/datalaundry');
    }


    //LaundryType
    public function laundryTypeIndex()
    {
    	$laundry = DataLaundry::where('user_id', Auth::user()->id)->first();
    	$data = LaundryType::where('mitra_id', $laundry->id)->get();

    	return view('mitra.add-jenispaket', compact('data', 'laundry'));
    }

    public function laundryTypeCreate(Request $request)
    {
    	$input = $request->all();

    	$laundryType = new LaundryType();
    	$laundryType->mitra_id = $request->laundry_id;
    	$laundryType->nama_jenis = $request->nama_jenis;
    	$laundryType->harga = $request->harga;
    	$laundryType->estimasi = $request->estimasi;
    	$laundryType->save();


    	return redirect()->back();
    }

    public function deletelaundryType(Request $request)
    {
        $input = $request->all();

        if(isset($input['jenispaket_id'])){
            $laundryType = LaundryType::where('id', $input['jenispaket_id'])->delete();
        }
        
        return redirect('/mitra/jenis_paket');
    }

    

    //Transaksi
    public function indexTransaksi()
    {
        $transaksi = Transaction::select('transactions.*', 'users.name as user')
                ->join('users', 'users.id', '=', 'transactions.user_id')
                ->join('data_laundries', 'data_laundries.id','=', 'transactions.laundry_id')
                ->where('data_laundries.user_id', Auth::user()->id)
                ->get();
        return view('mitra.transaksi', compact('transaksi'));
    }

	public function editTransaksi($transaksi_id)
	{
	   	$dataTransaksi = Transaction::where('id', $transaksi_id)->first();
	   	$data = Transaction::select('transactions.*', 'users.name as user')
                ->join('users', 'users.id', '=', 'transactions.user_id')
                ->join('data_laundries', 'data_laundries.id','=', 'transactions.laundry_id')
                ->where('data_laundries.user_id', Auth::user()->id)
                ->get();

	   	return view('mitra.edit-transaksi', compact('data', 'dataTransaksi'));
	}    

	public function editTransaksiPost(Request $request)
	{
		$transaksi = Transaction::where('id', $request->transaction_id)->first();
		$transaksi->pembayaran = $request->pembayaran;
		$transaksi->stasus = (isset($request->status)) ? $request->status : "";
		$transaksi->save();

		return redirect()->back()->with('success', 'Berhasil memperbarui data');
	}

	public function deleteTransaksi(Request $request)
	{
		$transaksi_id = $request->transaksi_id;

		$transaksi = Transaction::where('id', $transaksi_id)->delete();
		return redirect('/mitra/list-transaksi')->with('success', 'Berhasil menghapus Transaksi');
	}

}

