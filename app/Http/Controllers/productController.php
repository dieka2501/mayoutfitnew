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
    public function index()
    {
        $getdata            = $this->product->get_page();
        $view['list']       = $getdata;
        $view['notip']      = session('notip');
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
        $view['product_code']         = $product_code;
        $view['product_description']   = $product_description;
        $view['category_id']           = $category_id;
        $view['arr_category']          = $arr_category;
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
            $request->session()->flash('product_margin',$product_margin);
            $request->session()->flash('product_stock',$product_stock);
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
    public function show($id)
    {
        //
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
        $product_description = $getdata->product_description;
        $category_id         = $getdata->category_id;
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
        $view['product_code']         = $product_code;
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
        $insert['product_description']      = $product_description;
        $insert['category_id']              = $category_id;
        $insert['created_at']               = date('Y-m-d H:i:s');
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
