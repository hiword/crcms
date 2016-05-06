<?php
namespace Simon\Tag\Services\Tag;
use Simon\Tag\Services\Tag;
use Simon\Tag\Services\Tag\Interfaces\TagInterface;
use Simon\Tag\Models\Tag as TagModel;
use Illuminate\Support\Facades\DB;
use Simon\Tag\Models\TagOutside;
class TagService extends Tag implements TagInterface
{
	
	protected $tagOutside = null;
	
	public function __construct(TagModel $Tag,TagOutside $TagOutside)
	{
		parent::__construct($Tag);
		$this->tagOutside = $TagOutside;
	}
	
// 	LengthAwarePaginatorContract
	protected function paginate($paginate,array $appends = [])
	{
		return ['models'=>$paginate->items(),'page'=>$paginate->appends($appends)->render()];
	}
	
	public function paginateBackend(array $appends = [])
	{
		$paginate = $this->model->orderBy(TagModel::CREATED_AT,'DESC')->paginate(15);
		return $this->paginate($paginate,$appends);
	}

	public function paginateFront()
	{
// 		$paginate = $this->model->select(DB::raw('count(*) as tag_count, name'))->orderBy(TagModel::CREATED_AT,'DESC')->where('status',TagModel::STATUS_VERIFIED)->groupBy('name')->paginate(48);
		$paginate = $this->model->orderBy(TagModel::CREATED_AT,'DESC')->where('status',TagModel::STATUS_VERIFIED)->paginate(48);
		
		$paginate = $this->paginate($paginate);
		
		if ($paginate['models'])
		{
			foreach ($paginate['models'] as $model)
			{
				$model->count = $this->tagOutside->countTags($model->id);
			}
		}
		
		return $paginate;
	}
	
	public function find($id)
	{
		return $this->model->findOrFail($id);
	}
	
	public function status()
	{
		return TagModel::STATUS;
	}
	
	public function lists(array $id) 
	{
		return $this->model->whereIn('id',$id)->get();
	}
	
	//这里先这样，其实还需要在tags里面加个统计
	public function hostTags()
	{
		return $this->model->orderBy('id','desc')->take(20)->get();
	}
	
	public function search($name) 
	{	//where('status',TagModel::STATUS_VERIFIED)->
		return $this->model->where('name','like',"%{$name}%")->orderBy(TagModel::CREATED_AT,'desc')->get();
	}
}