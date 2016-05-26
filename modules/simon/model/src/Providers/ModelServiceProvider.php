<?php
namespace Simon\Model\Providers;
use Illuminate\Support\ServiceProvider;
use App\Providers\PackageServiceProvider;
use Illuminate\Routing\Router;
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
    		'Simon\Model\Services\Model\Interfaces\SchemaInterface',
    		'Simon\Model\Services\Model\SchemaService'
    	);
    	
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
    	
    	$this->app->bind(
    		'Simon\Model\Services\Field\Interfaces\FieldInterface',
    		'Simon\Model\Services\Field\FieldService'
    	);
    	
    	$this->app->bind(
    		'Simon\Model\Services\Field\Interfaces\FieldStoreInterface',
    		'Simon\Model\Services\Field\FieldStoreService'
    	);
    	
    	$this->app->bind(
    		'Simon\Model\Services\Field\Interfaces\FieldUpdateInterface',
    		'Simon\Model\Services\Field\FieldUpdateService'
    	);
    	
    	$this->app->bind(
    		'Simon\Model\Services\Field\Interfaces\FieldDestroyInterface',
    		'Simon\Model\Services\Field\FieldDestroyService'
    	);
    	
    	$this->app->bind(
    		'Simon\Model\Services\Element\Interfaces\ElementInterface',
    		'Simon\Model\Services\Element\ElementService'
    	);
    }
	
}