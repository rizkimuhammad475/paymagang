<?php

namespace App\Http\Middleware;

use Closure;

class CoursePermission
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
        $path       =       collect(explode('/', $request->url()));
        $url        =       $path->last();
        if (\Auth::check()) {

            if (\Auth::user()->role_id == 3) {

                if (\Auth::user()->course_id == $url) {
                    return $next($request);
                }
                return \Redirect::back()->with('err_msg','Sorry permission denied');
            }

            return $next($request);
        }
        
        return \Redirect::to('/');
    }
}
