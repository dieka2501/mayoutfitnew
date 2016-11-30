<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class partners extends Model
{
	protected $table = "partners";
	protected $primaryKey = "partners_id";
	
	function get_partners(){
		return partners::select('partners_content')->first();
	}
	
	function add($data){
		return partners::insert($data);
	}
	
	function get_id(){
		return partners::find(1);
	}
	
	function edit($data){
		return partners::where($this->primaryKey,1)->update($data);
	}
	
}