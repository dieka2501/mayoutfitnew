<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shipment extends Model
{
    //
    protected $table 		= "shipment";
    protected $primaryKey 	= "idshipment";
    function add($data){
    	return shipment::insertGetId($data);
    }
}
