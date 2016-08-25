<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/25
 * Time: 14:01
 */

namespace Simon\User\Http\Middleware;

use Closure;
use Simon\User\Facades\User;

class Authentication
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
        if (empty(User::user()))
        {
            abort(403);
        }

        return $next($request);
    }

}