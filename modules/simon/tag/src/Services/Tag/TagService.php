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
	
	/**
	 * 热门标签
	 * @author simon
	 */
	public function hotTags()
	{
		return $this->model->orderBy('count_num','desc')->take(20)->get();
	}
	
	public function tagSearch($name)
	{//->where('status',TagModel::STATUS_VERIFIED)
		return $this->model->where('name','like',"%{$name}%")->orderBy('count_num','desc')->get();
	}
	
	public function assocSearch($name) 
	{	//where('status',TagModel::STATUS_VERIFIED)->
		
		//此处可能需要分页，暂时先这样
		
		//获取当前标签
		$tag = $this->model->where('name',$name)->first();
		
		//获取所有关联
		$outsides = $this->tagOutside->where('tag_id',$tag->id)->get();
		
		$models = [];
		foreach ($outsides as $outside)
		{
			$model = (new $outside->outside_type)->find($outside->outside_id);
			if ($model)  $models[] = $model;
		}
		
		return ['models'=>$models,'tag'=>$tag];
	}
}