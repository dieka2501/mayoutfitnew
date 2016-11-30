<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class contactus extends Model
{
	protected $table = "contactus";
	protected $primaryKey = "contactus_id";
	
	function get_page(){
		return contactus::orderBy($this->primaryKey,'DESC')->where('deleted_at',NULL)->paginate(20);
	}
	
	function get_search($cari){
		return contactus::orderBy($this->primaryKey,'DESC')->where('deleted_at',NULL)
		->where(function($query) use ($cari){
			$query->where('contactus_nama','like','%'.$cari.'%')->orWhere('contactus_email','like','%'.$cari.'%');
		})->paginate(20);
	}
	
	function add($data){
		return contactus::insert($data);
	}
	
	function get_id($id){
    	return contactus::find($id);
    }
	
}