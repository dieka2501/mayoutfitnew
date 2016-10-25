<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class memberType extends Model
{
	protected $table = "member_type";
	protected $primaryKey = "idmembertype";

    function get_membertype($membertype_name){
        return memberType::where('membertype_name',$membertype_name)->first();
    }

    function get_page(){
        return memberType::orderBy($this->primaryKey,'DESC')->where('deleted_at',NULL)->paginate(20);
    }

    function get_search($cari){
        return memberType::orderBy($this->primaryKey,'DESC')->where('membertype_name','like','%'.$cari.'%')->paginate(20);
    }

    function add($data){
        return memberType::insert($data);
    }

    function get_id($id){
        return memberType::find($id);
    }

    function edit($id,$data){
        return memberType::where($this->primaryKey,$id)->update($data);
    }

    function get_ids(){
        return memberType::orderBy($this->primaryKey,'DESC')->first();
    }

    function get_byname_all($name){
        return memberType::orderBy('membertype_name','ASC')->where('membertype_name','like','%'.$name.'%')->get();
    }

    function get_all($orderby,$ordering){
        return memberType::orderBy($orderby,$ordering)->where('membertype_status',1)->get();
    }
}