<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kota extends Model
{
	protected $table 		= "kota";
	protected $primaryKey 	= "id";

	function get_idprovinsi_all($idprovinsi){
		return kota::where('id_provinsi',$idprovinsi)->orderBy('nama_kota','ASC')->get();
	}
	function get_all($orderBy,$ordering){
		return kota::orderBy($orderBy,$ordering)->get();
	}
	
    //
}
