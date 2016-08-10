<?php
namespace Mail\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use App\Providers\PackageServiceProvider;
class MailServiceProvider extends PackageServiceProvider
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
	protected $namespaceName = 'mail';
	
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
    	
//     	$this->app->bind(
//     		'Simon\Mail\Services\Mail\Interfaces\MailStoreInterface',
//     		'Simon\Mail\Services\Mail\MailStoreService'
//     	);
    }
	
}