<?php
namespace Simon\Tag\Services\TagContent;
use Simon\Tag\Services\TagContent;
use Simon\Tag\Services\TagContent\Interfaces\TagContentStoreInterface;
use App\Services\Traits\StoreTrait;
class TagContentStoreService extends TagContent implements TagContentStoreInterface
{
	
	use StoreTrait;
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Tag\Services\TagContent\Interfaces\TagContentStoreInterface::store()
	 * @author root
	 */
	public function store($tid, array $data)
	{
		// TODO Auto-generated method stub
		$this->model->tid = $tid;
		$this->model->content = $data['content'];
		
		$this->builtStore();
		
		$this->model->save();
		
		return $this->model;
	}

	
	
	
}