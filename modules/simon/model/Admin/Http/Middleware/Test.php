<?php
namespace Admin\Http\Middleware;
use Closure;
class Test {
	
	public function handle($request, Closure $next) {
		return $next($request);
	}
	
}