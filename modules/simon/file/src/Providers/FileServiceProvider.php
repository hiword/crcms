<?php
namespace Simon\File\Providers;
use App\Providers\PackageServiceProvider;
class FileServiceProvider extends PackageServiceProvider
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
	protected $namespaceName = 'file';
	
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
    		'Simon\File\Services\File\Interfaces\FileInterface',
    		'Simon\File\Services\File\FileService'
    	);
    	
    	$this->app->bind(
    		'Simon\File\Services\File\Interfaces\FileStoreInterface',
    		'Simon\File\Services\File\FileStoreService'
    	);
    	
    	$this->app->bind(
    		'Simon\File\Services\Image\Interfaces\ImageInterface',
    		'Simon\File\Services\Image\ImageService'
    	);
    	
    	$this->app->bind(
    		'Simon\File\Services\Image\Interfaces\ImageStoreInterface',
    		'Simon\File\Services\Image\ImageStoreService'
    	);
    	
    	$this->app->bind(
    		'Simon\File\Services\Image\Interfaces\ImageDestroyInterface',
    		'Simon\File\Services\Image\ImageDestroyService'
    	);
    }
	
    public function provides()
    {
    	return [];
    }
}