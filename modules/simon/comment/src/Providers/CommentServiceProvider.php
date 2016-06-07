<?php
namespace Simon\Comment\Providers;
use Illuminate\Support\ServiceProvider;
use App\Providers\PackageServiceProvider;
class CommentServiceProvider extends PackageServiceProvider
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
	protected $namespaceName = 'comment';
	
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
    		'Simon\Comment\Services\Comment\Interfaces\CommentInterface',
    		'Simon\Comment\Services\Comment\CommentService'
    	);
    	
    	$this->app->bind(
    		'Simon\Comment\Services\Comment\Interfaces\CommentStoreInterface',
    		'Simon\Comment\Services\Comment\CommentStoreService'
    	);
    }
	
}