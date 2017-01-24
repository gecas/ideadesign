<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CheckLocale
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
         if(!Session::has('locale')) {
            Session::put('locale', 'lt');
        }

        app()->setLocale(Session::get('locale'));

        return $next($request);
    }
}
