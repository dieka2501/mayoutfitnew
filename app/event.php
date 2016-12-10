<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
	protected $table = 'event';
	protected $primaryKey = "id_event";
	function add($data){
		return DB::table($this->table)->insertGetId($data);
	}
	function get_title($title){
		return DB::table($this->table)->where('name_event',$title)->first();
	}
	function get_page(){
		return DB::table($this->table)->orderBy('id_event','DESC')->paginate(20);
	}
	function get_search($cari){
		return DB::table($this->table)->where('name_event','like','%'.$cari.'%')->orderBy('id_event','DESC')->paginate(20);
	}
	function get_id($id){
		return event::find($id);
	}
	function edit($id,$data){
		return DB::table($this->table)->where($this->primaryKey,$id)->update($data);
	}
	function del($id){
		$news = event::find($id);
		return $news->delete();
	}    //
}
