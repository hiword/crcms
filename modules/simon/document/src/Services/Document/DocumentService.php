<?php
namespace Simon\Document\Services\Document;
use Simon\Document\Models\Document as DocumentModel;
use Simon\Document\Services\Document;
use Simon\Document\Services\Document\Interfaces\DocumentInterface;
// use Simon\Document\Models\Category;
use Illuminate\Support\Facades\DB;
class DocumentService extends Document implements DocumentInterface
{
	protected $categories = null;
	
// 	public function __construct(DocumentModel $Document,Category $Category)
// 	{
// 		parent::__construct($Document);
// 		$this->categories = $Category;
// 	}
	
	public function paginate(array $appends = [])
	{
		$paginate = $this->model->orderBy(DocumentModel::CREATED_AT,'DESC')->paginate(15);
		return ['models'=>$paginate->items(),'page'=>$paginate->appends($appends)->render()];
	}
	
	public function frontPaginate($cid = 0,array $appends = []) 
	{
		if ($cid) 
		{
			$this->model = $this->model->join('category_documents',function($join) use ($cid){
				$join->on('category_documents.document_id','=','documents.id')
					  ->where('category_documents.category_id','=',$cid);
			});
		}
		
		$paginate = $this->model->where('documents.status',1)->orderBy('documents.'.DocumentModel::CREATED_AT,'DESC')->paginate(21);
		
		return ['models'=>$paginate->items(),'page'=>$paginate->appends($appends)->render()];
	}
	
	public function find($id)
	{
		return $this->model->findOrFail($id);
	}
	
	public function categories(DocumentModel $Document)
	{
		return $Document->belongsToManyCategory();
	}
	
	public function categoryIds(DocumentModel $Document)
	{
		return $this->categories($Document)->lists('id')->toArray();
	}
	
	public function images(DocumentModel $Document) 
	{
		return $Document->morphManyImages;
	}
	
	public function tags(DocumentModel $Document) 
	{
		return $Document->morphToManyTag;
	}
}