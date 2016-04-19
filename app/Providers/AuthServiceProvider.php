<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Services\Auth;
class AuthServiceProvider extends ServiceProvider
{
	
	protected $defer = true;
	
	/* 
	 * (non-PHPdoc)
	 * @see \Illuminate\Support\ServiceProvider::register()
	 * @author simon
	 */
	public function register()
	{
		
		$this->app->singleton([
			'App\Services\Interfaces\AuthInterface'=>'auth'
		],function($app){
			$key = $app['request']->is('manage/*') ? 'manage_session' : 'front_session';//;$app['config']['user']['session_key'];
			return new Auth($key);
		});
		
	}

	public function provides()
	{
		return ['App\Services\Interfaces\AuthInterface'];
	}
	
	
}
