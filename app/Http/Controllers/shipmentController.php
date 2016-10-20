<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\shipment;
use App\order;
class shipmentController extends Controller
{
    function __construct(){
        date_default_timezone_set("Asia/Jakarta");
        $this->shipment = new shipment;
        $this->order    = new order;
    }

    function add_shipment(Request $request){
        $order_id              = $request->input('order_id');
        $order_code            = $request->input('order_code');
        $shipment_no_resi      = $request->input('shipment_no_resi');
        $shipment_date         = $request->input('shipment_date');
        $shipment_name         = $request->input('shipment_name');
        $shipment_note         = $request->input('shipment_note');
        $insert['order_id']            = $order_id;
        $insert['shipment_no_resi']    = $shipment_no_resi;
        $insert['shipment_date']       = $shipment_date;
        $insert['shipment_name']       = $shipment_name;
        $insert['shipment_note']       = $shipment_note;
        $insert['created_at']          = date('Y-m-d H:i:s');
        $this->shipment->add($insert);
        $this->order->edit($order_id,['order_status'=>2]);
        return redirect('/admin/order');
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Respodanse
     */
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
