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

    function get_byname_all($name){
    	return product::orderBy('product_name','ASC')->where('product_name','like','%'.$name.'%')->get();
    }
}
