<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class product extends Model
{
	protected $table = "product";
	protected $primaryKey = "idproduct";
	function get_page(){
		return product::orderBy($this->primaryKey,'DESC')->join('category',$this->table.'.category_id','=','category.idcategory')->where('product.deleted_at',NULL)->paginate(20);
	}

    function get_search($cari){
        return product::orderBy($this->primaryKey,'DESC')->join('category',$this->table.'.category_id','=','category.idcategory')->where('product.deleted_at',NULL)
                ->where(function($query) use ($cari){
                    $query->where('product_name','like','%'.$cari.'%')->orWhere('product_code','like','%'.$cari.'%')->orWhere('category_name','like','%'.$cari.'%');
                })->paginate(20);
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

    function get_all($orderby,$ordering){
        return product::orderBy($orderby,$ordering)->where('product_status',1)->get();
    }

    //FRONT 
    function get_page_front($sort,$order){
        return product::orderBy($sort,$order)->where('product.product_status',1)->paginate(6);
    }

    function get_page_front_sale($sort,$order){
        return product::orderBy($sort,$order)->where('product.product_status',1)->where('product.product_sale',1)->paginate(6);
    }

    function get_page_category_front($sort,$order,$idcategory){
        return product::orderBy($sort,$order)->where('category_id',$idcategory)->where('product.product_status',1)->paginate(6);
    }

    function get_page_front_new(){
        return product::orderBy('idproduct','DESC')->where('product.product_status',1)
                    ->first();
    }
    function get_page_sale(){
        return product::orderBy('idproduct','DESC')->where('product.product_status',1)
                    ->where('product_sale',1)
                    ->first();
    }

    function get_page_front_random2(){
        return product::orderBy('idproduct','DESC')->where('product.product_status',1)
                    
                    ->take(2)->get();
    }

}
