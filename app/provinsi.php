<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class provinsi extends Model
{
	protected $table 		= "provinsi";
	protected $primaryKey 	= "id";

	function get_all($orderBy,$ordering){
		return provinsi::orderBy($orderBy,$ordering)->get();
	}
    //
}
