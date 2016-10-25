<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class customer extends Model
{
	protected $table = "customer";
	protected $primaryKey = "idcustomer";

	function get_page(){
        return customer::orderBy($this->primaryKey,'DESC')
        				->leftjoin('member_type',$this->table.'.customer_member','=','member_type.idmembertype')
        				->paginate(20);
    }

	function get_search($cari){
        return customer::orderBy($this->primaryKey,'DESC')
        				->leftjoin('member_type',$this->table.'.customer_member','=','member_type.idmembertype')
        				->where('customer.customer_name','like','%'.$cari.'%')->paginate(20);
    }

    function get_id($id){
        return customer::find($id);
    }

    function edit($id,$data){
        return customer::where($this->primaryKey,$id)->update($data);
    }

    function get_detail($id){
    	return customer::join('order','customer.idcustomer','=','order.customer_id')
					  	->join('order_detail','order.idorder','=','order_detail.order_id')
					  	->join('product','order_detail.product_id','=','product.idproduct')
					  	->where('order.order_status','=','3')
					  	->orderBy('order.created_at','DESC')
					  	->paginate(20);
    }

}