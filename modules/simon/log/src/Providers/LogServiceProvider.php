<?php
namespace Simon\Log\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use App\Providers\PackageServiceProvider;
class LogServiceProvider extends PackageServiceProvider
{
	
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;
	
	/**
	 * 
	 * @var string
	 * @author simon
	 */
	protected $namespaceName = 'log';
	
	/**
	 * 
	 * @var string
	 * @author simon
	 */
	protected $packagePath = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;
	
    /**
     * 
     * (non-PHPdoc)
     * @see \Illuminate\Support\ServiceProvider::register()
     * @author simon
     */
    public function register()
    {
    	parent::register();
    	 
    	$this->app->bind(
    		'Simon\Log\Services\Interfaces\ActionLogInterface',
    		'Simon\Log\Services\ActionLogService'
    	);
    }
	
}