<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usedVoucher extends Model
{
    protected $table = "used_voucher";
    protected $primaryKey = "idused";
    function __construct(){

    }
    function get_used($email,$kode){
    	return usedVoucher::where('used_email',$email)->where('used_code',$kode)->get();
    }
    function add($data){
    	return usedVoucher::insertGetId($data);
    }
}
