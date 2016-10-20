<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $primaryKey = 'iduser';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'username', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    function get_username($username){
    	return User::where('username',$username)->first();
    }

    function get_page(){
        return User::orderBy($this->primaryKey,'DESC')->where('deleted_at',NULL)->paginate(20);
    }

    function get_search($cari){
        return User::orderBy($this->primaryKey,'DESC')->where('username','like','%'.$cari.'%')->paginate(20);
    }

    function add($data){
        return User::insert($data);
    }

    function get_id($id){
        return User::find($id);
    }

    function edit($id,$data){
        return User::where($this->primaryKey,$id)->update($data);
    }

    function get_ids(){
        return User::orderBy($this->primaryKey,'DESC')->first();
    }

    function get_byname_all($name){
        return User::orderBy('name','ASC')->where('name','like','%'.$name.'%')->get();
    }
}
