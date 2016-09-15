<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\product;
use App\category;
class loginFrontController extends Controller
{
    function __construct(){
        date_default_timezone_set('Asia/Jakarta');
        $this->category     = new category;
        $getcategory        = $this->category->get_all('category_name','ASC');
        $arr_cat            = [];
        foreach ($getcategory as $cats) {
            $arr_cat[$cats->idcategory] = $cats->category_name;
        }
        view()->share('list_category',$arr_cat);
        view()->share('count',count(session('cart.idproduct')));
        view()->share('idproduct',session('cart.idproduct'));
        view()->share('name',session('cart.name'));
        view()->share('price',session('cart.price'));
        view()->share('code',session('cart.code'));
        view()->share('image',session('cart.image'));
        view()->share('qty',session('cart.qty'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('front.login.page');

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
    public function store(Request $request)
    {
        //
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
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
