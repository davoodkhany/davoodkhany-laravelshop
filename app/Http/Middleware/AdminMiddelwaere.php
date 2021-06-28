<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddelwaere
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


        if($request->user()->isSupperUser() || $request->user()->isStaffUser() ){
            return $next($request);
        }

        return redirect('/');

    }
}
