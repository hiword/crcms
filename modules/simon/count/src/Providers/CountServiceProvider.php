<?php
namespace Simon\Count\Providers;
use Illuminate\Support\ServiceProvider;
use App\Providers\PackageServiceProvider;
class CountServiceProvider extends PackageServiceProvider
{
	
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;
	
	/**
	 * 
	 * @var unknown
	 * @author simon
	 */
	protected $namespaceName = 'count';
	
	/**
	 * 
	 * @var unknown
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
    		'Simon\Count\Services\Count\Interfaces\CountInterface',
    		'Simon\Count\Services\Count\CountService'
    	);
    	
    	$this->app->bind(
    		'Simon\Count\Services\Count\Interfaces\CountStoreInterface',
    		'Simon\Count\Services\Count\CountStoreService'
    	);
    }
	
}