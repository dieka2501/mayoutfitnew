<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\category;
use App\payment;
use App\order;
class paymentController extends Controller
{
    function __construct(){
        date_default_timezone_set('Asia/Jakarta');
        $this->category     = new category;
        $this->payment      = new payment;
        $this->order        = new order;
        $getcategory        = $this->category->get_all('category_name','ASC');
        $arr_cat            = [];
        foreach ($getcategory as $cats) {
            $arr_cat[$cats->idcategory] = $cats->category_name;
        }
        view()->share('list_category',$arr_cat);
        view()->share('count',count(session('cart.idproduct')));
        view()->share('idproduct',session('cart.idproduct'));
        view()->share('name',session('cart.name'));
        view()->share('price',session('cart.price'));
        view()->share('code',session('cart.code'));
        view()->share('image',session('cart.image'));
        view()->share('qty',session('cart.qty'));
        $this->path         = public_path().'/upload/payment/';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $view['url']        = config('app.url')."public/payment/do";
        return view('front.payment.page',$view);
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
        $order_id                 = $request->input('order_id');
        $payment_name             = $request->input('payment_name');
        $payment_no_ref           = $request->input('payment_no_ref');
        $payment_nominal          = $request->input('payment_nominal');
        $payment_bank_transfer    = $request->input('payment_bank_transfer');
        if($request->hasFile('payment_image')){
            $payment_image  = $request->file('payment_image');
            $ext            = $payment_image->getClientOriginalExtension();
            $filename       = date('YmdHis').'.'.$ext;
            $payment_image->move($this->path,$filename);
            $insert['payment_image'] = $filename;
        }
        $insert['order_id']               = $order_id;
        $insert['payment_name']           = $payment_name;
        $insert['payment_no_ref']         = $payment_no_ref;
        $insert['payment_nominal']        = $payment_nominal;
        $insert['payment_bank_transfer']  = $payment_bank_transfer;
        $insert['created_at']             = date('Y-m-d H:i:s');
        $this->payment->add($insert);
        $this->order->edit($order_id,['order_status'=>1]);
        return view('front.payment.final');

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
