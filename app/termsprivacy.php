<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class termsprivacy extends Model
{
	protected $table = "terms_privacy";
	protected $primaryKey = "terms_privacy_id";
	
	function get_termsprivacy(){
		return termsprivacy::select('terms_privacy_content')->first();
	}
	
	function add($data){
		return termsprivacy::insert($data);
	}
	
	function get_id(){
		return termsprivacy::find(1);
	}
	
	function edit($data){
		return termsprivacy::where($this->primaryKey,1)->update($data);
	}
	
}