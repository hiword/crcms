<?php
namespace Simon\Document\Providers;
use Illuminate\Support\ServiceProvider;
use App\Providers\PackageServiceProvider;
use Illuminate\Support\Facades\Blade;
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

	
	public function boot()
	{
		parent::boot();
		
		//category
		Blade::directive('category',function($expression){
			$expression = $expression ? : '()';
			return "<?php foreach(app('Simon\Document\Blade\Category')->resolve{$expression} as \$category):?>";
		});
			 
		Blade::directive('endcategory',function($expression){
			return "<?php endforeach; ?>";
		});
		//category end
		
		//next
		Blade::directive('next',function($expression){
			$expression = $expression ? : '()';
			return "<?php \$next = app('Simon\Document\Blade\Document')->next{$expression};?>";
		});
		
		//prev
		Blade::directive('prev',function($expression){
			$expression = $expression ? : '()';
			return "<?php \$prev = app('Simon\Document\Blade\Document')->prev{$expression};?>";
		});
		
		Blade::directive('document',function($expression){
			$expression = $expression ? : '()';
			$php = "<?php \$__documents = app('Simon\Document\Blade\Document')->resolve{$expression}; ?>";
			$php .= "<?php \$page = \$__documents['page'] ?>";
			$php .= "<?php foreach(\$__documents['models'] as \$document):?>";
			return $php;
		});
		
		Blade::directive('enddocument',function($expression){
			return "<?php endforeach; ?>";
		});
	}
	
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
    			'Simon\Document\Services\Category\Interfaces\CategoryInterface',
    			'Simon\Document\Services\Category\CategoryService'
    	);
    	
    	$this->app->bind(
    			'Simon\Document\Services\Category\Interfaces\CategoryStoreInterface',
    			'Simon\Document\Services\Category\CategoryStoreService'
    	);
    	
    	$this->app->bind(
    			'Simon\Document\Services\Category\Interfaces\CategoryUpdateInterface',
    			'Simon\Document\Services\Category\CategoryUpdateService'
    	);
    	
    	$this->app->bind(
    			'Simon\Document\Services\Category\Interfaces\CategoryDestroyInterface',
    			'Simon\Document\Services\Category\CategoryDestroyService'
    	);
    	
    	$this->app->bind(
    			'Simon\Document\Services\Document\Interfaces\DocumentStoreInterface',
    			'Simon\Document\Services\Document\DocumentStoreService'
    	);
    	
    	$this->app->bind(
    			'Simon\Document\Services\Document\Interfaces\DocumentUpdateInterface',
    			'Simon\Document\Services\Document\DocumentUpdateService'
    	);
    	
    	$this->app->bind(
    			'Simon\Document\Services\Document\Interfaces\DocumentDestroyInterface',
    			'Simon\Document\Services\Document\DocumentDestroyService'
    	);
    	
    	$this->app->bind(
    			'Simon\Document\Services\DocumentData\Interfaces\DocumentDataStoreInterface',
    			'Simon\Document\Services\DocumentData\DocumentDataStoreService'
    	);
    	
    	$this->app->bind(
    			'Simon\Document\Services\DocumentData\Interfaces\DocumentDataUpdateInterface',
    			'Simon\Document\Services\DocumentData\DocumentDataUpdateService'
    	);
    	
    	$this->app->bind(
    			'Simon\Document\Services\CategoryDocument\Interfaces\CategoryDocumentStoreInterface',
    			'Simon\Document\Services\CategoryDocument\CategoryDocumentStoreService'
    	);
    	
    	$this->app->bind(
    			'Simon\Document\Services\CategoryDocument\Interfaces\CategoryDocumentUpdateInterface',
    			'Simon\Document\Services\CategoryDocument\CategoryDocumentUpdateService'
    	);
    	
    	$this->app->bind(
    			'Simon\Document\Services\Document\Interfaces\DocumentInterface',
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