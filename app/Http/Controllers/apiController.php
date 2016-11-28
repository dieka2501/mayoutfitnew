<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\kota;
use App\kecamatan;
use App\ongkir;
use App\product;
use App\order;
use App\voucher;
use App\usedVoucher;
class apiController extends Controller
{
    function __construct(){
        date_default_timezone_set('Asia/Jakarta');
        $this->kota         = new kota;
        $this->kecamatan    = new kecamatan;
        $this->ongkir       = new ongkir;
        $this->product      = new product;
        $this->order        = new order;
        $this->voucher      = new voucher;
        $this->usedVoucher  = new usedVoucher;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function get_kota_idprovinsi(Request $request){
        $idprovinsi     = $request->input('idprovinsi');
        $getdata        = $this->kota->get_idprovinsi_all($idprovinsi);
        return response()->json($getdata);

    }

    function get_kecamatan_idprovinsi_idkota(Request $request){
        $idprovinsi     = $request->input('idprovinsi');
        $idkota         = $request->input('idkota');
        $getdata        = $this->kecamatan->get_idprovinsi_idkota_all($idprovinsi,$idkota);
        return response()->json($getdata);

    }

    function get_ongkir(Request $request){
        $idprovinsi     = $request->input('idprovinsi');
        $idkota         = $request->input('idkota');
        $idkecamatan    = $request->input('idkecamatan');
        $getdata        = $this->ongkir->get_ongkir($idprovinsi,$idkota,$idkecamatan);
        return response()->json($getdata);

    }

    function  get_product_auto(Request $request){
        $term           = $request->input('term');
        $getdata        = $this->product->get_byname_all($term);
        foreach ($getdata as $datas) {
            $arr[] = ['id'=>$datas->idproduct,'label'=>$datas->product_name,'value'=>$datas->product_name];
        }
        return response()->json($arr);
    }
    function get_product_byid(Request $request){
        $idproduct  = $request->input('idproduct');
        $getdata    = $this->product->get_id($idproduct);
        return response()->json($getdata);
    }

    function get_idoroder(Request $request){
        $code       = $request->input('code');
        $getdata    = $this->order->get_codeorder($code);
        return response()->json($getdata);
    }

    function get_codevoucher(Request $request){
        $voucher = $request->input('voucher');
        $email   = $request->input('email');

        $getdata    = $this->voucher->get_vouchercode_stat($voucher);
        $countdata  = count($getdata);
        if($countdata > 0){
            $getused    = $this->usedVoucher->get_used($email,$voucher);
            $countused  = count($getused);
            if($countused == 0){
                
                $json = ['status'=>true,'alert'=>'Selamat kamu dapat potongan harga Rp.','data'=>$getdata];
            }else{
                $json = ['status'=>false,'alert'=>'Maaf voucher sudah digunakan'];    
            }
        }else{
            $json = ['status'=>false,'alert'=>'Maaf voucher salah, atau sudah tidak berlaku'];
        }
        return response()->json($json);
    }

    function autocancel(){
        $getdata = $this->order->get_diff_pending();
        foreach ($getdata as $key => $value) {
               echo $value."<br>";
               if($value->selisih >= 24){
                    $this->order->edit($value->idorder,['order_status'=>5]);
               }
           }   
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
