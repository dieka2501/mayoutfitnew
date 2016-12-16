<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\order;
class dashboardController extends Controller
{
    function __construct(){
        date_default_timezone_set('Asia/Jakarta');
        $this->middleware('auth');
        view()->share('username',session('username'));
        view()->share('role',session('role'));
        view()->share('name',session('name'));
        view()->share('email',session('email'));
        view()->share('date_register',session('date_register'));
        $this->order = new order;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $date_start = date('Y-m-01 00:00:00');
        $date_end   = date('Y-m-31 23:59:59');
        $order_dibuat   = $this->order->get_order_status_date(0,$date_start,$date_end)->count();
        $order_dibayar  = $this->order->get_order_status_date(1,$date_start,$date_end)->count();
        $order_dikirim  = $this->order->get_order_status_date(2,$date_start,$date_end)->count();
        $order_selesai  = $this->order->get_order_status_date(3,$date_start,$date_end)->count();
        $order_gagal    = $this->order->get_order_status_date(5,$date_start,$date_end)->count();
        $semua          = $order_dibuat + $order_dibayar + $order_dikirim + $order_selesai + $order_gagal;
        $view           = ['dibuat'=>$order_dibuat,'dibayar'=>$order_dibayar,'dikirim'=>$order_dikirim,'selesai'=>$order_selesai,'gagal'=>$order_gagal,'semua'=>$semua];
        return view('dashboard.page',$view);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
