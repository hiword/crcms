<?php
namespace Simon\Document\Services\Document;
use Simon\Document\Models\Document as DocumentModel;
use Simon\Document\Services\Document;
use Simon\Document\Services\Document\Interfaces\DocumentInterface;
class DocumentService extends Document implements DocumentInterface
{
	
	public function paginate(array $appends = [])
	{
		$paginate = $this->model->orderBy(DocumentModel::CREATED_AT,'DESC')->paginate(2);
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