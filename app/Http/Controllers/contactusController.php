<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\contactus;

class contactusController extends Controller
{
	function __construct(){
		date_default_timezone_set('Asia/Jakarta');
		$this->middleware('auth');
		view()->share('username',session('username'));
		view()->share('role',session('role'));
		view()->share('name',session('name'));
		view()->share('email',session('email'));
		view()->share('date_register',session('date_register'));
		$this->contactus      = new contactus;
	}
	
	public function index(Request $request)
	{
		if($request->has('cari')){
			$cari       = $request->input('cari');
			$getdata    = $this->contactus->get_search($cari);
		}else{
			$cari       = "";
			$getdata    = $this->contactus->get_page();
		}
		
		$view['list']       = $getdata;
		$view['cari']       = $cari;
		$view['url']        = config('app.url').'public/admin/contactus';
		return view('contactus.index',$view);
	}
	
	public function view($id)
	{
		$getdata             = $this->contactus->get_id($id);
		$contactus_nama      = $getdata->contactus_nama;
		$contactus_email     = $getdata->contactus_email;
		$contactus_pesan     = $getdata->contactus_pesan;
		
		$view['contactus_nama']        = $contactus_nama;
		$view['contactus_email']       = $contactus_email;
		$view['contactus_pesan']       = $contactus_pesan; 
		return view('contactus.view',$view);
	}
	
}