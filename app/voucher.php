<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class voucher extends Model
{
	protected $table = "voucher";
	protected $primaryKey = "idvoucher";

    function get_vouchercode($voucher_code){
        return voucher::where('voucher_code',$voucher_code)->first();
    }

    function get_vouchercode_stat($voucher_code){
        return voucher::where('voucher_code',$voucher_code)->where('voucher_status',1)->first();
    }

    function get_page(){
        return voucher::orderBy($this->primaryKey,'DESC')->where('deleted_at',NULL)->paginate(20);
    }

    function get_search($cari){
        return voucher::orderBy($this->primaryKey,'DESC')->where('voucher_code','like','%'.$cari.'%')->paginate(20);
    }

    function add($data){
        return voucher::insert($data);
    }

    function get_id($id){
        return voucher::find($id);
    }

    function edit($id,$data){
        return voucher::where($this->primaryKey,$id)->update($data);
    }

    function get_ids(){
        return voucher::orderBy($this->primaryKey,'DESC')->first();
    }

    function get_bycode_all($vcode){
        return voucher::orderBy('voucher_code','ASC')->where('voucher_code','like','%'.$vcode.'%')->get();
    }
}