<?php

namespace App\Http\Middleware;

use Closure;
use Log;
class userGroupMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$group)
    {
        Log:info($group);
        $arr_role = explode(':', $group);
        if(in_array(session('role'),$arr_role) ){
             return $next($request);     
        }else{
            return redirect('admin/logout');
        }
       
    }
}
