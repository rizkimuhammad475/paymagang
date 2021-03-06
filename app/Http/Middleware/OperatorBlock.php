<?php

namespace App\Http\Middleware;

use Closure;

class OperatorBlock
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
        if (\Auth::check()) {

            if (\Auth::user()->role_id == 3) {

                return \Redirect::back()->with('err_msg','Sorry permission denied');
            }

            return $next($request);
        }
        
        return \Redirect::to('/');
    }
}
