<?php
/**
 * 会员是否登录中间件
 * @author simon
 */
namespace Simon\System\Http\Middleware;

use Closure;

class Authenticate
{

    public function __construct(){}

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    	if (user_session())
    	{
    		return $next($request);
    	}
    	
    	return redirect('manage/auth/login');
    }
}
