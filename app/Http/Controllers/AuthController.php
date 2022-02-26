<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DataLaundry;

use Validator;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;
use DB;

class AuthController extends Controller
{
    public function login(Request $request)
    {
    	$rules = [
            'username'                 => 'required',
            'password'              => 'required|string'
        ];
  
        $messages = [
            'username.required'        => 'Email wajib diisi',
            'password.required'     => 'Password wajib diisi',
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
  
        $data = [
            'name'     => $request->input('username'),
            'password'  => $request->input('password'),
        ];
  
        Auth::attempt($data);
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            $cekLevelUser = User::where('id', Auth::user()->id)->first();
            if($cekLevelUser->level == "user"){
            	return redirect('/'); //Arahkan ke halaman user apabila level nya user
            }else if($cekLevelUser->level == "mitra"){
                return redirect('/mitra');
            }else{
            	return redirect('/admin'); //Arahkan ke halaman admin apabila level nya admin
            }
  
        } else { // false
            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect('login');
        }
    }

    public function register(Request $request)
    {
    	$rules = [
            'name'                  => 'required|min:3|unique:users,name',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|confirmed'
        ];
  
        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'email.required'        => 'Email wajib diisi',
            'email.email'           => 'Email tidak valid',
            'email.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi',
            'password.confirmed'    => 'Password tidak sama dengan konfirmasi password'
        ];
  
        $validator = Validator::make($request->all(), $rules, $messages);
  
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
    
        DB::beginTransaction();
        $user = new User;
        $user->name = $request->name;
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->no_hp = "-";
        $user->alamat = "-";
        if(isset($request->role)){
            $user->level = $request->role;
        }else{
            $user->level = "user";
        }
  
        if($user->save()){
            if(isset($request->role)){
                if($request->role == "mitra"){
                    $newLaundry = new DataLaundry();
                    $newLaundry->user_id = $user->id;
                    $newLaundry->nama_laundry = "Laundry " . $request->name;
                    $newLaundry->alamat = "";
                    $newLaundry->rating = "0.0";
                    $newLaundry->foto_laundry = "";
                    $newLaundry->status = "Tutup";
                    $newLaundry->category_id = 0;
                    $newLaundry->save();
                }
            }
            DB::commit();
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect('login');
        } else {
            DB::rollback();
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect('register');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
