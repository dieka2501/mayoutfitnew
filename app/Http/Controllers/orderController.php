<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\order;
use App\orderDetail;
use App\provinsi; 
use App\product; 
use App\kota;
use App\kecamatan;
use App\ongkir;
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
        $this->od           = new orderDetail;
        $this->product      = new product;
        // $this->category     = new category;
        $this->path         = public_path().'/upload/';
        $this->kota         = new kota;
        $this->kecamatan    = new kecamatan;
        $this->ongkir       = new ongkir;
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
        $view['url']                = config('app.url')."public/admin/order/add";


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
        // var_dump($request->input());die;
        $order_name             = $request->input('order_name');
        $uniqid                 = $request->input('uniqid');
        $order_phone            = $request->input('order_phone');
        $order_shipment_name    = $request->input('order_shipment_name');
        $order_shipment_phone   = $request->input('order_shipment_phone');
        $order_note             = $request->input('order_note');        
        $product_name           = $request->input('product_name');
        $product_id             = $request->input('product_id');
        $order_detail_price     = $request->input('order_detail_price');
        $product_stock          = $request->input('product_stock');
        $order_detail_qty       = $request->input('order_detail_qty');
        $order_detail_diskon    = $request->input('order_detail_diskon');
        $subtotal               = $request->input('subtotal');
        $cdetail                = count($product_name);

        $provinsi               = $request->input('provinsi');
        $kota                   = $request->input('kota');
        $kecamatan              = $request->input('kecamatan');
        $order_address          = $request->input('order_address');
        $order_shipment_price   = $request->input('order_shipment_price');
        $order_shipment_zip     = $request->input('order_shipment_zip');
        $weight                 = $request->input('weight');
        $diskon_total           = $request->input('diskon_total');
        $grand_total            = $request->input('grand_total');
        if($grand_total > 0 && $provinsi != 0 && $kota != 0 && $kecamatan != 0){
            $insert['order_code']               = date('Ymd').$uniqid;
            $insert['order_name']               = $order_name;
            $insert['order_phone']              = $order_phone;
            $insert['province_id']              = $provinsi;
            $insert['city_id']                  = $kota;
            $insert['district_id']              = $kecamatan;
            $insert['order_total']              = $grand_total;
            $insert['order_shipment_name']      = $order_shipment_name;
            $insert['order_shipment_phone']     = $order_shipment_phone;
            $insert['order_shipment_address']   = $order_address;
            $insert['order_shipment_zip']       = $order_shipment_zip;
            $insert['order_shipment_price']     = $order_shipment_price;
            $insert['order_note']               = $order_note;
            $insert['order_discount']           = $diskon_total;
            $insert['order_admin']              = session('username');
            $insert['created_at']               = date('Y-m-d H:i:s');
            $order_id   = $this->order->add($insert);
            for($i = 0; $i < $cdetail; $i++){
                $detail['order_id']                        = $order_id;
                $detail['product_id']                      = $product_id[$i];
                $detail['order_detail_price']              = $order_detail_price[$i];
                $detail['order_detail_discount_nominal']   = $order_detail_diskon[$i];
                $detail['order_detail_qty']                = $order_detail_qty[$i];
                $detail['created_at']                      = date('Y-m-d H:i:s');
                $this->od->add($detail);
                $getstock = $this->product->get_id($product_id[$i]);
                $newstock = $getstock->product_stock - $order_detail_qty[$i];
                $this->product->edit($product_id[$i],['product_stock'=>$newstock]);
            }
            $request->session()->flash('notip',"<div class='alert alert-success'>Order telah dibuat</div>");
            return redirect('/admin/order');

        }else{
            $request->session()->flash('notip',"<div class='alert alert-danger'> Alamat harus diisi</div>");
            return redirect('/admin/order/add');

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
    public function edit(Request $request,$id)
    {
        $getdata                = $this->order->get_id_join_loc($id);
        $getdetail              = $this->od->get_idorder($id);
        $get_provinsi           = $this->provinsi->get_all('nama_provinsi','ASC');
        $arr_provinsi[]         = "-- Select Province -- "; 
        foreach ($get_provinsi as $prov) {
            $arr_provinsi[$prov->id] = $prov->nama_provinsi;
        }

        $arr_kota[]             = "-- Select City --";
        $get_kota               = $this->kota->get_idprovinsi_all($getdata->province_id);
        foreach ($get_kota as $kotas) {
            $arr_kota[$kotas->id]            = $kotas->nama_kota; 
        }               

        $arr_kecamatan[]          = "-- Select District --";
        $get_kecamatan          = $this->kecamatan->get_idprovinsi_idkota_all($getdata->province_id,$getdata->city_id);
        foreach ($get_kecamatan as $kecamatans) {
            $arr_kecamatan[$kecamatans->id]            = $kecamatans->nama_kecamatan; 
        }

        $getongkir                          = $this->ongkir->get_ongkir($getdata->province_id,$getdata->city_id,$getdata->district_id); 
        $order['order_name']                = $getdata->order_name;
        $order['ids']                       = $getdata->idorder;
        $order['uniqid']                    = substr($getdata->order_code,-3);
        $order['order_phone']               = $getdata->order_phone;
        $order['order_shipment_name']       = $getdata->order_shipment_name;
        $order['order_shipment_phone']      = $getdata->order_shipment_phone;
        $order['order_shipment_address']    = $getdata->order_shipment_address;
        $order['order_shipment_zip']        = $getdata->order_shipment_zip;
        $order['order_shipment_price']      = $getdata->order_shipment_price;
        $order['weight']                    = (is_numeric($getdata->order_weight) && $getdata->order_weight!=0 )?$getdata->order_weight:1;
        $order['diskon_total']              = $getdata->order_discount;
        $order['grand_total']               = $getdata->order_total;
        $order['order_note']                = $getdata->order_note;
        $order['provinsi']                  = $getdata->province_id;
        $order['arr_provinsi']              = $arr_provinsi;
        $order['arr_kota']                  = $arr_kota;
        $order['arr_kecamatan']             = $arr_kecamatan;
        $order['kota']                      = $getdata->city_id;
        $order['kecamatan']                 = $getdata->district_id;
        $order['detail']                    = $getdetail;
        $order['cdetail']                   = count($getdetail);
        $order['url']                       = config('app.url')."public/admin/order/edit";
        $order['oke']                       = $getongkir->oke;
        $order['reg']                       = $getongkir->reg;
        $order['yes']                       = $getongkir->yes;
        // var_dump($getdata->order_weight);die;
        $true_ongkir                        = $order['order_shipment_price']/$order['weight'];
        $order['ongkir']                    = $true_ongkir;

        return view('order.edit',$order);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // var_dump($request->input());die;
        $ids                    = $request->input('ids');
        $order_name             = $request->input('order_name');
        $uniqid                 = $request->input('uniqid');
        $order_phone            = $request->input('order_phone');
        $order_shipment_name    = $request->input('order_shipment_name');
        $order_shipment_phone   = $request->input('order_shipment_phone');
        $order_note             = $request->input('order_note');        
        $product_name           = $request->input('product_name');
        $product_id             = $request->input('product_id');
        $order_detail_price     = $request->input('order_detail_price');
        $product_stock          = $request->input('product_stock');
        $order_detail_qty       = $request->input('order_detail_qty');
        $order_detail_diskon    = $request->input('order_detail_diskon');
        $subtotal               = $request->input('subtotal');
        $cdetail                = count($product_name);
        $order_weight           = $request->input('order_weight');
        $provinsi               = $request->input('provinsi');
        $kota                   = $request->input('kota');
        $kecamatan              = $request->input('kecamatan');
        $order_address          = $request->input('order_address');
        $order_shipment_price   = $request->input('order_shipment_price');
        $order_shipment_zip     = $request->input('order_shipment_zip');
        $weight                 = $request->input('weight');
        $diskon_total           = $request->input('diskon_total');
        $grand_total            = $request->input('grand_total');
        $subtotal               = $request->input('subtotal');
        $qtybefore              = session('qty');
        if($grand_total > 0 && $provinsi != 0 && $kota != 0 && $kecamatan != 0){
            $insert['order_code']               = date('Ymd').$uniqid;
            $insert['order_name']               = $order_name;
            $insert['order_phone']              = $order_phone;
            $insert['province_id']              = $provinsi;
            $insert['city_id']                  = $kota;
            $insert['district_id']              = $kecamatan;
            $insert['order_total']              = $grand_total;
            $insert['order_shipment_name']      = $order_shipment_name;
            $insert['order_shipment_phone']     = $order_shipment_phone;
            $insert['order_shipment_address']   = $order_address;
            $insert['order_shipment_zip']       = $order_shipment_zip;
            $insert['order_shipment_price']     = $order_shipment_price;
            $insert['order_note']               = $order_note;
            $insert['order_weight']             = $order_weight;
            $insert['order_admin']              = session('username');
            $insert['updated_at']               = date('Y-m-d H:i:s');
            $this->order->edit($ids,$insert);
            $this->od->del_idorder($ids);
            for($i = 0; $i < $cdetail; $i++){
                $getbeforestock = $this->product->get_id($product_id[$i]);
                // var_dump($product_id[$i]);
                // $ddd = $product_id[$i];
                // var_dump($qtybefore);die;
                $qtybefore = session($product_id[$i]);
                $newbeforestock = $getbeforestock->product_stock + $qtybefore;
                $this->product->edit($product_id[$i],['product_stock'=>$newbeforestock]);
                $detail['order_id']                        = $ids;
                $detail['product_id']                      = $product_id[$i];
                $detail['order_detail_price']              = $order_detail_price[$i];
                $detail['order_detail_discount_nominal']   = $order_detail_diskon[$i];
                $detail['order_detail_qty']                = $order_detail_qty[$i];
                $detail['order_detail_subtotal']           = $subtotal[$i];
                $detail['created_at']                      = date('Y-m-d H:i:s');
                $this->od->add($detail);
                $getstock = $this->product->get_id($product_id[$i]);
                $newstock = $getstock->product_stock - $order_detail_qty[$i];
                $this->product->edit($product_id[$i],['product_stock'=>$newstock]);
            }
            $request->session()->flash('notip',"<div class='alert alert-success'>Order telah diupdate</div>");
            return redirect('/admin/order');

        }else{
            $request->session()->flash('notip',"<div class='alert alert-danger'> Alamat harus diisi</div>");
            return redirect('/admin/order/add');

        }
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

    function print_out($id){
        $getintern              = $this->order->get_id_join_loc($id);
        $getdetail              = $this->od->get_idorder($id);
        $data['penerima']       = $getintern->order_name;
        $data['pengirim']       = $getintern->order_shipment_name;
        $data['no_hp']          = $getintern->order_shipment_phone;
        $data['alamat']         = $getintern->order_shipment_address;
        $data['provinsi']       = $getintern->nama_provinsi;
        $data['kota']           = $getintern->nama_kota;
        $data['kecamatan']      = $getintern->nama_kecamatan;
        $data['total_bayar']    = $getintern->order_total;
        $data['biaya_kirim']    = $getintern->order_shipment_price;
        $data['no_order']       = $getintern->order_code;
        $data['admin']          = $getintern->order_admin;
        $data['order_unik']     = substr($getintern->order_code, '-3');
        $data['detail']         = $getdetail;
        // }
        $namapengirim = ($getintern->order_shipment_name != "" )? $getintern->order_shipment_name : "Mayoutfit";
        $string = 'MO~^~'.$getintern->order_code."~^~".$getintern->order_name."~^~".$getintern->order_shipment_address." ".$getintern->nama_kecamatan." ".$getintern->nama_kota." ".$getintern->nama_provinsi."~^~".$getintern->order_shipment_phone."~^~".$namapengirim.'~^~'.$getintern->order_phone.'~^~03SM';
        $data['qr'] = $string;
        // $print['print'] = 1;
        return view('print.print',$data);
    }
}
