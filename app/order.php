<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class order extends Model
{
	protected $table = "order";
	protected $primaryKey = "idorder";

	function __construct(){
		date_default_timezone_set("Asia/Jakarta");
	}
	function get_page(){
		return order::orderBy($this->primaryKey,'DESC')->paginate(20);
	}
	function get_search($cari){
		return order::orderBy($this->primaryKey,'DESC')->where('order_code','like','%'.$cari.'%')->orWhere('order_name','like','%'.$cari.'%')->orWhere('order_total','like','%'.$cari.'%')->paginate(20);	
	}
	function add($data){
		return order::insertGetId($data);
	}

	function get_order_today(){
		return order::orderBy('idorder')->whereBetween('created_at',[date('Y-m-d 00:00:00'),date('Y-m-d 23:59:59')])->get();
	}
	function get_order_today_admin(){
		return order::orderBy('idorder')->where('order_system','admin')->whereBetween('created_at',[date('Y-m-d 00:00:00'),date('Y-m-d 23:59:59')])->get();
	}
	function get_order_today_web(){
		return order::orderBy('idorder')->where('order_system','web')->whereBetween('created_at',[date('Y-m-d 00:00:00'),date('Y-m-d 23:59:59')])->get();
	}
	function get_id($id){
		return order::find($id);
	}

	function get_id_join_loc($id){
		return order::join('provinsi','order.province_id','=','provinsi.id')
						->join('kota','order.city_id','=','kota.id')
						->join('kecamatan','order.district_id','=','kecamatan.id')
						->where('order.idorder',$id)->first();
	}

	function edit($id,$data){
		return order::where('idorder',$id)->update($data);
	}

	function get_codeorder($code){
		return order::where('order_code',$code)->first();
	}

    //report
    function get_page_report(){
		return order::join('order_detail',$this->table.'.idorder','=','order_detail.order_id')
						->join('product','order_detail.product_id','=','product.idproduct')
						->orderBy('product.product_name','asc')->paginate(20);
	}

	function get_search_report($date_start,$date_end){
		return order::join('order_detail',$this->table.'.idorder','=','order_detail.order_id')
						->join('product','order_detail.product_id','=','product.idproduct')
						->whereBetween($this->table.'.created_at',[$date_start.'%',$date_end."%"])
						->orderBy('product.product_name','asc')->paginate(20);
	}

	function get_report_all(){
		return order::join('order_detail',$this->table.'.idorder','=','order_detail.order_id')
						->join('product','order_detail.product_id','=','product.idproduct')
						->orderBy('product.product_name','asc')->get();
	}

	function get_report_search($date_start,$date_end){
		return order::join('order_detail',$this->table.'.idorder','=','order_detail.order_id')
						->join('product','order_detail.product_id','=','product.idproduct')
						->whereBetween($this->table.'.created_at',[$date_start.'%',$date_end."%"])
						->orderBy('product.product_name','asc')->get();
	}

	function get_diff_pending(){
		return order::select(DB::raw('idorder,TIMESTAMPDIFF(HOUR,created_at,"'.date('Y-m-d H:i:s').'") as selisih'))->where('order_status',0)->get();
			
	}


}
