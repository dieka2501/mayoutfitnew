<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\memberType;

class memberTypeController extends Controller
{
	function __construct(){
        date_default_timezone_set('Asia/Jakarta');
        $this->middleware('auth');
        view()->share('username',session('username'));
        view()->share('role',session('role'));
        view()->share('name',session('name'));
        view()->share('email',session('email'));
        view()->share('date_register',session('date_register'));  
        $this->memberType      = new memberType;
    }

    public function index(Request $request)
    {
        if($request->has('cari')){
            $cari       = $request->input('cari');
            $getdata    = $this->memberType->get_search($cari);    
        }else{
            $cari       = "";
            $getdata    = $this->memberType->get_page();
        }

        $view['list']       = $getdata;
        $view['notip']      = session('notip');
        $view['cari']       = $cari;
        $view['url']        = config('app.url').'public/admin/membertype';
        return view('membertype.index',$view);
    }

    public function create()
    {
        $membertype_name                = session('membertype_name');
        $membertype_status              = session('membertype_status');
        $view['url']                    = config('app.url')."public/admin/membertype/add";
        $view['notip']                  = session('notip');
        $view['membertype_name']        = $membertype_name;
        $view['membertype_status']      = $membertype_status;
        return view('membertype.add',$view);
    }

    public function store(Request $request)
    {
        $membertype_name                    = $request->input('membertype_name');
        $membertype_status                  = $request->input('membertype_status');
        $insert['membertype_name']          = $membertype_name;
        $insert['membertype_status']        = $membertype_status;
        $insert['created_at']               = date('Y-m-d H:i:s');

        $cekmembertype  = $this->memberType->get_membertype($membertype_name);
        if($cekmembertype == NULL){
            $ids = $this->memberType->add($insert);
            if($ids > 0){
                $request->session()->flash('notip','<div class="alert alert-success">Data added successful</div>');
                return redirect('/admin/membertype');
            }else{
                $request->session()->flash('membertype_name',$membertype_name);
                $request->session()->flash('membertype_status',$membertype_status);
                $request->session()->flash('notip','<div class="alert alert-danger">Add data failed, please try again</div>');
                return redirect('/admin/membertype/add');            
            }
        }else{
            $request->session()->flash('membertype_name',$membertype_name);
            $request->session()->flash('membertype_status',$membertype_status);
            $request->session()->flash('notip','<div class="alert alert-danger">Add data failed, Member Type is already</div>');
            return redirect('/admin/membertype/add');
        }
    }

    public function edit($id)
    {
        $getdata                        = $this->memberType->get_id($id);
        $membertype_name                = $getdata->membertype_name;
        $membertype_status              = $getdata->membertype_status;
        $view['idmembertype']           = $id;
        $view['membertype_name']        = $membertype_name;
        $view['membertype_status']      = $membertype_status; 
        $view['url']                    = config('app.url')."public/admin/membertype/edit";
        $view['notip']                  = session('notip');
        return view('membertype.edit',$view);
    }

    public function update(Request $request)
    {
        $ids                                = $request->input('idmembertype');
        $membertype_name                    = $request->input('membertype_name');
        $membertype_status                  = $request->input('membertype_status');
        $insert['membertype_name']          = $membertype_name;
        $insert['membertype_status']        = $membertype_status;
        $insert['updated_at']               = date('Y-m-d H:i:s');

        $cekmembertype  = $this->memberType->get_membertype($membertype_name);
        if($cekmembertype == NULL){
            if($this->memberType->edit($ids,$insert)){
                $request->session()->flash('notip','<div class="alert alert-success">Data added successful</div>');
                return redirect('/admin/membertype');
            }else{
                $request->session()->flash('membertype_name',$membertype_name);
                $request->session()->flash('membertype_status',$membertype_status);
                $request->session()->flash('notip','<div class="alert alert-danger">Add data failed, please try again</div>');
                return redirect('/admin/membertype/edit/'.$ids);            
            }
        }else{
            $request->session()->flash('membertype_name',$membertype_name);
            $request->session()->flash('membertype_status',$membertype_status);
            $request->session()->flash('notip','<div class="alert alert-danger">Add data failed, Member Type is already</div>');
            return redirect('/admin/membertype/edit/'.$ids);
        }
    }

    public function destroy(Request $request, $id)
    {
        $delete['idmembertype']     = $id;
        $delete['deleted_at']       = date('Y-m-d H:i:s');
        $this->memberType->edit($id,$delete);
        $request->session()->flash('notip','<div class="alert alert-danger">Delete data success</div>');
        return redirect('/admin/membertype');
    }
    
}