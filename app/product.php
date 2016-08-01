<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
	protected $table = "product";
	protected $primaryKey = "idproduct";
	function get_page(){
		return product::orderBy($this->primaryKey,'DESC')->where('deleted_at',NULL)->paginate(20);
	}
    //
    function add($data){
    	return product::insertGetId($data);
    }

    function get_id($id){
    	return product::find($id);
    }

    function edit($id,$data){
    	return product::where($this->primaryKey,$id)->update($data);
    }
}
