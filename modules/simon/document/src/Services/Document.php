<?php
namespace Simon\Document\Services;
use App\Services\Service;
use App\Services\Paginate;
use Simon\Document\Models\Category;
use Simon\Document\Models\Document as DocumentModel;
use Simon\Document\Models\DocumentData;
class Document extends Service
{
	public function __construct(DocumentModel $Document)
	{
		parent::__construct();
		$this->model = $Document;
	}
	
	public function page($cid = 0,Paginate $Paginate,Category $Category)
	{
		if (!empty($cid) && is_numeric($cid))
		{
			$this->model = $Category->findOrFail($cid)->belongsToManyDocument();
		}
		
		$this->model = $this->model->where('status',1)->orderBy(DocumentModel::CREATED_AT,'desc');//->where('status',1);
		
		$page = $Paginate->setUrlParams($this->data)->setPageSize(2)->page($this->model,function($items){
			foreach ($items as $item)
			{
				$item->hash = create_hash($item->id);
			}
			return $items;
		});
		
		return $page;
	}
	
	public function contents()
	{
		$DocumentData = app('Simon\Document\Models\DocumentData');
		
		$ids = hash_safe_data($this->data['id'],$this->data['hash']);
		
		return $DocumentData->whereIn('id',$ids)->get();
	}
	
}