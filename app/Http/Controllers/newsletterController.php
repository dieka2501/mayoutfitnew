<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\newsletter;

class newsletterController extends Controller
{
	function __construct(){
		date_default_timezone_set('Asia/Jakarta');
		$this->middleware('auth');
		view()->share('username',session('username'));
		view()->share('role',session('role'));
		view()->share('name',session('name'));
		view()->share('email',session('email'));
		view()->share('date_register',session('date_register'));
		$this->newsletter      = new newsletter;
	}
	
	public function index(Request $request)
	{	
		if (session('newsletter_content') == NULL) {
			if ($this->newsletter->get_id() == NULL) {
				$newsletter_content = (object) array('newsletter_content' => "",);
			}else{
				$newsletter_content = $this->newsletter->get_newsletter();
			}
		}else{
			$newsletter_content = session('newsletter_content');
		}
	
		$view['notip']      			= session('notip');
		$view['url']        			= config('app.url')."public/admin/newsletter/store";;
		return view('newsletter.index')->with('data',$newsletter_content)->with($view);
	}
	
	public function store(Request $request)
	{	
		$cekid  = $this->newsletter->get_id();
		if($cekid == NULL){
			$newsletter_id                       	= '1';
			$newsletter_content                  	= $request->input('newsletter_content');
			$insert['newsletter_id']            	= $newsletter_id;
			$insert['newsletter_content']        	= $newsletter_content;
			$insert['created_at']               	= date('Y-m-d H:i:s');
			$ids = $this->newsletter->add($insert);
			if($ids > 0){
				$request->session()->flash('notip','<div class="alert alert-success">Data added successful</div>');
				$request->session()->flash('newsletter_content', NULL);
				return redirect('/admin/newsletter');
			}else{
				$request->session()->flash('newsletter_content',$newsletter_content);
				$request->session()->flash('notip','<div class="alert alert-danger">Add data failed, please try again</div>');
				return redirect('/admin/newsletter');
			}
		}else{
			$newsletter_id                       	= '1';
			$newsletter_content                  	= $request->input('newsletter_content');
			$insert['newsletter_id']             	= $newsletter_id;
			$insert['newsletter_content']        	= $newsletter_content;
			$insert['updated_at']               	= date('Y-m-d H:i:s');
			if($this->newsletter->edit($insert)){
                $request->session()->flash('notip','<div class="alert alert-success">Data updated successful</div>');
                $request->session()->flash('newsletter_content', NULL);
                return redirect('admin/newsletter');
            }else{
                $request->session()->flash('newsletter_content',$newsletter_content);
                $request->session()->flash('notip','<div class="alert alert-danger">Update data failed, please try again</div>');
                return redirect('/admin/newsletter');            
            }
		}
	}
}