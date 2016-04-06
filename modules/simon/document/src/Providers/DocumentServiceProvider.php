<?php
namespace Simon\Document\Providers;
use Illuminate\Support\ServiceProvider;
use App\Providers\PackageServiceProvider;
class DocumentServiceProvider extends PackageServiceProvider
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
	protected $namespaceName = 'document';
	
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
    			'Simon\Document\Services\Interfaces\CategoryInterface',
    			'Simon\Document\Services\Category\CategoryService'
    	);
    	
    	$this->app->bind(
    			'Simon\Document\Services\Interfaces\DocumentInterface',
    			'Simon\Document\Services\Document\DocumentService'
    	);
    	
    	$this->app->bind(
    			'Simon\Document\Services\Interfaces\DocumentDataInterface',
    			'Simon\Document\Services\DocumentData\DocumentDataService'
    	);
    }
    
    public function provides()
    {
    	//'Simon\Document\Services\Interfaces\CategoryInterface'
    	return [];
    }
	
}