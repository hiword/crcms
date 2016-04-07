<?php
namespace Simon\Document\Services\Document;
use Simon\Document\Services\Document;
use Simon\Document\Services\Document\Interfaces\DocumentStoreInterface;
use App\Services\Traits\StoreTrait;
use Simon\Document\Models\DocumentData;
class DocumentStoreService extends Document implements DocumentStoreInterface
{
	use StoreTrait;
	
	protected $append = null;
	
	public function __construct(\Simon\Document\Models\Document $Document,DocumentData $DocumentData)
	{
		parent::__construct($Document);
		$this->append = $DocumentData;
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
		$this->model->title = $data['title'];
		$this->model->status = $data['status'];
		$this->model->thumbnail = $data['thumbnail'];
		$this->builtStore();
		$this->model->save();
		
		//append
		$this->append->did = $this->model->id;
		$this->append->content = $append['content'];
// 		$this->append->seo_title = $data['seo_title'];
		$this->append->keyword = $append['seo_keywords'];
		$this->append->intro = $append['seo_description'];
		$this->append->save();
		
		return $this->model;
	}

	
	


	
	
	
}
