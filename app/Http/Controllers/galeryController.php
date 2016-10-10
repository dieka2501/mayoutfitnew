<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\product;
use App\category;
use App\galery;

class galeryController extends Controller
{
	function __construct(){
		date_default_timezone_set('Asia/Jakarta');
        $this->middleware('auth');
        view()->share('username',session('username'));
        view()->share('role',session('role'));
        view()->share('name',session('name'));
        view()->share('email',session('email'));
        view()->share('date_register',session('date_register'));  
        $this->galery      = new galery;
        $this->product      = new product;
        $this->category     = new category;
        $this->path         = public_path().'/upload/';
	}

	public function index(Request $request)
    {
        if($request->has('cari')){
            $cari       = $request->input('cari');
            $getdata    = $this->galery->get_search($cari);    
        }else{
            $cari       = "";
            $getdata    = $this->galery->get_page();
        }
        
        $view['list']       = $getdata;
        $view['cari']       = $cari;
        $view['notip']      = session('notip');
        $view['url']        = config('app.url').'public/admin/galeries';
        return view('galeries.index',$view);
    }

    public function create()
    {
        $getproduct          = $this->product->get_all('product_name','ASC');
        $galery_name         = session('galery_name');
        $galery_image        = session('galery_image');
        $galery_status       = 1;
        $product_id        	 = session('product_id');
        $arr_product['']     =  "-- Select Product --";
        foreach ($getproduct as $products) {
           $arr_product[$products->idproduct] = $products->product_name;
        }
        $view['url']                   = config('app.url')."public/admin/galeries/add";
        $view['notip']                 = session('notip');
        $view['galery_name']           = $galery_name;
        $view['galery_image']          = $galery_image;
        $view['galery_status']         = 1;
        $view['product_id']            = $product_id;
        $view['arr_product']           = $arr_product;
        return view('galeries.add',$view);
    }

    public function store(Request $request)
    {
        $galery_name         = $request->input('galery_name');
        $galery_status       = 1;
        $product_id          = $request->input('product_id');
        if($request->hasFile('galery_image')){
            $image      = $request->file('galery_image');
            $ext        = $image->getClientOriginalExtension();
            $image_name = date('YmdHis').rand(000,999).'.'.$ext;
            $image->move($this->path,$image_name);
            $insert['galery_image'] = $image_name;
        }
        $insert['galery_name']             = $galery_name;
        $insert['galery_status']           = 1;
        $insert['product_id']              = $product_id;
        $insert['created_at']              = date('Y-m-d H:i:s');
        $ids = $this->galery->add($insert);
        if($ids > 0){
            $request->session()->flash('notip','<div class="alert alert-success">Data added successful</div>');
            return redirect('/admin/galeries');
        }else{
            $request->session()->flash('galery_name',$galery_name);
            $request->session()->flash('galery_status',1);
            $request->session()->flash('product_id',$product_id);
            $request->session()->flash('notip','<div class="alert alert-danger">Add data failed, please try again</div>');
            return redirect('/admin/galeries/add');
        }

    }

    public function edit($id)
    {
        $getdata             = $this->galery->get_id($id);
        $getproduct          = $this->product->get_all('product_name','ASC');
        $galery_name         = $getdata->galery_name;
        $galery_image        = $getdata->galery_image;
        $galery_status       = 1;
        $product_id        	 = $getdata->product_id;
        $arr_product['']     =  "-- Select Product --";
        foreach ($getproduct as $products) {
           $arr_product[$products->idproduct] = $products->product_name;
        }
        $view['url']                   = config('app.url')."public/admin/galeries/edit";
        $view['notip']                 = session('notip');
        $view['ids']                   = $id;
        $view['galery_name']           = $galery_name;
        $view['galery_image'] 		   = $getdata->galery_image;
        $view['galery_status']         = 1;
        $view['product_id']            = $product_id;
        $view['arr_product']           = $arr_product;
        return view('galeries.edit',$view);
    }

    public function update(Request $request)
    {
        $ids                 = $request->input('ids');
        $galery_name         = $request->input('galery_name');
        $galery_status       = 1;
        $product_id          = $request->input('product_id');
        if($request->hasFile('galery_image')){
            $image      = $request->file('galery_image');
            $ext        = $image->getClientOriginalExtension();
            $image_name = date('YmdHis').rand(000,999).'.'.$ext;
            $image->move($this->path,$image_name);
            $insert['galery_image'] = $image_name;
        }
        $insert['galery_name']              = $galery_name;
        $insert['galery_status']            = 1;
        $insert['product_id']               = $product_id;
        $insert['updated_at']               = date('Y-m-d H:i:s');
        if($this->galery->edit($ids,$insert)){
            $request->session()->flash('notip','<div class="alert alert-success">Data update successful</div>');
            return redirect('/admin/galeries');
        }else{
            $request->session()->flash('galery_name',$galery_name);
            $request->session()->flash('galery_status',1);
            $request->session()->flash('product_id',$product_id);
            $request->session()->flash('notip','<div class="alert alert-danger">Update data failed, please try again</div>');
            return redirect('/admin/galeries/edit/'.$ids);
        }
    }

    public function destroy(Request $request, $id)
    {
    	$delete['id_galery']        = $id;
        $delete['galery_status']    = 0;
        $delete['deleted_at']       = date('Y-m-d H:i:s');
        $this->galery->edit($id,$delete);
        $request->session()->flash('notip','<div class="alert alert-danger">Delete data success</div>');
        return redirect('/admin/galeries');
    }
}