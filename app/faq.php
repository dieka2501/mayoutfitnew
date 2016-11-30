<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class faq extends Model
{
	protected $table = "faq";
	protected $primaryKey = "faq_id";
	
	function get_faq(){
		return faq::select('faq_content')->first();
	}
	
	function add($data){
		return faq::insert($data);
	}
	
	function get_id(){
		return faq::find(1);
	}
	
	function edit($data){
		return faq::where($this->primaryKey,1)->update($data);
	}
	
}