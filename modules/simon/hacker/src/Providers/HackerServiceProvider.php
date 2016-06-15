<?php
namespace Simon\Hacker\Providers;
use Illuminate\Support\ServiceProvider;
use App\Providers\PackageServiceProvider;
class HackerServiceProvider extends PackageServiceProvider
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
	protected $namespaceName = 'hacker';
	
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
    		'Simon\Hacker\Services\Subject\Interfaces\SubjectInterface',
    		'Simon\Hacker\Services\Subject\SubjectService'
    	);
    	
    	$this->app->bind(
    		'Simon\Hacker\Services\Subject\Interfaces\SubjectStoreInterface',
    		'Simon\Hacker\Services\Subject\SubjectStoreService'
    	);
    	
    	$this->app->bind(
    		'Simon\Hacker\Services\Subject\Interfaces\SubjectUpdateInterface',
    		'Simon\Hacker\Services\Subject\SubjectUpdateService'
    	);
    	
    	$this->app->bind(
    		'Simon\Hacker\Services\Subject\Interfaces\SubjectDestroyInterface',
    		'Simon\Hacker\Services\Subject\SubjectDestroyService'
    	);
    	
    }
	
}