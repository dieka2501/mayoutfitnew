<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\faq;

class faqController extends Controller
{
	function __construct(){
		date_default_timezone_set('Asia/Jakarta');
		$this->middleware('auth');
		view()->share('username',session('username'));
		view()->share('role',session('role'));
		view()->share('name',session('name'));
		view()->share('email',session('email'));
		view()->share('date_register',session('date_register'));
		$this->faq      = new faq;
	}
	
	public function index(Request $request)
	{	
		if (session('faq_content') == NULL) {
			if ($this->faq->get_id() == NULL) {
				$faq_content = (object) array('faq_content' => "",);
			}else{
				$faq_content = $this->faq->get_faq();
			}
		}else{
			$faq_content = session('faq_content');
		}
	
		$view['notip']      			= session('notip');
		$view['url']        			= config('app.url')."public/admin/faq/store";;
		return view('faq.index')->with('data',$faq_content)->with($view);
	}
	
	public function store(Request $request)
	{	
		$cekid  = $this->faq->get_id();
		if($cekid == NULL){
			$faq_id                       		= '1';
			$faq_content                    	= $request->input('faq_content');
			$insert['faq_id']             		= $faq_id;
			$insert['faq_content']         		= $faq_content;
			$insert['created_at']               = date('Y-m-d H:i:s');
			$ids = $this->faq->add($insert);
			if($ids > 0){
				$request->session()->flash('notip','<div class="alert alert-success">Data added successful</div>');
				$request->session()->flash('faq_content', NULL);
				return redirect('/admin/faq');
			}else{
				$request->session()->flash('faq_content',$faq_content);
				$request->session()->flash('notip','<div class="alert alert-danger">Add data failed, please try again</div>');
				return redirect('/admin/faq');
			}
		}else{
			$faq_id                       		= '1';
			$faq_content                    	= $request->input('faq_content');
			$insert['faq_id']             		= $faq_id;
			$insert['faq_content']         		= $faq_content;
			$insert['updated_at']               = date('Y-m-d H:i:s');
			if($this->faq->edit($insert)){
                $request->session()->flash('notip','<div class="alert alert-success">Data updated successful</div>');
                $request->session()->flash('faq_content', NULL);
                return redirect('admin/faq');
            }else{
                $request->session()->flash('faq_content',$faq_content);
                $request->session()->flash('notip','<div class="alert alert-danger">Update data failed, please try again</div>');
                return redirect('/admin/faq');            
            }
		}
	}
}