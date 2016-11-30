<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\aboutus;

class aboutusController extends Controller
{
	function __construct(){
		date_default_timezone_set('Asia/Jakarta');
		$this->middleware('auth');
		view()->share('username',session('username'));
		view()->share('role',session('role'));
		view()->share('name',session('name'));
		view()->share('email',session('email'));
		view()->share('date_register',session('date_register'));
		$this->aboutus      = new aboutus;
	}
	
	public function index(Request $request)
	{	
		if (session('aboutus_content') == NULL) {
			if ($this->aboutus->get_id() == NULL) {
				$aboutus_content = (object) array('aboutus_content' => "",);
			}else{
				$aboutus_content = $this->aboutus->get_aboutus();
			}
		}else{
			$aboutus_content = session('aboutus_content');
		}
	
		$view['notip']      			= session('notip');
		$view['url']        			= config('app.url')."public/admin/aboutus/store";;
		return view('aboutus.index')->with('data',$aboutus_content)->with($view);
	}
	
	public function store(Request $request)
	{	
		$cekid  = $this->aboutus->get_id();
		if($cekid == NULL){
			$aboutus_id                       	= '1';
			$aboutus_content                    = $request->input('aboutus_content');
			$insert['aboutus_id']             	= $aboutus_id;
			$insert['aboutus_content']         	= $aboutus_content;
			$insert['created_at']               = date('Y-m-d H:i:s');
			$ids = $this->aboutus->add($insert);
			if($ids > 0){
				$request->session()->flash('notip','<div class="alert alert-success">Data added successful</div>');
				$request->session()->flash('aboutus_content', NULL);
				return redirect('/admin/aboutus');
			}else{
				$request->session()->flash('aboutus_content',$aboutus_content);
				$request->session()->flash('notip','<div class="alert alert-danger">Add data failed, please try again</div>');
				return redirect('/admin/aboutus');
			}
		}else{
			$aboutus_id                       	= '1';
			$aboutus_content                    = $request->input('aboutus_content');
			$insert['aboutus_id']             	= $aboutus_id;
			$insert['aboutus_content']         	= $aboutus_content;
			$insert['updated_at']               = date('Y-m-d H:i:s');
			if($this->aboutus->edit($insert)){
                $request->session()->flash('notip','<div class="alert alert-success">Data updated successful</div>');
                $request->session()->flash('aboutus_content', NULL);
                return redirect('admin/aboutus');
            }else{
                $request->session()->flash('aboutus_content',$aboutus_content);
                $request->session()->flash('notip','<div class="alert alert-danger">Update data failed, please try again</div>');
                return redirect('/admin/aboutus');            
            }
		}
	}
}