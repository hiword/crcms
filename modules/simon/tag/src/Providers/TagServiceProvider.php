<?php
namespace Simon\Tag\Providers;
use Illuminate\Support\ServiceProvider;
use App\Providers\PackageServiceProvider;
class TagServiceProvider extends PackageServiceProvider
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
	protected $namespaceName = 'tag';
	
	
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
    		'Simon\Tag\Services\Tag\Interfaces\TagInterface',
    		'Simon\Tag\Services\Tag\TagService'
    	);
    	
    	$this->app->bind(
    		'Simon\Tag\Services\Tag\Interfaces\TagStoreInterface',
    		'Simon\Tag\Services\Tag\TagStoreService'
    	);
    	
    	$this->app->bind(
    		'Simon\Tag\Services\Tag\Interfaces\TagUpdateInterface',
    		'Simon\Tag\Services\Tag\TagUpdateService'
    	);
    	
    	$this->app->bind(
    		'Simon\Tag\Services\Tag\Interfaces\TagDestroyInterface',
    		'Simon\Tag\Services\Tag\TagDestroyService'
    	);
    	
    	
    	$this->app->bind(
    		'Simon\Tag\Services\TagOutside\Interfaces\TagOutsideStoreInterface',
    		'Simon\Tag\Services\TagOutside\TagOutsideStoreService'
    	);
    	
    	$this->app->bind(
    		'Simon\Tag\Services\TagOutside\Interfaces\TagOutsideInterface',
    		'Simon\Tag\Services\TagOutside\TagOutsideService'
    	);
    	
    	$this->app->bind(
    		'Simon\Tag\Services\TagOutside\Interfaces\TagOutsideDestroyInterface',
    		'Simon\Tag\Services\TagOutside\TagOutsideDestroyService'
    	);
    	
    	
    }
	
}