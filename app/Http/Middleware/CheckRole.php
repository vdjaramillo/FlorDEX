<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (!(is_null($request->user())) and strcmp ($request->user()->cargo, $role)==0) {
            return $next($request);
        }else if(is_null($request->user())){
            return redirect('/login');
        }else{
            return redirect('/opciones-de-usuario');    
        }
    }
}
