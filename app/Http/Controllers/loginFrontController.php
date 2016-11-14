<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\product;
use App\category;
use App\provinsi;
use App\customer;
use Mail;
class loginFrontController extends Controller
{
    function __construct(){
        date_default_timezone_set('Asia/Jakarta');
        $this->category     = new category;
        $this->provinsi     = new provinsi;
        $this->customer     = new customer;
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
        $getprovinsi        = $this->provinsi->get_all('nama_provinsi','ASC');
        $arr_provinsi['']   = "-- Pilih Provinsi --";
        foreach ($getprovinsi as $provs) {
            $arr_provinsi[$provs->id] = $provs->nama_provinsi;
        }
        $view['arr_province']        = $arr_provinsi;
        $view['customer_province']   = session('customer_province');
        $view['arr_city']            = [''=>"-- Pilih Kota --"];
        $view['customer_city']       = session('customer_city');
        $view['arr_district']        = [''=>"-- Pilih kecamatan --"];
        $view['customer_district']   = session('customer_district');

        return view('front.login.page',$view);

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
        if($request->has('customer_name') && $request->has('customer_name') && $request->has('customer_password') &&
            $request->has('customer_province') && $request->has('customer_city') && $request->has('customer_district')){

            $customer_name      = $request->input('customer_name');
            $customer_email     = $request->input('customer_email');
            $customer_phone     = $request->input('customer_phone');
            $customer_password  = $request->input('customer_password');
            $repass             = $request->input('repass');
            $customer_address   = $request->input('customer_address');
            $customer_province  = $request->input('customer_province');
            $customer_city      = $request->input('customer_city');
            $customer_district  = $request->input('customer_district');
            $customer_zip       = $request->input('customer_zip');
            if($customer_password == $repass){
                $insert['customer_name']        = $customer_name;
                $insert['customer_email']       = $customer_email;
                $insert['customer_phone']       = $customer_phone;
                $insert['customer_password']    = md5($customer_password);
                $insert['customer_address']     = $customer_address;
                $insert['customer_province']    = $customer_province;
                $insert['customer_city']        = $customer_city;
                $insert['customer_district']    = $customer_district;
                $insert['customer_zip']         = $customer_zip;
                $insert['customer_key']         = substr(md5(date('YmdHis')), -10);
                $ids = $this->customer->add($insert);
                if($ids > 0){
                    $json = ['status'=>true,'alert'=>'Selamat kamu sudah terdaftar, silakan periksa inbox/spam email kamu, untuk konfirmasi.'];    
                    $arr_mail['link']       = config('app.url')."public/registrasi/verify?key=".$insert['customer_key'];
                    $arr_mail['nama']       = $customer_name;
        
                    $user['email']          = $customer_email;
                    $user['name']           = $customer_name;
                
                    
                    Mail::send('front.login.register',$arr_mail,function($m) use ($user){
                        $m->from('no-reply-admin@mayoutfit.com','Admin Mayoutfit');
                        $m->to($user['email'], $user['name'])->subject("Terima Kasih Telah Registrasi");
                    });
                }else{
                    $json = ['status'=>false,'alert'=>'Pendaftaran gagal, silakan ulangi.'];    
                }
            }else{
                $json = ['status'=>false,'alert'=>'Password tidak sama.'];
            }

        }else{
            $json = ['status'=>false,'alert'=>'Semua masukan harus diisi.'];
        }


        
        return response()->json($json);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function login(Request $request){
        $email      = $request->input('login_email');
        $password   = $request->input('login_password');
        $data       = $this->customer->get_login($email,md5($password));
        if(count($data) > 0){
            $request->session()->put('login',true);
            $request->session()->put('customer_name',$data->customer_name);
            $request->session()->put('customer_email',$data->customer_email);
            $request->session()->put('customer_address',$data->customer_address);
            $request->session()->put('customer_province',$data->customer_province);
            $request->session()->put('customer_city',$data->customer_city);
            $request->session()->put('customer_district',$data->customer_district);
            $request->session()->put('customer_zip',$data->customer_zip);
            return redirect('/');
        }else{
            $request->session()->flash("notip","<div class='alert alert-danger'>Email/Password kamu salah, atau akun kamu belum diverifikasi.</div>");
            return redirect('/login');
        }
    }

    function verify(Request $request){
        $key        = $request->input('key');
        $getcus     = $this->customer->verify($key);
        if(count($getcus) > 0){
            $this->customer->edit($getcus->idcustomer,['customer_status'=>1,'customer_key'=>'']);
            echo "Email kamu sudah diverfikasi, silakan tutup halaman ini, dan selamat berbelanja";
            // return redirect('/');
        }else{
            echo "Key yang kamu masukan salah.";
        }
    }

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
    public function destroy(Request $request)
    {
        //
        $request->session()->flush();
        return redirect('/');
    }
}
