<?php

namespace App\Http\Middleware\admin;

use Closure;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->session()->get('userid') != "admin"){
            return redirect('/admin');
        }
        
        return $next($request);
    }
}