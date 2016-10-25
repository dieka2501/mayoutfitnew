<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\customer;
use App\memberType;

class customerController extends Controller
{
	function __construct(){
        date_default_timezone_set('Asia/Jakarta');
        $this->middleware('auth');
        view()->share('username',session('username'));
        view()->share('role',session('role'));
        view()->share('name',session('name'));
        view()->share('email',session('email'));
        view()->share('date_register',session('date_register'));  
        $this->customer      = new customer;
        $this->memberType    = new memberType;
    }

    public function index(Request $request)
    {
        if($request->has('cari')){
            $cari       = $request->input('cari');
            $getdata    = $this->customer->get_search($cari);    
        }else{
            $cari       = "";
            $getdata    = $this->customer->get_page();
        }

        $view['list']       = $getdata;
        $view['notip']      = session('notip');
        $view['cari']       = $cari;
        $view['url']        = config('app.url').'public/admin/customer';
        return view('customer.index',$view);
    }

    public function historypayment($id)
    {
    	$getdata                        = $this->customer->get_detail($id);
    	$view['list']       		    = $getdata;
        return view('customer.history',$view);
    }

    public function edit($id)
    {
        $getdata                        = $this->customer->get_id($id);
        $getmembertype         			= $this->memberType->get_all('membertype_name','ASC');
        $customer_name                	= $getdata->customer_name;
        $customer_address              	= $getdata->customer_address;
        $customer_city              	= $getdata->customer_city;
        $customer_member              	= $getdata->customer_member;
        $arr_membertype['']    			=  "-- Select Member Type --";
        foreach ($getmembertype as $mtype) {
           $arr_membertype[$mtype->idmembertype] = $mtype->membertype_name;
        }
        $view['idcustomer']           	= $id;
        $view['customer_name']        	= $customer_name;
        $view['customer_address']      	= $customer_address; 
        $view['customer_city']        	= $customer_city;
        $view['customer_member']      	= $customer_member; 
        $view['arr_membertype']         = $arr_membertype;
        $view['url']                    = config('app.url')."public/admin/customer/changemember";
        $view['notip']                  = session('notip');
        return view('customer.edit',$view);
    }

    public function updatemember(Request $request)
    {
        $ids                 	 			= $request->input('idcustomer');
        $customer_name                		= $request->input('customer_name');
        $customer_address              		= $request->input('customer_address');
        $customer_city              		= $request->input('customer_city');
        $customer_member         			= $request->input('customer_member');
        $insert['customer_member']          = $customer_member;
        $insert['updated_at']               = date('Y-m-d H:i:s');

        if($this->customer->edit($ids,$insert)){
            $request->session()->flash('notip','<div class="alert alert-success">Data update successful</div>');
            return redirect('/admin/customer');
        }else{
            $request->session()->flash('customer_name',$customer_name);
            $request->session()->flash('customer_address',$customer_address);
            $request->session()->flash('customer_city',$customer_city);
            $request->session()->flash('customer_member',$customer_member);
            $request->session()->flash('notip','<div class="alert alert-danger">Update data failed, please try again</div>');
            return redirect('/admin/customer/changemember/'.$ids);
        }
    }

    public function resetpassword(Request $request,$id)
    {
    	$ids                 	 			= $id;
    	$password							= "12345";
    	$insert['customer_password']        = \Hash::make($password);
    	$insert['updated_at']               = date('Y-m-d H:i:s');

        $this->customer->edit($id,$insert);
        $request->session()->flash('notip','<div class="alert alert-danger">Reset password successful. New Password is 12345</div>');
        return redirect('/admin/customer');
    }

}