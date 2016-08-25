<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
	protected $table 		= "kecamatan";
	protected $primaryKey 	= "id";
	function get_idprovinsi_idkota_all($idprovinsi,$idkota){
		return kecamatan::orderBy('nama_kecamatan','ASC')->where('id_provinsi',$idprovinsi)->where('id_kota',$idkota)->get();
	}
	function get_all($orderBy,$ordering){
		return kecamatan::orderBy($orderBy,$ordering)->get();
	}

    //
}
