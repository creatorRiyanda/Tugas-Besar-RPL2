<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;
use App\DataLaundry;
use App\User;
use App\Address;

class HomeController extends Controller
{
    public function index()
    {
    	return view('admin.home');
    }

    // Category
	public function addCategoryView()
    {
    	$categories = Category::get();
    	return view('admin.add-category', compact('categories'));
    }

    public function editCategoryView($category_id)
    {
    	$dataCategory = Category::where('id', $category_id)->first();
    	$categories = Category::get();

    	return view('admin.edit-category', compact('categories', 'dataCategory'));
    }

    public function addCategoryPost(Request $request)
    {
    	$input = $request->all();

    	if(isset($input['category_id'])){
    		//Edit data Kategori
    		$category = Category::where('id', $input['category_id'])->first();
    	}else{
	    	//create data kategori
	    	$category = new Category();
	    }
    	$category->nama_kategori = $input['nama_kategori'];
    	$category->save();

    	return redirect()->back();
    }

    public function deleteCategory(Request $request)
    {
    	if(isset($request->category_id)){
    		//Delete
    		$deleteCategory = Category::where('id', $request->category_id)->delete();

    		return redirect()->back();
    	}else{
    		return redirect()->back();
    	}
    }

    //Data Laundry
    public function listDataLaundry()
    {
        $datalaundry = DataLaundry::select('data_laundries.*', 'categories.nama_kategori as category')
                ->join('categories', 'categories.id', '=', 'data_laundries.category_id')
                ->get();

        return view('admin.list-datalaundry', compact('datalaundry'));
    }

    public function deleteLaundry(Request $request)
    {
        if(isset($request->datalaundry_id)){
            //Delete
            $deleteLaundry = DataLaundry::where('id', $request->datalaundry_id)->delete();

            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }


     //Alamat
    public function indexAlamat()
    {
        $alamat = Address::where('id', 1)->first();
        return view('admin.add-alamat', compact('alamat'));
    }

    public function saveAlamat(Request $request)
    {
        $alamat = Address::where('id', 1)->first();
        if(!$alamat){
            $alamat = new Address();
        }
        $alamat->provinsi_id = $request->provinsi;
        $alamat->kota_id = $request->kota;
        $alamat->kecamatan_id = 1;
        $alamat->alamat_id = $request->alamat;
        $alamat->save();

        return redirect()->back();
    }

    //User Management
    public function listUser()
    {
        $user = User::get();

        return view('admin.list-user', compact('user'));
    }

    public function editUser($user_id)
    {
        $user = User::where('id', $user_id)->first();

        return view('admin.edit-user', compact('user'));
    }

    public function editUserPost(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        $user->level = $request->level;
        $user->save();

        return redirect()->back();
    }


}

