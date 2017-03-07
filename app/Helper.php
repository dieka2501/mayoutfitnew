<?php
namespace App;

class Helper
{
	function cek($sys,$role){
		if($role == 'owner'){
			return true;
		}else if($sys == $role){
			return true;
		}else{
			return false;
		}
	}
}