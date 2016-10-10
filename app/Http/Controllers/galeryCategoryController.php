<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\category;
use App\product;
use App\galery;
class galeryCategoryController extends Controller
{
	function __construct(){
        date_default_timezone_set('Asia/Jakarta');
        $this->product      = new product;
        $this->category     = new category;
        $this->galery       = new galery;
        $getcategory        = $this->category->get_all('category_name','ASC');
        $arr_cat            = [];
        foreach ($getcategory as $cats) {
            $arr_cat[$cats->idcategory] = $cats->category_name;
        }
        // $share['']
        view()->share('list_category',$arr_cat);
        view()->share('count',count(session('cart.idproduct')));
        view()->share('idproduct',session('cart.idproduct'));
        view()->share('name',session('cart.name'));
        view()->share('price',session('cart.price'));
        view()->share('code',session('cart.code'));
        view()->share('image',session('cart.image'));
        view()->share('qty',session('cart.qty'));
    }

    public function index(Request $request,$id)
    {
        if($request->has('sort') && $request->has('order') && $request->has('sort_name')){
            $sort        = $request->input('sort');
            $sort_name   = $request->input('sort_name');
            $order       = $request->input('order');

        }else{
            $sort       = 'created_at';
            $order      = "DESC";
            $sort_name  = "terbaru";
        }
        $getdata             = $this->galery->get_page_category_front($sort,$order,$id);
        $view['list']        = $getdata;
        $view['sort_name']   = $sort_name;
        $view['sort']        = $sort;
        $view['order']       = $order;
        return view('front.galery.list',$view);
    }
}