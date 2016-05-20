<?php
/**
 * 会员是否登录中间件
 * @author simon
 */
namespace Simon\System\Http\Middleware;

use Closure;
use App\Facades\Auth;

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
    	if (Auth::user())
    	{
    		return $next($request);
    	}
    	
    	return redirect('manage/auth/login');
    }
}
