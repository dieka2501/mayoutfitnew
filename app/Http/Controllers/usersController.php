<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class usersController extends Controller
{
	function __construct(){
		date_default_timezone_set('Asia/Jakarta');
        $this->middleware('auth');
        view()->share('username',session('username'));
        view()->share('role',session('role'));
        view()->share('name',session('name'));
        view()->share('email',session('email'));
        view()->share('date_register',session('date_register'));  
        $this->User      = new User;
	}

	public function index(Request $request)
    {
        if($request->has('cari')){
            $cari       = $request->input('cari');
            $getdata    = $this->User->get_search($cari);    
        }else{
            $cari       = "";
            $getdata    = $this->User->get_page();
        }
        
        $view['list']       = $getdata;
        $view['cari']       = $cari;
        $view['notip']      = session('notip');
        $view['url']        = config('app.url').'public/admin/users';
        return view('user.index',$view);
    }

    public function create()
    {
        $view['username']       = session('usernameNew');
        $view['password']       = session('passwordNew');
        $view['email']          = session('emailNew');
        $view['name']           = session('nameNew');
        $view['role']           = session('roleNew');
        $view['notip']          = session('notip');
        $view['url']            = config('app.url')."public/admin/user/add";
        return view('user.add',$view);
    }

    public function store(Request $request)
    {
        $username                           = $request->input('username');
        $password                           = $request->input('password');
        $email                              = $request->input('email');
        $name                               = $request->input('name');
        $role                               = $request->input('role');
        $iduser                             = $this->User->count();
        $insert['iduser']                   = $iduser + 1;
        $insert['username']                 = $username;
        $insert['password']                 = \Hash::make($password);
        $insert['email']                    = $email;
        $insert['name']                     = $name;
        $insert['role']                     = $role;
        $insert['created_at']               = date('Y-m-d H:i:s');

        $cekUsername  = $this->User->get_username($username);
        if($cekUsername == NULL){
            $ids = $this->User->add($insert);
            if($ids > 0){
                $request->session()->flash('notip','<div class="alert alert-success">Data added successful</div>');
                return redirect('/admin/user');
            }else{
                $request->session()->flash('usernameNew',$username);
                $request->session()->flash('passwordNew',$password);
                $request->session()->flash('emailNew',$email);
                $request->session()->flash('nameNew',$name);
                $request->session()->flash('roleNew',$role);
                $request->session()->flash('notip','<div class="alert alert-danger">Add data failed, please try again</div>');
                return redirect('/admin/user/add');            
            }
        }else{
            $request->session()->flash('usernameNew',$username);
            $request->session()->flash('passwordNew',$password);
            $request->session()->flash('emailNew',$email);
            $request->session()->flash('nameNew',$name);
            $request->session()->flash('roleNew',$role);
            $request->session()->flash('notip','<div class="alert alert-danger">Add data failed, username is already</div>');
            return redirect('/admin/user/add');
        }
    }

    public function edit($id)
    {
        $getdata                        = $this->User->get_id($id);
        $username                       = $getdata->username;
        $password                       = '';
        $email                          = $getdata->email;
        $name                           = $getdata->name;
        $role                           = $getdata->role;
        $view['iduser']                 = $id;
        $view['username']               = $username;
        $view['password']               = $password;
        $view['email']                  = $email;
        $view['name']                   = $name;
        $view['role']                   = $role;   
        $view['url']                    = config('app.url')."public/admin/user/edit";
        $view['notip']                  = session('notip');
        return view('user.edit',$view);
    }

    public function update(Request $request)
    {
        $ids                                = $request->input('iduser');
        $username                           = $request->input('username');
        $password                           = $request->input('password');
        $email                              = $request->input('email');
        $name                               = $request->input('name');
        $role                               = $request->input('role');
        $insert['username']                 = $username;
        if($request->has('password')){
            $insert['password']                 = \Hash::make($password);    
        }
        
        $insert['email']                    = $email;
        $insert['name']                     = $name;
        $insert['role']                     = $role;
        $insert['updated_at']               = date('Y-m-d H:i:s');

        // $cekUsername  = $this->User->get_username($username);
        if(true){
            if($this->User->edit($ids,$insert)){
                $request->session()->flash('notip','<div class="alert alert-success">Data added successful</div>');
                return redirect('/admin/user');
            }else{
                $request->session()->flash('usernameNew',$username);
                $request->session()->flash('passwordNew',$password);
                $request->session()->flash('emailNew',$email);
                $request->session()->flash('nameNew',$name);
                $request->session()->flash('roleNew',$role);
                $request->session()->flash('notip','<div class="alert alert-danger">Add data failed, please try again</div>');
                return redirect('/admin/user/edit/'.$ids);            
            }
        }else{
            $request->session()->flash('usernameNew',$username);
            $request->session()->flash('passwordNew',$password);
            $request->session()->flash('emailNew',$email);
            $request->session()->flash('nameNew',$name);
            $request->session()->flash('roleNew',$role);
            $request->session()->flash('notip','<div class="alert alert-danger">Add data failed, username is already</div>');
            return redirect('/admin/user/edit/'.$ids);
        }
    }

    public function destroy(Request $request, $id)
    {
        $delete['iduser']           = $id;
        $delete['deleted_at']       = date('Y-m-d H:i:s');
        $this->User->edit($id,$delete);
        $request->session()->flash('notip','<div class="alert alert-danger">Delete data success</div>');
        return redirect('/admin/user');
    }

    


}