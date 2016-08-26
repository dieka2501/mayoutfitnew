<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $table = "category";
    protected $primaryKey = "idcategory";
    function get_page(){
    	return category::orderBy($this->primaryKey,'DESC')->where('category_status',1)->paginate(20);
    }
    function get_search($cari){
        return category::orderBy($this->primaryKey,'DESC')->where('category_name','like','%'.$cari.'%')->paginate(20);
    }
    function add($data){
    	return category::insertGetId($data);
    }
    function get_id($id){
    	return category::find($id);
    }
    function edit($data,$id){
    	return category::where($this->primaryKey,$id)->update($data);
    }

    function get_all($orderby,$ordering){
    	return category::orderBy($orderby,$ordering)->where('category_status',1)->get();
    }
}
