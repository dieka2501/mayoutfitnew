<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class newsletter extends Model
{
	protected $table = "newsletter";
	protected $primaryKey = "newsletter_id";
	
	function get_newsletter(){
		return newsletter::select('newsletter_content')->first();
	}
	
	function add($data){
		return newsletter::insert($data);
	}
	
	function get_id(){
		return newsletter::find(1);
	}
	
	function edit($data){
		return newsletter::where($this->primaryKey,1)->update($data);
	}
	
}