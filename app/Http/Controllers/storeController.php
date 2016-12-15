<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\store;

class storeController extends Controller
{
	function __construct(){
		date_default_timezone_set('Asia/Jakarta');
		$this->middleware('auth');
		view()->share('username',session('username'));
		view()->share('role',session('role'));
		view()->share('name',session('name'));
		view()->share('email',session('email'));
		view()->share('date_register',session('date_register'));
		$this->store      = new store;
	}
	
	public function index(Request $request)
	{	
		if (session('store_content') == NULL) {
			if ($this->store->get_id() == NULL) {
				$store_content = (object) array('store_content' => "",);
			}else{
				$store_content = $this->store->get_store();
			}
		}else{
			$store_content = session('store_content');
		}
	
		$view['notip']      			= session('notip');
		$view['url']        			= config('app.url')."public/admin/store";;
		return view('store.index')->with('data',$store_content)->with($view);
	}
	
	public function store(Request $request)
	{	
		$cekid  = $this->store->get_id();
		if($cekid == NULL){
			$store_id                       	= '1';
			$store_content                    = $request->input('store_content');
			$insert['store_id']             	= $store_id;
			$insert['store_content']         	= $store_content;
			$insert['created_at']               = date('Y-m-d H:i:s');
			$ids = $this->store->add($insert);
			if($ids > 0){
				$request->session()->flash('notip','<div class="alert alert-success">Data added successful</div>');
				$request->session()->flash('store_content', NULL);
				return redirect('/admin/store');
			}else{
				$request->session()->flash('store_content',$store_content);
				$request->session()->flash('notip','<div class="alert alert-danger">Add data failed, please try again</div>');
				return redirect('/admin/store');
			}
		}else{
			$store_id                       	= '1';
			$store_content                    = $request->input('store_content');
			$insert['store_id']             	= $store_id;
			$insert['store_content']         	= $store_content;
			$insert['updated_at']               = date('Y-m-d H:i:s');
			if($this->store->edit($insert)){
                $request->session()->flash('notip','<div class="alert alert-success">Data updated successful</div>');
                $request->session()->flash('store_content', NULL);
                return redirect('admin/store');
            }else{
                $request->session()->flash('store_content',$store_content);
                $request->session()->flash('notip','<div class="alert alert-danger">Update data failed, please try again</div>');
                return redirect('/admin/store');            
            }
		}
	}
}