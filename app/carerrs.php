<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class carerrs extends Model
{
	protected $table = "carerrs";
	protected $primaryKey = "carerrs_id";
	
	function get_carerrs(){
		return carerrs::select('carerrs_content')->first();
	}
	
	function add($data){
		return carerrs::insert($data);
	}
	
	function get_id(){
		return carerrs::find(1);
	}
	
	function edit($data){
		return carerrs::where($this->primaryKey,1)->update($data);
	}
	
}