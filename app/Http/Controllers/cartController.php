<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\product;
use App\category;
use App\cart;
class cartController extends Controller
{
    function __construct(){
        date_default_timezone_set("Asia/Jakarta");
        $this->product      = new product;
        $this->category     = new category;
        $getcategory        = $this->category->get_all('category_name','ASC');
        $arr_cat            = [];
        foreach ($getcategory as $cats) {
            $arr_cat[$cats->idcategory] = $cats->category_name;
        }
        // $share['']
        view()->share('list_category',$arr_cat);
        view()->share('count',count(session('cart.idproduct')));
        view()->share('idproduct',session('cart.idproduct'));
        view()->share('name',session('cart.name'));
        view()->share('price',session('cart.price'));
        view()->share('code',session('cart.code'));
        view()->share('image',session('cart.image'));
        view()->share('qty',session('cart.qty'));
        $this->cart = new cart;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // var_dump($request->session()->all());
        // var_dump(session('cart.name'));
        // $count          = counsession('cart');
        // $idproduct      = 
        $view['count']          = count(session('cart.idproduct'));
        $view['idproduct']      = session('cart.idproduct');
        $view['name']           = session('cart.name');
        $view['price']          = session('cart.price');
        $view['code']           = session('cart.code');
        $view['image']          = session('cart.image');
        $view['qty']            = session('cart.qty');
        return view('front.cart.page',$view);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        //
        $getproduct = $this->product->get_id($id);
        if(count(session('cart.idproduct')) >0){
            if(in_array($id, session('cart.idproduct'))){
                $key = array_search($id, session('cart.idproduct'));
                $qtylama = session('cart.qty.'.$key);
                $qtybaru = $qtylama +1;
                $request->session()->put('cart.qty.'.$key,$qtybaru); 
            }else{
                $request->session()->push('cart.idproduct',$getproduct->idproduct);
                $request->session()->push('cart.price',$getproduct->product_price);
                $request->session()->push('cart.name',$getproduct->product_name);
                $request->session()->push('cart.code',$getproduct->product_code);
                $request->session()->push('cart.image',$getproduct->product_image);
                $request->session()->push('cart.qty',1);    
            }
        }else{
            $request->session()->push('cart.idproduct',$getproduct->idproduct);
            $request->session()->push('cart.price',$getproduct->product_price);
            $request->session()->push('cart.name',$getproduct->product_name);
            $request->session()->push('cart.code',$getproduct->product_code);
            $request->session()->push('cart.image',$getproduct->product_image);
            $request->session()->push('cart.qty',1);    
        }
        
        
        return redirect('/cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->cart->hapus();
        $idproduct  = $request->input('idproduct');
        $qty_cart   = $request->input('qty_cart');
        // var_dump($idproduct);die;
        foreach ($idproduct as $products) {
            $getproduct    = $this->product->get_id($products);
            $request->session()->push('cart.idproduct',$getproduct->idproduct);
            $request->session()->push('cart.price',$getproduct->product_price);
            $request->session()->push('cart.name',$getproduct->product_name);
            $request->session()->push('cart.code',$getproduct->product_code);
            $request->session()->push('cart.image',$getproduct->product_image);
            $request->session()->push('cart.qty',$qty_cart[$products]);
            
            // echo $products."-".$qty_cart[$products]."<br>";
            
        }
        return redirect('/cart');
        // var_dump($request->session()->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        // $request->session()->forget('cart');
        return $this->cart->hapus();

    }

    function delete_single($id){
        $this->cart->hapus_item($id);
        return redirect('/cart');
    }
}
