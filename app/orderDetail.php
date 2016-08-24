<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderDetail extends Model
{
	protected $table = "order_detail";
	protected $primaryKey = "idorder_detail";
	function add($data){
		return orderDetail::insertGetId($data);
	}

	function get_idorder($idorder){
		return orderDetail::join('product','order_detail.product_id','=','product.idproduct')->where('order_id',$idorder)->get();
	}

	function del_idorder($idorder){
		return orderDetail::where('order_id',$idorder)->delete();
	}

	function get_page($date_start,$date_end){
		return orderDetail::join('product',$this->table.'.product_id','=','product.idproduct')->whereBetween($this->table.'.created_at',[$date_start.'%',$date_end."%"])->orderBy('product.product_name','asc')->paginate(20);
	}

	function get_all($date_start,$date_end){
		return orderDetail::join('product',$this->table.'.product_id','=','product.idproduct')->whereBetween($this->table.'.created_at',[$date_start.'%',$date_end.'%'])->orderBy('product.product_name','asc')->get();
	}

    //
}
