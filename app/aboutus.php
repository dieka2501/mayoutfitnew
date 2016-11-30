<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class aboutus extends Model
{
	protected $table = "aboutus";
	protected $primaryKey = "aboutus_id";
	
	function get_aboutus(){
		return aboutus::select('aboutus_content')->first();
	}
	
	function add($data){
		return aboutus::insert($data);
	}
	
	function get_id(){
		return aboutus::find(1);
	}
	
	function edit($data){
		return aboutus::where($this->primaryKey,1)->update($data);
	}
	
}