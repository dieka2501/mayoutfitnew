<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\howorder;

class howorderController extends Controller
{
	function __construct(){
		date_default_timezone_set('Asia/Jakarta');
		$this->middleware('auth');
		view()->share('username',session('username'));
		view()->share('role',session('role'));
		view()->share('name',session('name'));
		view()->share('email',session('email'));
		view()->share('date_register',session('date_register'));
		$this->howorder      = new howorder;
	}
	
	public function index(Request $request)
	{	
		if (session('how_order_content') == NULL) {
			if ($this->howorder->get_id() == NULL) {
				$how_order_content = (object) array('how_order_content' => "",);
			}else{
				$how_order_content = $this->howorder->get_howorder();
			}
		}else{
			$how_order_content = session('how_order_content');
		}
	
		$view['notip']      			= session('notip');
		$view['url']        			= config('app.url')."public/admin/howorder/store";;
		return view('howorder.index')->with('data',$how_order_content)->with($view);
	}
	
	public function store(Request $request)
	{	
		$cekid  = $this->howorder->get_id();
		if($cekid == NULL){
			$how_order_id                       = '1';
			$how_order_content                  = $request->input('how_order_content');
			$insert['how_order_id']            	= $how_order_id;
			$insert['how_order_content']        = $how_order_content;
			$insert['created_at']               = date('Y-m-d H:i:s');
			$ids = $this->howorder->add($insert);
			if($ids > 0){
				$request->session()->flash('notip','<div class="alert alert-success">Data added successful</div>');
				$request->session()->flash('how_order_content', NULL);
				return redirect('/admin/howorder');
			}else{
				$request->session()->flash('how_order_content',$how_order_content);
				$request->session()->flash('notip','<div class="alert alert-danger">Add data failed, please try again</div>');
				return redirect('/admin/howorder');
			}
		}else{
			$how_order_id                       = '1';
			$how_order_content                  = $request->input('how_order_content');
			$insert['how_order_id']             = $how_order_id;
			$insert['how_order_content']        = $how_order_content;
			$insert['updated_at']               = date('Y-m-d H:i:s');
			if($this->howorder->edit($insert)){
                $request->session()->flash('notip','<div class="alert alert-success">Data updated successful</div>');
                $request->session()->flash('how_order_content', NULL);
                return redirect('admin/howorder');
            }else{
                $request->session()->flash('how_order_content',$how_order_content);
                $request->session()->flash('notip','<div class="alert alert-danger">Update data failed, please try again</div>');
                return redirect('/admin/howorder');            
            }
		}
	}
}