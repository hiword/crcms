<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
abstract class PackageServiceProvider extends ServiceProvider
{
	
	/**
	 * 
	 * @var string
	 * @author simon
	 */
	protected $namespaceName = null;
	
	
	/**
	 * 
	 * @var string
	 * @author simon
	 */
	protected $packagePath = null;
	
	
	
	public function __construct($app)
	{
		parent::__construct($app);
		
		if ($this->packagePath)
		{
			$this->packagePath = realpath($this->packagePath).DIRECTORY_SEPARATOR;
		}
	}
	
	/**
	 *
	 *
	 * @author simon
	 */
	public function boot()
	{
		//加载路由
		$this->setupRoutes($this->app->router);
		 
		//加载视图
		$this->loadViewsFrom($this->packagePath.'views',$this->namespaceName);
		 
		//加载语言包
		$this->loadTranslationsFrom($this->packagePath.'lang', $this->namespaceName);
		 
		//移动目录
		$this->publishes([
//     			$this->packagePath.'config' => config_path(),
//     			$this->packagePath.'views' => base_path('resources/views/vendor/'.$this->namespaceName),
//     			$this->packagePath.'database'=>database_path(),
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
		$this->mergeConfigFrom(
			$this->packagePath."config/{$this->namespaceName}.php", $this->namespaceName
		);
	}
	
	/**
	 * Define the routes for the application.
	 *
	 * @param \Illuminate\Routing\Router $router
	 * @return void
	 */
	protected function setupRoutes(Router $router)
	{
		$router->group(['namespace' => ucwords($this->namespaceName).'\\Http\Controllers','middleware' => ['web']], function($router)
		{
			$file = $this->packagePath.'src'.DIRECTORY_SEPARATOR.'Http'.DIRECTORY_SEPARATOR.'router.php';
			file_exists($file) && require $file;
		});
	}
	
}