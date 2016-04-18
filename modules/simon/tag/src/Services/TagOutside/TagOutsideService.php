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
	
}