<?php
namespace Simon\User\Providers;
use Illuminate\Support\ServiceProvider;
use App\Providers\PackageServiceProvider;
class UserServiceProvider extends PackageServiceProvider
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
	protected $namespaceName = 'user';
	
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
    		'Simon\User\Services\User\Interfaces\UserRegisterInterface',
    		'Simon\User\Services\User\UserRegisterService'
    	);
    	
    	$this->app->bind(
    		'Simon\User\Services\User\Interfaces\UserLoginInterface',
    		'Simon\User\Services\User\UserLoginService'
    	);
    	
    }
    
    public function provides()
    {
    	//'Simon\Document\Services\Interfaces\CategoryInterface'
    	return [];
    }
	
}