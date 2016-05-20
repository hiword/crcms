<?php
namespace Simon\System\Providers;
use Illuminate\Support\ServiceProvider;
use App\Providers\PackageServiceProvider;
class SystemServiceProvider extends PackageServiceProvider
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
	protected $namespaceName = 'system';
	
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
    		'Simon\System\Services\Admin\Interfaces\AdminInterface',
    		'Simon\System\Services\Admin\AdminService'
    	);
    	
    	$this->app->bind(
    		'Simon\System\Services\Admin\Interfaces\AdminStoreInterface',
    		'Simon\System\Services\Admin\AdminStoreService'
    	);
    	
    	$this->app->bind(
    		'Simon\System\Services\Admin\Interfaces\AdminUpdateInterface',
    		'Simon\System\Services\Admin\AdminUpdateService'
    	);
    	
    	$this->app->bind(
    		'Simon\System\Services\Admin\Interfaces\AdminDestroyInterface',
    		'Simon\System\Services\Admin\AdminDestroyService'
    	);
    	
    	$this->app->bind(
    		'Simon\System\Services\Admin\Interfaces\AdminLoginInterface',
    		'Simon\System\Services\Admin\AdminLoginService'
    	);
    }
	
}