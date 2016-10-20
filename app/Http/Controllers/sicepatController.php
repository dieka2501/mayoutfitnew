<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\curl;
class sicepatController extends Controller
{
    function __construct(){
        date_default_timezone_set("Asia/Jakarta");
        $this->curl = new curl;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function sicepat_get_waybill(Request $request){
        $orderid        = $request->input('orderId');    
        $key            = config('app.apikey');
        $url            = "http://api.sicepat.com/customer/waybillNumber?api-key=".$key.'&orderId='.$orderid;
        // Log::info($url);
        $data           = $this->curl->get($url);
        $json           = json_decode($data,true);
        return  response()->json($json);  
    }
    function sicepat_get_resi(Request $request){
        $resi           = $request->input('resi');
        $key            = config('app.apikey');
        $url            = "http://api.sicepat.com/customer/waybill?api-key=".$key.'&waybill='.$resi;
        // Log::info($url);
        $data           = $this->curl->get($url);
        $json           = json_decode($data,true);
        return  response()->json($json);  
    }

    public function index()
    {
        //
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
