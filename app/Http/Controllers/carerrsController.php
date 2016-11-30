<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\carerrs;

class carerrsController extends Controller
{
	function __construct(){
		date_default_timezone_set('Asia/Jakarta');
		$this->middleware('auth');
		view()->share('username',session('username'));
		view()->share('role',session('role'));
		view()->share('name',session('name'));
		view()->share('email',session('email'));
		view()->share('date_register',session('date_register'));
		$this->carerrs      = new carerrs;
	}
	
	public function index(Request $request)
	{	
		if (session('carerrs_content') == NULL) {
			if ($this->carerrs->get_id() == NULL) {
				$carerrs_content = (object) array('carerrs_content' => "",);
			}else{
				$carerrs_content = $this->carerrs->get_carerrs();
			}
		}else{
			$carerrs_content = session('carerrs_content');
		}
	
		$view['notip']      			= session('notip');
		$view['url']        			= config('app.url')."public/admin/carerrs/store";;
		return view('carerrs.index')->with('data',$carerrs_content)->with($view);
	}
	
	public function store(Request $request)
	{	
		$cekid  = $this->carerrs->get_id();
		if($cekid == NULL){
			$carerrs_id                       	= '1';
			$carerrs_content                    = $request->input('carerrs_content');
			$insert['carerrs_id']             	= $carerrs_id;
			$insert['carerrs_content']         	= $carerrs_content;
			$insert['created_at']               = date('Y-m-d H:i:s');
			$ids = $this->carerrs->add($insert);
			if($ids > 0){
				$request->session()->flash('notip','<div class="alert alert-success">Data added successful</div>');
				$request->session()->flash('carerrs_content', NULL);
				return redirect('/admin/carerrs');
			}else{
				$request->session()->flash('carerrs_content',$carerrs_content);
				$request->session()->flash('notip','<div class="alert alert-danger">Add data failed, please try again</div>');
				return redirect('/admin/carerrs');
			}
		}else{
			$carerrs_id                       	= '1';
			$carerrs_content                    = $request->input('carerrs_content');
			$insert['carerrs_id']             	= $carerrs_id;
			$insert['carerrs_content']         	= $carerrs_content;
			$insert['updated_at']               = date('Y-m-d H:i:s');
			if($this->carerrs->edit($insert)){
                $request->session()->flash('notip','<div class="alert alert-success">Data updated successful</div>');
                $request->session()->flash('carerrs_content', NULL);
                return redirect('admin/carerrs');
            }else{
                $request->session()->flash('carerrs_content',$carerrs_content);
                $request->session()->flash('notip','<div class="alert alert-danger">Update data failed, please try again</div>');
                return redirect('/admin/carerrs');            
            }
		}
	}
}