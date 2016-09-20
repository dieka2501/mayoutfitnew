<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\product;
use App\category;
use App\provinsi;
use App\order;
use App\orderDetail;
class checkoutController extends Controller
{
    function __construct(){
        date_default_timezone_set('Asia/Jakarta') ;  
        $this->category     = new category;
        $this->provinsi     = new provinsi;
        $this->order        = new order;
        $this->od           = new orderDetail;
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $count = count(session('cart.idproduct'));
        // var_dump($count);
        if($count > 0){
            $getprovinsi = $this->provinsi->get_all('nama_provinsi','ASC');
            $arr_provinsi = [''=>'-- Pilih Provinsi --'];
            foreach ($getprovinsi as $prov) {
                $arr_provinsi[$prov->id] =  $prov->nama_provinsi;
            }
            $view['arr_provinsi'] = $arr_provinsi;
            $view['id_provinsi']  = session('id_provinsi');

            $view['arr_kota']     = [''=>'-- Pilih Kota --'];
            $view['id_kota']      = session('id_kota');

            $view['arr_kecamatan']= [''=>'-- Pilih Kecamatan --'];
            $view['id_kecamatan'] = session('id_kecamatan');

            $view['arr_type']   = [''=>'-- Pilih Pengriman --'];
            $view['type_kirim'] = session('type_kirim');            
            return view('front.delivery.page',$view);    
        }else{
            return redirect('/new');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('mail.checkout');
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
        $cart                   = session('cart');
        $order_name             = $request->input('order_name');
        $order_address          = $request->input('order_address');
        $order_phone            = $request->input('order_phone');
        $order_email            = $request->input('order_email');
        $beda_alamat            = $request->input('beda_alamat');
        $order_shipment_name    = $request->input('order_shipment_name');
        $order_shipment_address = $request->input('order_shipment_address');
        $order_shipment_phone   = $request->input('order_shipment_phone');
        $order_shipment_zip     = $request->input('order_shipment_zip');
        $id_provinsi            = $request->input('id_provinsi');
        $id_kota                = $request->input('id_kota');
        $id_kecamatan           = $request->input('id_kecamatan');
        $subtotal               = $request->input('hidsubtotal');
        $ongkir                 = $request->input('type_kirim');
        $grandtotal             = $request->input('grandtotal');
        $order_note             = $request->input('order_note');
        $uniqid                 = substr(strtoupper(md5($order_name.date('YmdHis'))), -7);
        $insert['order_code']               = $uniqid;
        $insert['order_name']               = $order_name;
        $insert['order_phone']              = $order_phone;
        $insert['order_address']            = $order_address;
        $insert['order_email']              = $order_email;
        $insert['province_id']              = $id_provinsi;
        $insert['city_id']                  = $id_kota;
        $insert['district_id']              = $id_kecamatan;
        $insert['order_total']              = $grandtotal;
        $insert['order_shipment_name']      = $order_shipment_name;
        $insert['order_shipment_phone']     = $order_shipment_phone;
        $insert['order_shipment_address']   = $order_shipment_address;
        $insert['order_shipment_zip']       = $order_shipment_zip;
        $insert['order_shipment_price']     = $ongkir;
        $insert['order_note']               = $order_note;        
        $insert['created_at']               = date('Y-m-d H:i:s');
        $ids = $this->order->add($insert);
        if($ids > 0){
            $count          = count(session('cart.idproduct'));
            $idproduct      = session('cart.idproduct');
            $productname    = session('cart.name');
            $productprice   = session('cart.price');
            $productcode    = session('cart.code');
            $productimage   = session('cart.image');
            $productqty     = session('cart.qty');
            for($dd = 0;$dd < $count ; $dd++){
                $subtot                         = $productprice[$dd] * $productqty[$dd];
                $detail['order_id']             = $ids;
                $detail['product_id']           = $idproduct[$dd];
                $detail['order_detail_price']   = $productprice[$dd];
                $detail['order_detail_qty']     = $productqty[$dd];
                $detail['order_detail_subtotal']= $subtot;
                $detail['created_at']           = date('Y-m-d H:i:s');
                $this->od->add($detail);
                

            }
            $request->session()->forget('cart');
            $view['idorder']    = $ids;
            $view['order_code'] = $uniqid;
            $view['grandtotal'] = $grandtotal;
            $view['url']        = config('app.url')."public/payment/do";
            return view('front.checkout.success',$view);
        }

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
