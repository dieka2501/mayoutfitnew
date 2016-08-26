<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\category;

class categoryController extends Controller
{
    function __construct(){
        date_default_timezone_set('Asia/Jakarta');
        $this->middleware('auth');
        view()->share('username',session('username'));
        view()->share('role',session('role'));
        view()->share('name',session('name'));
        view()->share('email',session('email'));
        view()->share('date_register',session('date_register'));
        $this->category = new category;
        $this->path     = public_path().'/upload/';
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
            $getdata    = $this->category->get_search($cari);    
        }else{
            $cari       = "";
            $getdata    = $this->category->get_page();
        }
        
        $view['list']       = $getdata;
        $view['cari']       = $cari;
        $view['notip']      = session('notip');
        $view['url']        = config('app.url').'public/admin/categories';
        return view('categories.index',$view);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view['category_name']  = session('category_name');
        $view['notip']          = session('notip');
        $view['url']            = config('app.url')."public/admin/categories/add";
        return view('categories.add',$view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $category_name = $request->input('category_name');
        if($request->hasFile('category_image')){
            $image      = $request->file('category_image');
            $ext        = $image->getClientOriginalExtension();
            $image_name = date('YmdHis').rand(000,999).'.'.$ext;
            $image->move($this->path,$image_name);
            $insert['category_image'] = $image_name;
        }
        $insert['category_name']    = $category_name;
        $insert['created_at']       = date('Y-m-d H:i:s');
        $ids    = $this->category->add($insert);
        if($ids > 0){
            $request->session()->flash('notip','<div class="alert alert-success">Data added successful</div>');
            return redirect('/admin/categories');
        }else{
            $request->session()->flash('notip','<div class="alert alert-danger">Add data failed, please try again</div>');
            $request->session()->flash('category_name',$category_name);
            return redirect('/admin/categories/add');
        }

        //

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
        $getdata                = $this->category->get_id($id);
        // var_dump($getdata);die;
        $view['category_name']  = $getdata->category_name;
        $view['id']             = $id;
        $view['notip']          = session('notip');
        $view['category_image'] = $getdata->category_image;
        $view['url']            = config('app.url').'public/admin/categories/edit';
        return view('categories.edit',$view);
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
        $id             = $request->input('ids');
        $category_name  = $request->input('category_name');
        if($request->hasFile('category_image')){
            $image      = $request->file('category_image');
            $ext        = $image->getClientOriginalExtension();
            $image_name = date('YmdHis').rand(000,999).'.'.$ext;
            $image->move($this->path,$image_name);
            $insert['category_image'] = $image_name;
        }
        $insert['category_name']    = $category_name;
        $insert['created_at']       = date('Y-m-d H:i:s');
        // $ids    = $this->category->add($insert);
        if($this->category->edit($insert,$id)){
            $request->session()->flash('notip','<div class="alert alert-success">Data updated successful</div>');
            return redirect('/admin/categories');
        }else{
            $request->session()->flash('notip','<div class="alert alert-danger">Update data failed, please try again</div>');
            $request->session()->flash('category_name',$category_name);
            return redirect('/admin/categories/edit/'.$id);
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
        $this->category->edit(['category_status'=>0,'deleted_at'=>date('Y-m-d H:i:s')],$id);
        $request->session()->flash('notip','<div class="alert alert-danger">Delete data success</div>');
        return redirect('/admin/categories');

    }
}
