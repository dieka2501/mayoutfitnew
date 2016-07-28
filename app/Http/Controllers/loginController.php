<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class loginController extends Controller
{
    function __construct(){
        $this->middleware('guest');
        date_default_timezone_set('Asia/Jakarta');
        $this->login = new User;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $view['notip']  = session('notip');
        return view('login',$view);
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
        if($request->has('username') && $request->has('password')){
            $username  = $request->get('username');
            $password  = $request->get('password');
            $remember  = $request->get('remember');
            $log       = ($remember == '1')?true:false;
            // var_dump(Auth::attempt(['username'=>$username,'password'=>$password]),true); die;
            if(Auth::attempt(['username'=>$username,'password'=>$password])){
                $get_login      = $this->login->get_username($username);
                $request->session()->put('username',$username);
                $request->session()->put('role',$get_login->role);
                $request->session()->put('date_register',$get_login->created_at);
                $request->session()->put('email',$get_login->email);
                $request->session()->put('name',$get_login->name);
                $request->session()->put('login',true);
                return redirect('/admin/dashboard');     
            }else{
                 $request->session()->flash('status','<div class="alert alert-danger">Username dan Password Tidak Diketemukan</div>');
                 return redirect('/admin');    
            }
        }else{
            $request->session()->flash('status','<div class="alert alert-danger">Username dan Password Tidak Boleh Kosong</div>');
            return redirect('/admin');
        }    }

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
    public function destroy(Request $request)
    {
        
    }
}
