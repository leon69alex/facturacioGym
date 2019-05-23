<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserRoles
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
        //REBEM TOTS ELS ARGUMENTS QUE REP EL MIDDLEWARE.
        //EXTRAIEM NOMES ELS ARGUMENTS QUE NECESSITEM. 
        //SI NO FESSIM AIXÒ TAMBE OBTINDRIEM EL "$request" i el "Closure"
        $roles = array_slice(func_get_args(), 2);

        //dd($roles);

        if(auth()->user()->hasRoles($roles)){
            return $next($request);
        }

        return redirect('/');

    }
}
