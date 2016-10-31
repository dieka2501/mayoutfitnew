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
use Mail;
use App\curl;
use App\voucher;
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
            $getuniqueid        = $this->order->get_order_today_web();
            $cuniqueid          = count($getuniqueid);
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

            $nextid                     = $cuniqueid+1;
            $view['uniqid']             = sprintf("%1$03d",$nextid);     
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
        $ongkir                 = $request->input('type_kirim');
        $tempgrandtotal         = $request->input('grandtotal');
        $order_note             = $request->input('order_note');
        $voucher                = $request->input('voucher');
        $getvoucher             = $this->voucher->get_vouchercode_stat($voucher);
        if(count($getvoucher) > 0){
            $vpotongan = $getvoucher->voucher_discount;
        }else{
            $vpotongan = 0;
        }    

        $grandtotal = $tempgrandtotal - $vpotongan;
        // if($request->has('voucher')){
            
        // }else{
        //     $voucher                = $request->input('voucher');    
        // }
        
        // $uniqid                 = substr(strtoupper(md5($order_name.date('YmdHis'))), -7);
        $insert['order_code']               = "MO-02".date('Ymd').$unik; 
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
            $smscontent = "mayoutfit.com%20~%20Hai%20Sist%20".$order_name.",%20thx%20sudah%20belanja%20di%20mayoutfit.com%20(Order%20ID%20".$insert['order_code']."),%20total%20Rp.".number_format($grandtotal).".%20Yuk%20buruan%20trf%20ke%20BCA%20/%20Mandiri%20";
            $urlsms     =  config('app.urlsms').'?userkey='.config('app.smsuserkey').'&passkey='.config('app.smspasskey').'&nohp='.$order_phone.'&pesan='.$smscontent."";
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
