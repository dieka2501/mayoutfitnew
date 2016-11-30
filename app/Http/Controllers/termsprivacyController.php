<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\termsprivacy;

class termsprivacyController extends Controller
{
	function __construct(){
		date_default_timezone_set('Asia/Jakarta');
		$this->middleware('auth');
		view()->share('username',session('username'));
		view()->share('role',session('role'));
		view()->share('name',session('name'));
		view()->share('email',session('email'));
		view()->share('date_register',session('date_register'));
		$this->termsprivacy      = new termsprivacy;
	}
	
	public function index(Request $request)
	{	
		if (session('terms_privacy_content') == NULL) {
			if ($this->termsprivacy->get_id() == NULL) {
				$terms_privacy_content = (object) array('terms_privacy_content' => "",);
			}else{
				$terms_privacy_content = $this->termsprivacy->get_termsprivacy();
			}
		}else{
			$terms_privacy_content = session('terms_privacy_content');
		}
	
		$view['notip']      			= session('notip');
		$view['url']        			= config('app.url')."public/admin/termsprivacy/store";;
		return view('termsprivacy.index')->with('data',$terms_privacy_content)->with($view);
	}
	
	public function store(Request $request)
	{	
		$cekid  = $this->termsprivacy->get_id();
		if($cekid == NULL){
			$terms_privacy_id                   = '1';
			$terms_privacy_content              = $request->input('terms_privacy_content');
			$insert['terms_privacy_id']         = $terms_privacy_id;
			$insert['terms_privacy_content']    = $terms_privacy_content;
			$insert['created_at']               = date('Y-m-d H:i:s');
			$ids = $this->termsprivacy->add($insert);
			if($ids > 0){
				$request->session()->flash('notip','<div class="alert alert-success">Data added successful</div>');
				$request->session()->flash('terms_privacy_content', NULL);
				return redirect('/admin/termsprivacy');
			}else{
				$request->session()->flash('terms_privacy_content',$terms_privacy_content);
				$request->session()->flash('notip','<div class="alert alert-danger">Add data failed, please try again</div>');
				return redirect('/admin/termsprivacy');
			}
		}else{
			$terms_privacy_id                   = '1';
			$terms_privacy_content              = $request->input('terms_privacy_content');
			$insert['terms_privacy_id']         = $terms_privacy_id;
			$insert['terms_privacy_content']    = $terms_privacy_content;
			$insert['updated_at']               = date('Y-m-d H:i:s');
			if($this->termsprivacy->edit($insert)){
                $request->session()->flash('notip','<div class="alert alert-success">Data updated successful</div>');
                $request->session()->flash('terms_privacy_content', NULL);
                return redirect('admin/termsprivacy');
            }else{
                $request->session()->flash('terms_privacy_content',$terms_privacy_content);
                $request->session()->flash('notip','<div class="alert alert-danger">Update data failed, please try again</div>');
                return redirect('/admin/termsprivacy');            
            }
		}
	}
}