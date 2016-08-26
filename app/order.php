<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    //
}
