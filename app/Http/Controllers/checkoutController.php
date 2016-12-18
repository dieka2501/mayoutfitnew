<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\product;
use App\category;
use App\provinsi;
use App\kota;
use App\kecamatan;
use App\ongkir;
use App\order;
use App\orderDetail;
use Mail;
use App\curl;
use App\voucher;
use App\usedVoucher;
class checkoutController extends Controller
{
    function __construct(){
        date_default_timezone_set('Asia/Jakarta') ;  
        $this->category     = new category;
        $this->provinsi     = new provinsi;
        $this->order        = new order;
        $this->od           = new orderDetail;
        $this->product      = new product;
        $this->curl         = new curl;
        $this->voucher      = new voucher;
        $this->kota         = new kota;
        $this->kecamatan    = new kecamatan;
        $this->ongkir       = new ongkir;
        $this->usedVoucher  = new usedVoucher;
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
        // var_dump(var_dump(session()->all()));
        if($count > 0){
            $getuniqueid        = $this->order->get_order_today_web();
            $cuniqueid          = count($getuniqueid);
            $getprovinsi = $this->provinsi->get_all('nama_provinsi','ASC');
            $arr_provinsi = [''=>'-- Pilih Provinsi --'];
            foreach ($getprovinsi as $prov) {
                $arr_provinsi[$prov->id] =  $prov->nama_provinsi;
            }
            $view['arr_provinsi'] = $arr_provinsi;
            $view['id_provinsi']  = session('customer_province');
            if(session('login')){
                $getkota    = $this->kota->get_idprovinsi_all(session('customer_province'));
                $arr_kota   = [''=>'-- Pilih Kota --'];
                foreach($getkota as $kotas){
                    $arr_kota[$kotas->id] = $kotas->nama_kota;
                }
                $view['arr_kota']     = $arr_kota;

                $getkecamatan    = $this->kecamatan->get_idprovinsi_idkota_all(session('customer_province'),session('customer_city'));
                $arr_kecamatan   = [''=>'-- Pilih Kecamatan --'];
                foreach($getkecamatan as $kecamatans){
                    $arr_kecamatan[$kecamatans->id] = $kecamatans->nama_kecamatan;
                }
                $view['arr_kecamatan'] = $arr_kecamatan;

                // $getongkir->reg = "";
                // $getongkir->yes = "";
                $getongkir      = $this->ongkir->get_ongkir(session('customer_province'),session('customer_city'),session('customer_district'));
                $arr_ongkir['']  = "-- Pilih Pengiriman --";
                // if($getongkir->oke > 0){
                //     $arr_ongkir[$getongkir->oke]  = "OKE";
                // }

                if(isset($getongkir->reg)){
                    if($getongkir->reg > 0){
                        $arr_ongkir[$getongkir->reg]  = "REG";    
                    }
                    
                }
                if(isset($getongkir->yes)){
                    if($getongkir->yes > 0){
                        $arr_ongkir[$getongkir->yes]  = "YES";    
                    }
                    
                }
                $view['arr_type']       = $arr_ongkir;

            }else{
                $view['arr_kota']       = [''=>'-- Pilih Kota --'];    
                $view['arr_kecamatan']  = [''=>'-- Pilih Kecamatan --'];
                $view['arr_type']       = [''=>'-- Pilih Pengiriman --'];
            } 
            $view['id_kota']        = session('customer_city');
            $view['id_kecamatan']   = session('customer_district');
            $view['type_kirim']     = session('type_kirim');       
            
            
            

            $nextid                     = $cuniqueid+1;
            $view['uniqid']             = sprintf("%1$03d",$nextid);     
            $view['customer_name']      = session('customer_name');     
            $view['customer_email']     = session('customer_email');
            $view['customer_address']   = session('customer_address');
            $view['customer_phone']     = session('customer_phone');
            $view['customer_zip']       = session('customer_zip');
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
        // $getdataorder           = $this->order->get_order_today_web();
        // $countorder             = count($getdataorder);
        // $nextid                 = $countorder+1;
        // $unik                   = sprintf("%1$03d",$nextid);
        $unik                   = $request->input('nextid');
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
        $ongkir                 = $request->input('totkirim');
        $tempgrandtotal         = $request->input('grandtotal');
        $order_note             = $request->input('order_note');
        $voucher                = $request->input('out-voucher');
        $kodevoucher            = $request->input('voucher');
        $berat                  = $request->input('inberat');
        $getvoucher             = $this->voucher->get_vouchercode_stat($voucher);
        $grandtotal             = $tempgrandtotal - $voucher;
        // if($request->has('voucher')){
            
        // }else{
        //     $voucher                = $request->input('voucher');    
        // }
        
        // $uniqid                 = substr(strtoupper(md5($order_name.date('YmdHis'))), -7);
        $insert['order_code']               = "MO-02".date('Ymd').$unik; 
        $insert['order_name']               = $order_name;
        $insert['customer_id']              = session('idcustomer');
        $insert['order_phone']              = $order_phone;
        $insert['order_address']            = $order_address;
        $insert['order_email']              = $order_email;
        $insert['province_id']              = $id_provinsi;
        $insert['city_id']                  = $id_kota;
        $insert['district_id']              = $id_kecamatan;
        $insert['order_total']              = $grandtotal;
        $insert['order_discount']           = $voucher;
        $insert['order_shipment_name']      = $order_shipment_name;
        $insert['order_shipment_phone']     = $order_shipment_phone;
        $insert['order_shipment_address']   = $order_shipment_address;
        $insert['order_shipment_zip']       = $order_shipment_zip;
        $insert['order_shipment_price']     = $ongkir;
        $insert['order_note']               = $order_note;
        $insert['order_system']             = "web";        
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
            // for($dd = 0;$dd < $count ; $dd++){
            foreach ($idproduct as $keyproduct => $valproduct){ 
                $subtot                         = $productprice[$keyproduct] * $productqty[$keyproduct];
                $detail['order_id']             = $ids;
                $detail['product_id']           = $valproduct;
                $detail['order_detail_price']   = $productprice[$keyproduct];
                $detail['order_detail_qty']     = $productqty[$keyproduct];
                $detail['order_detail_subtotal']= $subtot;
                $detail['created_at']           = date('Y-m-d H:i:s');
                $this->od->add($detail);
                $getproduct = $this->product->get_id($valproduct);
                $qtylama    = $getproduct->product_stock;
                $qtybaru    = $qtylama - $productqty[$keyproduct];
                $this->product->edit($valproduct,['product_stock'=>$qtybaru]);

                $arr_mail['product_name'][] = $getproduct->product_name;
                $arr_mail['price'][]        = $productprice[$keyproduct];
                $arr_mail['qty'][]          = $productqty[$keyproduct];

            }
            $this->usedVoucher->add(['used_email'=>$order_email,'used_code'=>$kodevoucher,'created_at'=>date('Y-m-d H:i:s')]);
            $arr_mail['grandtotal'] = $grandtotal;
            $arr_mail['billing']    = $insert;
            $arr_mail['count']      = count($arr_mail['product_name']);
            $user['email']          = $order_email;
            $user['name']           = $order_name;
            $user['no_order']       = $insert['order_code'];
            
            Mail::send('front.checkout.mailOrder',$arr_mail,function($m) use ($user){
                $m->from('no-reply-admin@mayoutfit.com','Admin Mayoutfit');
                $m->to($user['email'], $user['name'])->subject("Konfirmasi Order No ".$user['no_order']);
            });  
            $smscontent = "mayoutfit.com%20~%20Hai%20Sist%20".str_replace(" ",'%20', $order_name).",%20thx%20sudah%20belanja%20di%20mayoutfit.com%20(Order%20ID%20".$insert['order_code']."),%20total%20Rp.".number_format($grandtotal).".%20Yuk%20buruan%20trf%20ke%20BCA%20/%20Mandiri%20";
            $urlsms     =  config('app.urlsms').'?userkey='.config('app.smsuserkey').'&passkey='.config('app.smspasskey').'&nohp='.$order_phone.'&tipe=regular&pesan='.$smscontent."";
            // echo $smscontent.'<br>'.$urlsms;
            $res = $this->curl->get($urlsms);
            $request->session()->forget('cart');
            $view['idorder']    = $ids;
            $view['order_code'] = $insert['order_code'];
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

    function mail(){
        return view('front.checkout.mailOrder');
    }
}
