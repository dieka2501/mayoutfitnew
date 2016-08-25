<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ongkir extends Model
{
	protected $table = "ongkir";
	protected $primaryKey = "id";
	function get_ongkir($idprovinsi,$idkota,$idkecamatan){
			return ongkir::where('id_provinsi',$idprovinsi)->where('id_kota',$idkota)->where('id_kecamatan',$idkecamatan)->first();
	}
    //
}
