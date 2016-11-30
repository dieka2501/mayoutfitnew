<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\partners;

class partnersController extends Controller
{
	function __construct(){
		date_default_timezone_set('Asia/Jakarta');
		$this->middleware('auth');
		view()->share('username',session('username'));
		view()->share('role',session('role'));
		view()->share('name',session('name'));
		view()->share('email',session('email'));
		view()->share('date_register',session('date_register'));
		$this->partners      = new partners;
	}
	
	public function index(Request $request)
	{	
		if (session('partners_content') == NULL) {
			if ($this->partners->get_id() == NULL) {
				$partners_content = (object) array('partners_content' => "",);
			}else{
				$partners_content = $this->partners->get_partners();
			}
		}else{
			$partners_content = session('partners_content');
		}
	
		$view['notip']      			= session('notip');
		$view['url']        			= config('app.url')."public/admin/partners/store";;
		return view('partners.index')->with('data',$partners_content)->with($view);
	}
	
	public function store(Request $request)
	{	
		$cekid  = $this->partners->get_id();
		if($cekid == NULL){
			$partners_id                       = '1';
			$partners_content                  	= $request->input('partners_content');
			$insert['partners_id']            	= $partners_id;
			$insert['partners_content']        	= $partners_content;
			$insert['created_at']               = date('Y-m-d H:i:s');
			$ids = $this->partners->add($insert);
			if($ids > 0){
				$request->session()->flash('notip','<div class="alert alert-success">Data added successful</div>');
				$request->session()->flash('partners_content', NULL);
				return redirect('/admin/partners');
			}else{
				$request->session()->flash('partners_content',$partners_content);
				$request->session()->flash('notip','<div class="alert alert-danger">Add data failed, please try again</div>');
				return redirect('/admin/partners');
			}
		}else{
			$partners_id                       	= '1';
			$partners_content                  	= $request->input('partners_content');
			$insert['partners_id']             	= $partners_id;
			$insert['partners_content']        	= $partners_content;
			$insert['updated_at']               = date('Y-m-d H:i:s');
			if($this->partners->edit($insert)){
                $request->session()->flash('notip','<div class="alert alert-success">Data updated successful</div>');
                $request->session()->flash('partners_content', NULL);
                return redirect('admin/partners');
            }else{
                $request->session()->flash('partners_content',$partners_content);
                $request->session()->flash('notip','<div class="alert alert-danger">Update data failed, please try again</div>');
                return redirect('/admin/partners');            
            }
		}
	}
}