<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    //
    function hapus(){
    	return session()->forget('cart');
    }

    function hapus_item($id){
    	// $cart = session('cart');

    	return session()->forget('cart.idproduct.'.$id);
    }
}
