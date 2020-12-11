<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()==null){
            return redirect()->back()->with("login_message","Bạn cần đăng nhập để thực hiện chức năng này")->with("class","alert alert-danger");
        }
        return $next($request);
    }
}
