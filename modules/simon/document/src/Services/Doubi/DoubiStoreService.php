<?php
namespace Simon\Document\Services\Doubi;
use Simon\Document\Services\Doubi;
use Simon\Document\Services\Doubi\Interfaces\DoubiStoreInterface;
use App\Services\Traits\StoreTrait;
use Illuminate\Support\Facades\Input;
use Simon\Document\Models\DoubiData;
class DoubiStoreService extends Doubi implements DoubiStoreInterface
{
	use StoreTrait;
	
	protected $append = null;
	
	public function __construct(\Simon\Document\Models\Doubi $Doubi,DoubiData $DoubiData)
	{
		parent::__construct($Doubi);
		$this->append = $DoubiData;
	}
	
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Document\Services\Document\Interfaces\DocumentStoreInterface::store()
	 * @author simon
	 */
	public function store(array $data, array $append)
	{
		// TODO Auto-generated method stub
		
		//document
		$this->model->title = $data['seo_title'];
		$this->model->status = $data['status'];
		$this->model->picture = $data['picture'];
		$this->builtModelStore();
		$this->model->save();
		
		//append
		$this->append->did = $this->model->id;
		$this->append->content = $append['content'];
// 		$this->append->seo_title = $data['seo_title'];
		$this->append->keyword = $append['seo_keywords'];
		$this->append->intro = $append['seo_intro'];
		$this->append->save();
		
		return $this->model;
	}

	
	


	
	
	
}
