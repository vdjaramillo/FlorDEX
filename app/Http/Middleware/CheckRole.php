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
        if (strcmp ($request->user()->cargo, $role)==0) {
            return $next($request);
        }else{
            return redirect('/opciones-de-usuario');    
        }
    }
}
