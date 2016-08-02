<?php
namespace Simon\Discuss\Providers;
use Illuminate\Support\ServiceProvider;
use App\Providers\PackageServiceProvider;
class DiscussServiceProvider extends PackageServiceProvider
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
	protected $namespaceName = 'discuss';
	
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
    	
    	/* $this->app->bind(
    		'Simon\Count\Services\Count\Interfaces\CountInterface',
    		'Simon\Count\Services\Count\CountService'
    	);
    	
    	$this->app->bind(
    		'Simon\Count\Services\Count\Interfaces\CountStoreInterface',
    		'Simon\Count\Services\Count\CountStoreService'
    	); */
    }
	
}