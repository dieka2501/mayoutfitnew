<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class howorder extends Model
{
	protected $table = "how_order";
	protected $primaryKey = "how_order_id";
	
	function get_howorder(){
		return howorder::select('how_order_content')->first();
	}
	
	function add($data){
		return howorder::insert($data);
	}
	
	function get_id(){
		return howorder::find(1);
	}
	
	function edit($data){
		return howorder::where($this->primaryKey,1)->update($data);
	}
	
}