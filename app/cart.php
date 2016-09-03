<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    //
    function hapus(){
    	return session()->forget('cart');
    }
}
