<?php
namespace Simon\Document\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use App\Providers\PackageServiceProvider;
class DocumentServiceProvider extends PackageServiceProvider
{
	
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;
	
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
    			'Simon\Document\Services\Category'
    	);
    }
    
    public function provides()
    {
    	return ['Simon\Document\Services\Interfaces\CategoryInterface'];
    }
	
}