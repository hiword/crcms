<?php
namespace Simon\Model\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
class ModelServiceProvider extends ServiceProvider
{
	
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;
	
	/**
	 * 
	 * 
	 * @author simon
	 */
	public function boot()
	{
		//加载路由
    	$this->setupRoutes($this->app->router);
    	
    	//定义当前路径
    	$path = realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
    	
    	$namespace = 'model';
    	
    	//加载视图
    	$this->loadViewsFrom($path.'views',$namespace);
    	
    	//加载语言包
    	$this->loadTranslationsFrom($path.'lang', $namespace);
    	
    	//移动目录
    	$this->publishes([
//     			$path.'config' => config_path(),
//     			$path.'views' => base_path('resources/views/vendor/'.$namespace),
//     			$path.'database'=>database_path(),
    	]);
	}
	
    /**
     * 
     * (non-PHPdoc)
     * @see \Illuminate\Support\ServiceProvider::register()
     * @author simon
     */
    public function register()
    {
    }
	
    /**
     * Define the routes for the application.
     *
     * @param \Illuminate\Routing\Router $router
     * @return void
     */
    protected function setupRoutes(Router $router)
    {
    	$router->group(['namespace' => 'Simon\Model\Http\Controllers'], function($router)
    	{
    		$file = dirname(__DIR__).DIRECTORY_SEPARATOR.'Http'.DIRECTORY_SEPARATOR.'router.php';
    		file_exists($file) && require $file; 
    	});
    }
}