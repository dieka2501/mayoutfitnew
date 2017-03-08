<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Log;
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
	function get_search($cari,$date_start,$date_end){
		if($date_start != ""){
			$where_date_start = $date_start;
		}else{
			$where_date_start = "1988-01-01";
		}
		if($date_end != ""){
			$where_date_end = $date_end;
		}else{
			$where_date_end = "2999-12-31";
		}
		return order::orderBy($this->primaryKey,'DESC')->whereBetween('created_at',[$where_date_start." 00:00:00",$where_date_end." 23:59:59"])->where(function($query) use ($cari){
			$query->where('order_code','like','%'.$cari.'%')->orWhere('order_name','like','%'.$cari.'%')->orWhere('order_total','like','%'.$cari.'%');
		})->paginate(20);	
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
		return order::select(DB::raw('product.product_name, sum(order_detail.order_detail_qty) as order_detail_qty, order_detail.order_detail_price as order_detail_price,order_detail.order_detail_discount_nominal as order_detail_discount_nominal,product.product_hpp as product_hpp '))
						->join('order_detail',$this->table.'.idorder','=','order_detail.order_id')
						->join('product','order_detail.product_id','=','product.idproduct')
						->orderBy('product.product_name','asc')
						->groupBy('product.idproduct')
						->paginate(20);
		
	}

	function get_search_report($date_start,$date_end){
		return order::select(DB::raw('product.product_name, sum(order_detail.order_detail_qty) as order_detail_qty, order_detail.order_detail_price as order_detail_price, order_detail.order_detail_discount_nominal as order_detail_discount_nominal,product.product_hpp as product_hpp '))
						->join('order_detail',$this->table.'.idorder','=','order_detail.order_id')
						->join('product','order_detail.product_id','=','product.idproduct')
						->where('order.order_status',3)
						->whereBetween($this->table.'.created_at',[$date_start.'%',$date_end."%"])
						->orderBy('product.product_name','asc')
						->groupBy('product.idproduct')
						->paginate(20);
		
	}

	function get_report_all(){
		return order::select(DB::raw('product.product_name, sum(order_detail.order_detail_qty) as order_detail_qty, sum(order_detail.order_detail_price) as order_detail_price,sum(order_detail.order_detail_discount_nominal) as order_detail_discount_nominal,product.product_hpp as product_hpp '))
						->join('order_detail',$this->table.'.idorder','=','order_detail.order_id')
						->join('product','order_detail.product_id','=','product.idproduct')
						->orderBy('product.product_name','asc')
						->groupBy('product.product_name')
						->get();
	}

	function get_report_search($date_start,$date_end){
		return order::select(DB::raw('product.product_name, sum(order_detail.order_detail_qty) as order_detail_qty, order_detail.order_detail_price as order_detail_price, order_detail.order_detail_discount_nominal as order_detail_discount_nominal,product.product_hpp as product_hpp '))
						->join('order_detail',$this->table.'.idorder','=','order_detail.order_id')
						->join('product','order_detail.product_id','=','product.idproduct')
						->where('order.order_status',3)
						->whereBetween($this->table.'.created_at',[$date_start.'%',$date_end."%"])
						->orderBy('product.product_name','asc')
						->groupBy('product.idproduct')
						->get();
	}

	function get_diff_pending(){
		return order::select(DB::raw('idorder,TIMESTAMPDIFF(HOUR,created_at,"'.date('Y-m-d H:i:s').'") as selisih'))->where('order_status',0)->get();
			
	}
	function get_order_status_date($status,$date_start,$date_end){
		return order::where('order_status',$status)->whereBetween('created_at',[$date_start,$date_end]);
	}
	function get_code($code){
		return order::where('order_code',$code);
	}

}
