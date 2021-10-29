<?php

namespace App\Http\Middleware;

use Closure;

class Pad
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
         if (auth()->check() && auth()->user()->role['name']== 'pad')
         
        {return $next($request);}

        else {
            return redirect('/');//abort(404);
        }
        //
    }
}
