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
    //
}
