<?php
namespace Simon\Document\Services;
use App\Services\Service;
use App\Services\Paginate;
use Simon\Document\Models\Category;
use Simon\Document\Models\Document as DocumentModel;
use Simon\Document\Models\DocumentData;
use Simon\Document\Fields\Document\Status;
class Document extends Service
{
	
	protected $modelAppend = null;
	
	protected $category = null;
	
	public function __construct(DocumentModel $Document,DocumentData $DocumentData,Category $Category)
	{
		parent::__construct();
		
		$this->model = $Document;
		$this->modelAppend = $DocumentData;
		$this->category = $Category;
	}
	
	public function page(Paginate $Paginate,$cid = 0,array $data = [])
	{
// 		$Paginate = app('App\Services\Paginate');
		
		if (!empty($cid) && is_numeric($cid))
		{
			$this->model = $this->category->findOrFail($cid)->belongsToManyDocument();
		}
		
		$this->model = $this->model->where('status',Status::STATUS_OPEN)->orderBy(DocumentModel::CREATED_AT,'desc');//->where('status',1);
		
		$page = $Paginate->setUrlParams($data)->setPageSize(2)->page($this->model,function ($items){return hash_append($items);});
		return $page;
	}
	
	public function single($id)
	{
		$this->model = $this->model->where('id',$id)->where('status',Status::STATUS_OPEN)->first();
		$this->model->hasOneDocumentData = $this->model->hasOneDocumentData;
		return $this->model;
	}
	
	public function descriptions(array $ids,array $hashs)
	{
		$ids = hash_safe_data($ids,$hashs);
		
		$models = $this->modelAppend->whereIn('did',$ids)->get();
		
		if($models)
		{
			foreach ($models as $model)
			{
				$model->content = mb_substr(strip_tags($model->content),0,255,'UTF-8');
			}
		}
		
		return $models;
	}
	
}