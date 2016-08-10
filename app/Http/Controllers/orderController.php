<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\order;
use App\provinsi; 
class orderController extends Controller
{
    function __construct(){
        date_default_timezone_set('Asia/Jakarta');
        $this->middleware('auth');
        view()->share('username',session('username'));
        view()->share('role',session('role'));
        view()->share('name',session('name'));
        view()->share('email',session('email'));
        view()->share('date_register',session('date_register'));  
        $this->order        = new order;
        $this->provinsi     = new provinsi;
        // $this->product      = new product;
        // $this->category     = new category;
        $this->path         = public_path().'/upload/';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_data           = $this->order->get_page();
        $view['list']       = $get_data;
        return view('order.index',$view);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $getuniqueid        = $this->order->get_order_today();
        $cuniqueid          = count($getuniqueid);
        $get_provinsi       = $this->provinsi->get_all('nama_provinsi','ASC');
        $arr_provinsi[]     = "-- Select Province -- "; 
        foreach ($get_provinsi as $prov) {
            $arr_provinsi[$prov->id]    = $prov->nama_provinsi;
        }
        $arr_kota[]         = "-- Select City -- "; 
        $arr_kecamatan[]    = "-- Select District -- "; 
        $nextid                     = $cuniqueid+1;
        $view['uniqid']             = sprintf("%1$03d",$nextid);
        $view['arr_provinsi']       = $arr_provinsi;
        $view['provinsi']           = session('provinsi');
        $view['arr_kota']           = $arr_kota;
        $view['kota']               = session('city');
        $view['arr_kecamatan']      = $arr_kecamatan;
        $view['kecamatan']          = session('district');


        return view('order.add',$view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
