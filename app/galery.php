<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class galery extends Model
{
	protected $table = "galery";
	protected $primaryKey = "id_galery";

	function get_page(){
		return galery::orderBy($this->primaryKey,'DESC')
						->join('product',$this->table.'.product_id','=','product.idproduct')
						->join('category','product.category_id','=','category.idcategory')
						->where('galery.deleted_at',NULL)
						->paginate(20);
	}

	function get_search($cari){
        return galery::orderBy($this->primaryKey,'DESC')
        					->join('product',$this->table.'.product_id','=','product.idproduct')
							->join('category','product.category_id','=','category.idcategory')
        					->where('galery.deleted_at',NULL)
                ->where(function($query) use ($cari){
                    $query->where('galery_name','like','%'.$cari.'%')
                    	  ->orWhere('product_name','like','%'.$cari.'%')
                    	  ->orWhere('category_name','like','%'.$cari.'%');
                })->paginate(20);
    }

    function add($data){
    	return galery::insertGetId($data);
    }

    function get_id($id){
    	return galery::find($id);
    }

    function edit($id,$data){
    	return galery::where($this->primaryKey,$id)->update($data);
    }

    function get_byname_all($name){
    	return galery::orderBy('galery_name','ASC')->where('galery_name','like','%'.$name.'%')->get();
    }

    //front 
    function get_page_front($sort,$order){
        return galery::orderBy('galery.created_at',$order)
                ->join('product',$this->table.'.product_id','=','product.idproduct')
                ->where($this->table.'.galery_status',1)
                ->paginate(6);
    }

}