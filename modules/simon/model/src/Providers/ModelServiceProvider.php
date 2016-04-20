<?php
namespace Simon\Model\Providers;
use Illuminate\Support\ServiceProvider;
use App\Providers\PackageServiceProvider;
class ModelServiceProvider extends PackageServiceProvider
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
	protected $namespaceName = 'model';
	
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
    		'Simon\Model\Services\Model\Interfaces\ModelInterface',
    		'Simon\Model\Services\Model\ModelService'
    	);
    	
    	$this->app->bind(
    		'Simon\Model\Services\Model\Interfaces\ModelStoreInterface',
    		'Simon\Model\Services\Model\ModelStoreService'
    	);
    	
    	$this->app->bind(
    		'Simon\Model\Services\Model\Interfaces\ModelUpdateInterface',
    		'Simon\Model\Services\Model\ModelUpdateService'
    	);
    	
    	$this->app->bind(
    		'Simon\Model\Services\Model\Interfaces\ModelDestroyInterface',
    		'Simon\Model\Services\Model\ModelDestroyService'
    	);
    }
	
}