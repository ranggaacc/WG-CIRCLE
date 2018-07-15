<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Models\CustomerAktif;
use App\Models\CustomerPasif;
use App\Models\Dashboard;
use App\Models\Pesanan;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use File;
use Stichoza\GoogleTranslate\TranslateClient;

class DashboardController extends Controller
{
	
	/**
	* Display a listing of the resource.
	     *
	     * @return \Illuminate\Http\Response
	     */
	public function getAllUser()
	{
		$user =  User::get();
		return $user;
	}
	
	    public function __construct()
    {
        //$this->middleware('auth');
    }

	public function getUserByEmail($email){

		$user =  User::Where('email',$email)->get();
		return $user;
	}
	
	public function dashboard($proyek=null){

		$users = Auth::user();
		if($users->role=="member")
			return redirect()->action('PageController@homeView');
		else{

			if($proyek==null||$proyek=="all"){
				$aktif=CustomerAktif::count();
				$pasif=CustomerPasif::count();

				$close=Pesanan::where('nilai_transaksi','<>',0)->count();
				$gagal=Pesanan::where('nilai_transaksi',0)->count();
				$transaksi=Pesanan::sum('nilai_transaksi');
				$products=Product::get();

				$referensi=$aktif+$pasif;
				$member=User::where('role','member')->count();

				return view('dashboard', compact('products','users','aktif','pasif','member','referensi','close','gagal','transaksi'));
			}else{
				$products=Product::get();
				$aktif=CustomerAktif::where('lokasi_diminati',$proyek)->count();
				$pasif=CustomerPasif::where('lokasi_diminati',$proyek)->count();

				$close=Pesanan::where('id_product',$proyek)->where('nilai_transaksi','<>',0)->count();
				$gagal=Pesanan::where('id_product',$proyek)->where('nilai_transaksi',0)->count();
				$transaksi=Pesanan::where('id_product',$proyek)->sum('nilai_transaksi');

				$referensi=$aktif+$pasif;
				$member=User::where('id_product',$proyek)->where('role','member')->count();

				return view('dashboard', compact('products','users','aktif','pasif','member','referensi','close','gagal','transaksi'));

			}
		}
	}
	
	public function updateimg(){

		$user = Auth::user();
		return view('updateimg', compact('user'));
		
	}
	
	
	public function updateimgprofil(Request $request){

		$this->validate($request, [
		            'img' => 'required|mimes:jpeg,bmp,jpg,png'
		        ]);
		
		$user = Auth::user();
		$imageName = $user->id . '-' . $user->name . '-' . 
		        $request->file('img')->getClientOriginalName();
		$path = base_path() . '/public/upload/images/profil/';
		$request->file('img')->move($path , $imageName);
		$user->picture = '/upload/images/profil/'.$imageName;
		$user->save();
		
		return $this->dashboard(null);
	}
	
	
}
