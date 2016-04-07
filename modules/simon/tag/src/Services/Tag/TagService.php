<?php
namespace Simon\Tag\Services\Tag;
use Simon\Tag\Services\Tag;
use Simon\Tag\Services\Tag\Interfaces\TagInterface;
use Simon\Tag\Models\Tag as TagModel;
class TagService extends Tag implements TagInterface
{
	
	public function paginate(array $appends = [])
	{
		$paginate = $this->model->orderBy(TagModel::CREATED_AT,'DESC')->paginate(15);
		return ['models'=>$paginate->items(),'page'=>$paginate->appends($appends)->render()];
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
	
	public function search($name) 
	{	//where('status',TagModel::STATUS_VERIFIED)->
		return $this->model->where('name','like',"%{$name}%")->orderBy(TagModel::CREATED_AT,'desc')->get();
	}
}