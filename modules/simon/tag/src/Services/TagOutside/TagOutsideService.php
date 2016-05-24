<?php
namespace Simon\Tag\Services\TagOutside;
use Simon\Tag\Services\TagOutside\Interfaces\TagOutsideInterface;
use Simon\Tag\Services\TagOutside;
class TagOutsideService extends TagOutside implements TagOutsideInterface
{
	
	public function paginateBackend(array $appends = []) 
	{
		$paginate = $this->model->paginate(20);
		return ['models'=>$paginate->items(),'page'=>$paginate->appends($appends)->render()];
	}
	
	public function lists($outsideId,$outsideType)
	{
		return $this->model->where('outside_id',$outsideId)->where('outside_type',$outsideType)->get();
	}
	
	public function find($outsideId,$outsideType)
	{
		return $this->model->where('outside_id',$outsideId)->where('outside_type',$outsideType)->findOrFail();
	}
}