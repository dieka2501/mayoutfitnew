<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class store extends Model
{
	protected $table = "store";
	protected $primaryKey = "store_id";
	
	function get_store(){
		return store::select('store_content')->first();
	}
	
	function add($data){
		return store::insert($data);
	}
	
	function get_id(){
		return store::find(1);
	}
	
	function edit($data){
		return store::where($this->primaryKey,1)->update($data);
	}
	
}