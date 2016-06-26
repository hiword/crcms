<?php
namespace Simon\Document\Services\Doubi;
use Simon\Document\Models\Document as DocumentModel;
use Simon\Document\Services\Document;
use Simon\Document\Services\Doubi\Interfaces\DoubiInterface;
// use Simon\Document\Models\Category;
use Illuminate\Support\Facades\DB;
use Simon\Document\Models\Doubi as DoubiModel;
use Simon\Document\Services\Doubi;
class DoubiService extends Doubi implements DoubiInterface
{
	protected $categories = null;
	
// 	public function __construct(DocumentModel $Document,Category $Category)
// 	{
// 		parent::__construct($Document);
// 		$this->categories = $Category;
// 	}

	public function status()
	{
		return DoubiModel::STATUS;
	}
	
	public function paginate(array $appends = [])
	{
		$paginate = $this->model->orderBy(DoubiModel::CREATED_AT,'DESC')->paginate(15);
		return ['models'=>$paginate->items(),'page'=>$paginate->appends($appends)->render()];
	}
	
	public function paginateFront($cid = 0,array $appends = []) 
	{
		if ($cid) 
		{
			$this->model = $this->model->join('category_documents',function($join) use ($cid){
				$join->on('category_documents.document_id','=','doubis.id')
					  ->where('category_documents.category_id','=',$cid)
					  ->where('category_documents.type','=','Simon\Document\Models\Doubi');
			});
		}
		
		$paginate = $this->model->where('doubis.status',1)->orderBy('doubis.'.DoubiModel::CREATED_AT,'DESC')->paginate(15);

		$items = $paginate->items();
		foreach ($items as $item)
		{
			$item->tags = $this->tags($item);
			$item->good = $this->count($item,'good');
			$item->bad = $this->count($item,'bad');
		}
		
		return ['models'=>$items,'page'=>$paginate->appends($appends)->render()];
	}
	
	public function lists($limit = 5)
	{
		return $this->model->where('status',DocumentModel::STATUS_OPEN)->orderBy(DocumentModel::CREATED_AT,'desc')->take($limit)->get();
	}
	
	public function find($id)
	{
		return $this->model->findOrFail($id);
	}
	
	public function categories(DoubiModel $DoubiModel)
	{
		return $DoubiModel->belongsToManyCategory;
	}
	
	public function categoryIds(DoubiModel $DoubiModel)
	{
		return $this->categories($DoubiModel)->lists('id')->toArray();
	}
	
	public function images(DocumentModel $Document) 
	{
		return $Document->morphManyImages;
	}
	
	public function tags(DoubiModel $DoubiModel) 
	{
		return $DoubiModel->morphToManyTag;
	}
	
	public function count(DoubiModel $DoubiModel,$type = 'view')
	{
		return $DoubiModel->morphManyCount($type)->count();
	}
	
	public function prev($id) 
	{
		return $this->model->where('id','>',$id)->orderBy('id','desc')->first();
	}
	
	public function next($id) 
	{
		return $this->model->where('id','<',$id)->orderBy('id','desc')->first();
	}
}