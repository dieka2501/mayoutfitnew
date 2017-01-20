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
use App\payment;
use App\curl;
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
        $this->payment      = new payment;
        $this->path         = public_path().'/upload/payment/';
        $this->curl         = new curl;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // var_dump($request->session()->all());
        if($request->has('cari') || $request->has('date_start') || $request->has('date_end')){
            $cari       = $request->input('cari');
            $date_start = $request->input('date_start');
            $date_end   = $request->input('date_end');
            // var_dump($date_start);
            $get_data   = $this->order->get_search($cari,$date_start,$date_end);    
            // var_dump($get_data);die;
        }else{
            $cari       = "";
            $date_start = date('Y-m-01');
            $date_end   = date('Y-m-31');
            $get_data   = $this->order->get_page();    
        }
        // var_dump(session()->all());
        $view['url']        = config('app.url').'public/admin/order';
        $view['list']       = $get_data;
        $view['cari']       = $cari;
        $view['date_start'] = $date_start;
        $view['date_end']   = $date_end;
        return view('order.index',$view);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $getuniqueid        = $this->order->get_order_today_admin();
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
        $order_weight           = $request->input('weight');
        $type_paket             = $request->input('paket');      
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
        $grand_total                 = $request->input('grand_total');
        $order_detail_weight         = $request->input('product_weight');
        $order_detail_total_weight   = $request->input('total_product_weight');
        if($grand_total > 0 && $provinsi != 0 && $kota != 0 && $kecamatan != 0){
            $insert['order_code']               = "MO-01".date('Ymd').$uniqid;
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
            $insert['order_shipment_type']      = $type_paket;
            $insert['order_system']             = "admin";
            $insert['order_weight']             = $order_weight;
            $insert['order_discount']           = $diskon_total;
            $insert['order_admin']              = session('username');
            $insert['created_at']               = date('Y-m-d H:i:s');
            $order_id   = $this->order->add($insert);
            for($i = 0; $i < $cdetail; $i++){
                if($product_id[$i] != ""){
                    $detail['order_id']                        = $order_id;
                    $detail['product_id']                      = $product_id[$i];
                    $detail['order_detail_price']              = $order_detail_price[$i];
                    $detail['order_detail_discount_nominal']   = $order_detail_diskon[$i];
                    $detail['order_detail_qty']                = $order_detail_qty[$i];
                    $detail['order_detail_weight']             = $order_detail_weight[$i];
                    $detail['order_detail_total_weight']       = $order_detail_total_weight[$i];
                    $detail['order_detail_subtotal']           = $subtotal[$i];
                    $detail['created_at']                      = date('Y-m-d H:i:s');
                    $this->od->add($detail);
                    $getstock = $this->product->get_id($product_id[$i]);
                    $newstock = $getstock->product_stock - $order_detail_qty[$i];
                    $this->product->edit($product_id[$i],['product_stock'=>$newstock]);    
                }
                
            }
            $smscontentold = "mayoutfit.com%20~%20Hai%20Sist%20".str_replace(" ",'%20',$order_name).",%20thx%20sudah%20belanja%20di%20mayoutfit.com%20(Order%20ID%20".$insert['order_code']."),%20total%20Rp.".number_format($grand_total).".%20Yuk%20buruan%20trf%20ke%20BCA";

            $pesan      = "Hai Sis ".$order_name." total Rp".number_format($grand_total)." silakan trf maks 1x12 jam bca a/n sinthya 1830712158 Thx sudah order di mayoutfit.com (Order ID ".$insert['order_code'].")";
            $smscontent = str_replace(" ","%20", $pesan);
            $urlsms     =  config('app.urlsms').'?userkey='.config('app.smsuserkey').'&passkey='.config('app.smspasskey').'&nohp='.$order_phone.'&tipe=regular&pesan='.$smscontent."";
            // echo $smscontent.'<br>'.$urlsms;

            $res = $this->curl->get($urlsms);
            // var_dump($res);die;
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
        $order['order_shipment_address']    = ($getdata->order_shipment_address=="")?$getdata->order_address:$getdata->order_shipment_address;
        $order['order_shipment_zip']        = $getdata->order_shipment_zip;
        $order['order_shipment_price']      = $getdata->order_shipment_price;
        $order['weight']                    = (is_numeric($getdata->order_weight) && $getdata->order_weight!=0 )?$getdata->order_weight:1000;
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
        $order['type_kirim']                = $getdata->order_shipment_type;

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
        $order_address          = $request->input('order_shipment_address');
        $order_shipment_price   = $request->input('order_shipment_price');
        $order_shipment_zip     = $request->input('order_shipment_zip');
        $weight                 = $request->input('weight');
        $diskon_total           = $request->input('diskon_total');
        $grand_total            = $request->input('grand_total');
        $subtotal               = $request->input('subtotal');
        $qtybefore              = session('qty');
        $order_detail_weight         = $request->input('product_weight');
        $order_detail_total_weight   = $request->input('total_product_weight');
        $type_paket             = $request->input('type_paket');
        if($grand_total > 0 && $provinsi != 0 && $kota != 0 && $kecamatan != 0){
            // $insert['order_code']               = date('Ymd').$uniqid;
            $insert['order_name']               = $order_name;
            $insert['order_phone']              = $order_phone;
            $insert['province_id']              = $provinsi;
            $insert['city_id']                  = $kota;
            $insert['district_id']              = $kecamatan;
            $insert['order_total']              = $grand_total;
            $insert['order_shipment_name']      = $order_shipment_name;
            $insert['order_shipment_phone']     = $order_shipment_phone;
            $insert['order_shipment_address']   = $order_address;
            $insert['order_shipment_type']      = $type_paket;
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
                $detail['order_detail_weight']             = $order_detail_weight[$i];
                $detail['order_detail_total_weight']       = $order_detail_total_weight[$i];
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
        $data['no_hp_pengirim'] = $getintern->order_phone;
        $data['alamat']         = ($getintern->order_shipment_address != "")?$getintern->order_shipment_address:$getintern->order_address;
        $data['provinsi']       = $getintern->nama_provinsi;
        $data['kota']           = $getintern->nama_kota;
        $data['kecamatan']      = $getintern->nama_kecamatan;
        $data['total_bayar']    = $getintern->order_total;
        $data['biaya_kirim']    = $getintern->order_shipment_price;
        $data['no_order']       = $getintern->order_code;
        $data['admin']          = $getintern->order_admin;
        $data['order_unik']     = $getintern->order_code;
        $data['detail']         = $getdetail;
        // }
        $namapengirim = ($getintern->order_shipment_name != "" )? $getintern->order_shipment_name : "Mayoutfit";
        $string = 'MO~^~'.$getintern->order_code."~^~".$getintern->order_name."~^~".$getintern->order_shipment_address." ".$getintern->nama_kecamatan." ".$getintern->nama_kota." ".$getintern->nama_provinsi."~^~".$getintern->order_shipment_phone."~^~".$namapengirim.'~^~'.$getintern->order_phone.'~^~03SM';
        $data['qr'] = $string;
        // $print['print'] = 1;
        $this->order->edit($id,['order_is_printed'=>1]);
        $smscontentold = "mayoutfit.com%20~%20Hai%20Sist%20".str_replace(" ",'%20',$getintern->order_name).",%20order%20kamu%20(Order%20ID%20".$getintern->order_code."),%20akan%20segera%20dikirim,%20silakan%20cek%20resi%20di%20instagram%20@inforesi_mayoutfit%20Semoga%20cepat%20sampai%20brgnya:)";

        $pesan = "Hai Sis ".$getintern->order_name.", uangnya sudah diterima (Order ID ".$getintern->order_code.") akan dikirim besok, silakan cek resi H+2 di ig @inforesi_mayoutfit";
        $smscontent = str_replace(" ","%20", $pesan);
        $urlsms     =  config('app.urlsms').'?userkey='.config('app.smsuserkey').'&passkey='.config('app.smspasskey').'&nohp='.$getintern->order_phone.'&pesan='.$smscontent."&tipe=regular";
        // echo $smscontent.'<br>'.$urlsms;

        $res = $this->curl->get($urlsms);
        return view('print.print',$data);
    }

    function konfirm_bayar($id){
        $getorder       = $this->order->get_id($id);
        $getpayment     = $this->payment->get_idorder($id);
        $view['order']                   = $getorder;
        $view['payment_name']            = (count($getpayment) > 0)? $getpayment->payment_name:"";
        $view['payment_bank_transfer']   = (count($getpayment) > 0)? $getpayment->payment_bank_transfer:"";
        $view['payment_nominal']         = (count($getpayment) > 0)? $getpayment->payment_nominal:"";
        $view['url']    = config('app.url').'public/admin/order/konfirm/bayar';
        return view('confirmation.payment',$view);
    }

    function do_payment(Request $request){
        $idorder                 = $request->input('order_id');
        $grand_total             = $request->input('grand_total');
        $payment_name            = $request->input('payment_name');
        $payment_bank_transfer   = $request->input('payment_bank_transfer');
        $payment_nominal         = $request->input('payment_nominal');

        if($request->hasFile('payment_image')){
            $payment_image  = $request->file('payment_image');
            $ext            = $payment_image->getClientOriginalExtension();
            $filename       = date('YmdHis').'.'.$ext;
            $payment_image->move($this->path,$filename);
            $insert['payment_image'] = $filename;
        }
        $insert['order_id']               = $idorder;
        $insert['payment_name']           = $payment_name;
        $insert['payment_bank_transfer']  = $payment_bank_transfer;
        $insert['payment_nominal']        = $payment_nominal;
        $insert['created_at']             = date('Y-m-d H:i:s');
        $this->payment->delete_idorder($idorder);
        $idpayment  = $this->payment->add($insert);
        if($idpayment > 0){
            $this->order->edit($idorder,['order_status'=>1]);
            $request->session()->flash('notip',"<div class='alert alert-success'>Payment berhasil</div>");
            return redirect('/admin/order');
        }else{
            $request->session()->flash('notip',"<div class='alert alert-success'>Payment gagal, silahkan ulangi.</div>");
            return redirect('/admin/order/konfirm/bayar/'.$idorder);
        }

    }

    function konfirm_kirim($id){
        $getorder           = $this->order->get_id($id);
        $view['order']      = $getorder;
        $view['url']        = config('app.url').'public/admin/order/konfirm/kirim';
        return view('confirmation.delivery',$view);
    }
    function ganti_status($id){
        $getorder           = $this->order->get_id($id);
        $view['url']        = config('app.url')."public/admin/order/change";
        $view['order_code'] = $getorder->order_code;
        $view['order_status'] = $getorder->order_status;
        $view['idorder']    = $getorder->idorder;
        return view('order.statechange',$view);
    }
    function do_change(Request $request){
        $idorder      = $request->input('idorder');
        $status        = $request->input('change');
        if($status == 5){
            $getdetail = $this->od->get_idorder($idorder);
            if(count($getdetail) > 0){
                $newstock = 0;
                foreach ($getdetail as $details) {
                    $qtyorder = $details->order_detail_qty;
                    $stock    = $details->product_stock;
                    $newstock = $qtyorder + $stock;
                    $this->product->edit($details->product_id,['product_stock'=>$newstock]);

                }
            }
        }
        $this->order->edit($idorder,['order_status'=>$status]);
        return redirect('/admin/order/change/'.$idorder);

    }
}
