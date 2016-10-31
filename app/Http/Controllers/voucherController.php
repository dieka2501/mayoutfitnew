<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\voucher;

class voucherController extends Controller
{
	function __construct(){
        date_default_timezone_set('Asia/Jakarta');
        $this->middleware('auth');
        view()->share('username',session('username'));
        view()->share('role',session('role'));
        view()->share('name',session('name'));
        view()->share('email',session('email'));
        view()->share('date_register',session('date_register'));  
        $this->voucher      = new voucher;
    }

    public function index(Request $request)
    {
        if($request->has('cari')){
            $cari       = $request->input('cari');
            $getdata    = $this->voucher->get_search($cari);
        }else{
            $cari       = "";
            $getdata    = $this->voucher->get_page();
        }

        $view['list']       = $getdata;
        $view['notip']      = session('notip');
        $view['cari']       = $cari;
        $view['url']        = config('app.url').'public/admin/voucher';
        return view('voucher.index',$view);
    }

    public function create()
    {
        $voucher_code                   = session('voucher_code');
        $voucher_discount               = (session('voucher_discount') != NULL ) ? session('voucher_discount'): 0;
        $voucher_status                 = session('voucher_status');
        $view['url']                    = config('app.url')."public/admin/voucher/add";
        $view['notip']                  = session('notip');
        $view['voucher_code']           = $voucher_code;
        $view['voucher_discount']       = $voucher_discount;
        $view['voucher_status']         = $voucher_status;
        return view('voucher.add',$view);
    }

    public function store(Request $request)
    {
        $voucher_code                       = $request->input('voucher_code');
        $voucher_discount                   = $request->input('voucher_discount');
        $voucher_status                     = $request->input('voucher_status');
        $insert['voucher_code']             = $voucher_code;
        $insert['voucher_discount']         = $voucher_discount;
        $insert['voucher_status']           = $voucher_status;
        $insert['created_at']               = date('Y-m-d H:i:s');

        $cekvouchercode  = $this->voucher->get_vouchercode($voucher_code);
        if($cekvouchercode == NULL){
            $ids = $this->voucher->add($insert);
            if($ids > 0){
                $request->session()->flash('notip','<div class="alert alert-success">Data added successful</div>');
                return redirect('/admin/voucher');
            }else{
                $request->session()->flash('voucher_code',$voucher_code);
                $request->session()->flash('voucher_discount',$voucher_discount);
                $request->session()->flash('voucher_status',$voucher_status);
                $request->session()->flash('notip','<div class="alert alert-danger">Add data failed, please try again</div>');
                return redirect('/admin/voucher/add');            
            }
        }else{
            $request->session()->flash('voucher_code',$voucher_code);
            $request->session()->flash('voucher_discount',$voucher_discount);
            $request->session()->flash('voucher_status',$voucher_status);
            $request->session()->flash('notip','<div class="alert alert-danger">Add data failed, voucher code is already</div>');
            return redirect('/admin/voucher/add');
        }
    }

    public function edit($id)
    {
        $getdata                        = $this->voucher->get_id($id);
        $voucher_code                   = $getdata->voucher_code;
        $voucher_discount               = $getdata->voucher_discount;
        $voucher_status                 = $getdata->voucher_status;
        $view['idvoucher']              = $id;
        $view['voucher_code']           = $voucher_code;
        $view['voucher_discount']       = $voucher_discount;
        $view['voucher_status']         = $voucher_status;
        $view['url']                    = config('app.url')."public/admin/voucher/edit";
        $view['notip']                  = session('notip');
        return view('voucher.edit',$view);
    }

    public function update(Request $request)
    {
        $ids                                = $request->input('idvoucher');
        $voucher_code                       = $request->input('voucher_code');
        $voucher_discount                   = $request->input('voucher_discount');
        $voucher_status                     = $request->input('voucher_status');
        $insert['voucher_code']             = $voucher_code;
        $insert['voucher_discount']         = $voucher_discount;
        $insert['voucher_status']           = $voucher_status;
        $insert['updated_at']               = date('Y-m-d H:i:s');

        // $cekvouchercode  = $this->voucher->get_vouchercode($voucher_code);
        if(true){
            if($this->voucher->edit($ids,$insert)){
                $request->session()->flash('notip','<div class="alert alert-success">Data updated successful</div>');
                return redirect('admin/voucher');
            }else{
                $request->session()->flash('voucher_code',$voucher_code);
                $request->session()->flash('voucher_discount',$voucher_discount);
                $request->session()->flash('voucher_status',$voucher_status);
                $request->session()->flash('notip','<div class="alert alert-danger">Update data failed, please try again</div>');
                return redirect('/admin/voucher/edit/'.$ids);            
            }
        }else{
            $request->session()->flash('voucher_code',$voucher_code);
            $request->session()->flash('voucher_discount',$voucher_discount);
            $request->session()->flash('voucher_status',$voucher_status);
            $request->session()->flash('notip','<div class="alert alert-danger">Update data failed, voucher code is already</div>');
            return redirect('/admin/voucher/edit/'.$ids);
        }
    }

    public function destroy(Request $request, $id)
    {
        $delete['idvoucher']           = $id;
        $delete['deleted_at']          = date('Y-m-d H:i:s');
        $this->voucher->edit($id,$delete);
        $request->session()->flash('notip','<div class="alert alert-danger">Delete data success</div>');
        return redirect('/admin/voucher');
    }
    
}