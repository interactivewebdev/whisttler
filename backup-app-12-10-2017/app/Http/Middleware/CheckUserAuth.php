<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserAuth {

    public function handle($request, Closure $next) {

        if( auth()->check() ){
            return $next($request);
        }

        return redirect('/');
    }
}
