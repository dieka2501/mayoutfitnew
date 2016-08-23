<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    //
    protected $table ='payment';
    protected $primaryKey = "idpayment";
    function add($data){
    	return payment::insertGetId($data);
    }

    function delete_idorder($idorder){
    	return payment::where('order_id',$idorder)->delete();
    }

    function get_idorder($idorder){
    	return payment::where('order_id',$idorder)->first();
    }
}
