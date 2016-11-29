<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\product;
use App\category;
class productController extends Controller
{
    function __construct(){
        date_default_timezone_set('Asia/Jakarta');
        $this->middleware('auth');
        view()->share('username',session('username'));
        view()->share('role',session('role'));
        view()->share('name',session('name'));
        view()->share('email',session('email'));
        view()->share('date_register',session('date_register'));  
        $this->product      = new product;
        $this->category     = new category;
        $this->path         = public_path().'/upload/';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('cari')){
            $cari       = $request->input('cari');
            $getdata    = $this->product->get_search($cari);    
        }else{
            $cari       = "";
            $getdata    = $this->product->get_page();
        }
        // $getdata            = $this->product->get_page();
        $view['list']       = $getdata;
        $view['notip']      = session('notip');
        $view['cari']       = $cari;
        $view['url']        = config('app.url').'public/admin/product';
        return view('product.index',$view);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getcategory         = $this->category->get_all('category_name','ASC');
        $product_name        = session('product_name');
        $product_price       = (session('product_price') != NULL ) ? session('product_price'): 0;
        $product_hpp         = (session('product_hpp') != NULL) ?session('product_hpp') :0 ;
        $product_margin      = (session('product_margin') != NULL) ? session('product_margin'):0;
        $product_stock       = session('product_stock');
        $product_code        = session('product_code');
        $product_description = session('product_description');
        $category_id         = session('category_id');
        $product_price_sale  = (session('product_price_sale') != NULL ) ? session('product_price'): 0;
        $product_sale        = session('product_sale');
        $product_status      = session('product_status');
        $product_weight      = session('product_weight');
        $arr_category['']    =  "-- Select category --";
        foreach ($getcategory as $categories) {
           $arr_category[$categories->idcategory] = $categories->category_name;
        }
        $view['url']                   = config('app.url')."public/admin/product/add";
        $view['notip']                 = session('notip');
        $view['product_name']          = $product_name;
        $view['product_price']         = $product_price;
        $view['product_hpp']           = $product_hpp;
        $view['product_margin']        = $product_margin;
        $view['product_stock']         = $product_stock;
        $view['product_code']          = $product_code;
        $view['product_weight']        = $product_weight;
        $view['product_description']   = $product_description;
        $view['category_id']           = $category_id;
        $view['arr_category']          = $arr_category;
        $view['product_sale']          = $product_sale;
        $view['product_price_sale']    = $product_price_sale;
        $view['product_status']        = $product_status;
        return view('product.add',$view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_name        = $request->input('product_name');
        $product_price       = $request->input('product_price');
        $product_hpp         = $request->input('product_hpp');
        $product_margin      = $request->input('product_margin');
        $product_stock       = $request->input('product_stock');
        $product_weight      = $request->input('product_weight');
        $product_sale        = $request->input('product_sale');
        $product_price_sale  = $request->input('product_price_sale');
        $product_status      = $request->input('product_status');
        $product_description = $request->input('product_description');
        $product_code        = $request->input('product_code');
        $category_id         = $request->input('category_id');
        if($request->hasFile('product_image')){
            $image      = $request->file('product_image');
            $ext        = $image->getClientOriginalExtension();
            $image_name = date('YmdHis').rand(000,999).'.'.$ext;
            $image->move($this->path,$image_name);
            $insert['product_image'] = $image_name;
        }
        $insert['product_name']             = $product_name;
        $insert['product_price']            = $product_price;
        $insert['product_code']             = $product_code;
        $insert['product_hpp']              = $product_hpp;
        $insert['product_margin']           = $product_margin;
        $insert['product_stock']            = $product_stock;
        $insert['product_weight']           = $product_weight;
        $insert['product_sale']             = $product_sale;
        $insert['product_price_sale']       = $product_price_sale;
        $insert['product_status']           = $product_status;
        $insert['product_description']      = $product_description;
        $insert['category_id']              = $category_id;
        $insert['created_at']               = date('Y-m-d H:i:s');
        $ids = $this->product->add($insert);
        if($ids > 0){
            $request->session()->flash('notip','<div class="alert alert-success">Data added successful</div>');
            return redirect('/admin/product');
        }else{
            $request->session()->flash('product_name',$product_name);
            $request->session()->flash('product_price',$product_price);
            $request->session()->flash('product_hpp',$product_hpp);
            $request->session()->flash('product_code',$product_code);
            $request->session()->flash('product_weight',$product_weight);
            $request->session()->flash('product_margin',$product_margin);
            $request->session()->flash('product_stock',$product_stock);
            $request->session()->flash('product_sale',$product_sale);
            $request->session()->flash('product_stock',$product_price_sale);
            $request->session()->flash('product_status',$product_status);
            $request->session()->flash('product_description',$product_description);
            $request->session()->flash('category_id',$category_id);
            $request->session()->flash('notip','<div class="alert alert-danger">Add data failed, please try again</div>');
            return redirect('/admin/product/add');
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addstock($id)
    {
        $getproduct                  = $this->product->get_id($id);
        $view['url']                 = config('app.url').'public/admin/product/stock/add';
        $view['product_name']        = $getproduct->product_name;
        $view['product_stock']       = $getproduct->product_stock;
        $view['idproduct']           = $getproduct->idproduct;
        return view('product.addstock',$view);
    }

    public function addstock_do(Request $request){
        $idproduct          = $request->input('idproduct');
        $stock              = $request->input('stock');
        $product_stock      = $request->input('product_stock');
        $newstock           = $product_stock + $stock;
        $this->product->edit($idproduct,['product_stock'=>$newstock]);
        session()->flash('notip','<div class="alert alert-success">Stock sudah ditambahkan</div>');
        return redirect('/admin/product/stock/add/'.$idproduct);
    }

    public function minstock($id)
    {
        $getproduct                  = $this->product->get_id($id);
        $view['url']                 = config('app.url').'public/admin/product/stock/min';
        $view['product_name']        = $getproduct->product_name;
        $view['product_stock']       = $getproduct->product_stock;
        $view['idproduct']           = $getproduct->idproduct;
        return view('product.minstock',$view);
    }

    public function minstock_do(Request $request){
        $idproduct          = $request->input('idproduct');
        $stock              = $request->input('stock');
        $product_stock      = $request->input('product_stock');
        $newstock           = $product_stock - $stock;
        $this->product->edit($idproduct,['product_stock'=>$newstock]);
        session()->flash('notip','<div class="alert alert-success">Stock sudah dikurangi</div>');
        return redirect('/admin/product/stock/min/'.$idproduct);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $getdata             = $this->product->get_id($id);
        $getcategory         = $this->category->get_all('category_name','ASC');
        $product_name        = $getdata->product_name;
        $product_price       = $getdata->product_price;
        $product_hpp         = $getdata->product_hpp;
        $product_margin      = $getdata->product_margin;
        $product_stock       = $getdata->product_stock;
        $product_code        = $getdata->product_code;
        $product_weight      = $getdata->product_weight;
        $product_description = $getdata->product_description;
        $category_id         = $getdata->category_id;
        $product_sale        = $getdata->product_sale;
        $product_price_sale  = $getdata->product_price_sale;
        $product_status      = $getdata->product_status;
        $arr_category['']    =  "-- Select category --";
        foreach ($getcategory as $categories) {
           $arr_category[$categories->idcategory] = $categories->category_name;
        }
        $view['url']                   = config('app.url')."public/admin/product/edit";
        $view['notip']                 = session('notip');
        $view['ids']                   = $id;
        $view['product_name']          = $product_name;
        $view['product_price']         = $product_price;
        $view['product_hpp']           = $product_hpp;
        $view['product_margin']        = $product_margin;
        $view['product_stock']         = $product_stock;
        $view['product_sale']          = $product_sale;
        $view['product_price_sale']    = $product_price_sale;
        $view['product_status']        = $product_status;
        $view['product_code']          = $product_code;
        $view['product_weight']        = $product_weight;
        $view['product_description']   = $product_description;
        $view['category_id']           = $category_id;
        $view['arr_category']          = $arr_category;
        return view('product.edit',$view);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $ids                 = $request->input('ids');
        $product_name        = $request->input('product_name');
        $product_price       = $request->input('product_price');
        $product_hpp         = $request->input('product_hpp');
        $product_margin      = $request->input('product_margin');
        $product_stock       = $request->input('product_stock');
        $product_weight      = $request->input('product_weight');
        $product_sale        = $request->input('product_sale');
        $product_price_sale  = $request->input('product_price_sale');
        $product_status      = $request->input('product_status');
        $product_description = $request->input('product_description');
        $product_code = $request->input('product_code');
        $category_id         = $request->input('category_id');
        if($request->hasFile('product_image')){
            $image      = $request->file('product_image');
            $ext        = $image->getClientOriginalExtension();
            $image_name = date('YmdHis').rand(000,999).'.'.$ext;
            $image->move($this->path,$image_name);
            $insert['product_image'] = $image_name;
        }
        $insert['product_name']             = $product_name;
        $insert['product_price']            = $product_price;
        $insert['product_code']             = $product_code;
        $insert['product_hpp']              = $product_hpp;
        $insert['product_margin']           = $product_margin;
        $insert['product_stock']            = $product_stock;
        $insert['product_weight']           = $product_weight;
        $insert['product_description']      = $product_description;
        $insert['category_id']              = $category_id;
        $insert['product_sale']             = $product_sale;
        $insert['product_price_sale']       = $product_price_sale;
        $insert['product_status']           = $product_status;
        $insert['updated_at']               = date('Y-m-d H:i:s');
        // $ids = $this->product->add($insert);
        if($this->product->edit($ids,$insert)){
            $request->session()->flash('notip','<div class="alert alert-success">Data update successful</div>');
            return redirect('/admin/product');
        }else{
            $request->session()->flash('product_name',$product_name);
            $request->session()->flash('product_price',$product_price);
            $request->session()->flash('product_hpp',$product_hpp);
            $request->session()->flash('product_code',$product_code);
            $request->session()->flash('product_margin',$product_margin);
            $request->session()->flash('product_stock',$product_stock);
            $request->session()->flash('product_weight',$product_weight);
            $request->session()->flash('product_description',$product_description);
            $request->session()->flash('category_id',$category_id);
            $request->session()->flash('notip','<div class="alert alert-danger">Update data failed, please try again</div>');
            return redirect('/admin/product/edit/'.$ids);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //
        $this->product->edit($id,['deleted_at'=>date('Y-m-d H:i:s')]);
        $request->session()->flash('notip','<div class="alert alert-danger">Delete data success</div>');
        return redirect('/admin/product');
    }
}
