<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\orderDetail;
use PDF;
class reportOrderController extends Controller
{
    function __construct(){
        date_default_timezone_set('Asia/Jakarta');
        $this->middleware('auth');
        view()->share('username',session('username'));
        view()->share('role',session('role'));
        view()->share('name',session('name'));
        view()->share('email',session('email'));
        view()->share('date_register',session('date_register'));  
        $this->od = new orderDetail;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('date_start') && $request->has('date_end')){
            $date_start = $request->input('date_start');
            $date_end   = $request->input('date_end');
        }else{
            $date_start = date('Y-m-01');
            $date_end   = date('Y-m-31');
        }
        $getdata            = $this->od->get_page($date_start,$date_end);
        $view['order']      = $getdata;
        $view['url']        = config('app.url').'public/admin/report/order/print';
        $view['date_start'] = $date_start;
        $view['date_end']   = $date_end;
        return view('report_order.index',$view);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        if($request->has('date_start') && $request->has('date_end')){
            $date_start = $request->input('date_start');
            $date_end   = $request->input('date_end');
        }else{
            $date_start = date('Y-m-01');
            $date_end   = date('Y-m-31');
        }
        $getdata            = $this->od->get_all($date_start,$date_end);
        $view['report']     = $getdata;
        $view['date_start'] = $date_start;
        $view['date_end']   = $date_end;
        // return view('pdf.reportOrder',$view);
        $pdf = PDF::loadView('pdf.reportOrder', $view);
        return $pdf->stream('report_order.pdf');


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
