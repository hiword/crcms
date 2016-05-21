<?php
namespace Simon\Tag\Services\Tag;
use Simon\Tag\Services\Tag;
use Simon\Tag\Services\Tag\Interfaces\TagStoreInterface;
use App\Services\Traits\StoreTrait;
use Simon\Tag\Models\TagContent;
use Simon\Tag\Models\Tag as TagModel;
class TagStoreService extends Tag implements TagStoreInterface
{
	use StoreTrait;
	
	public function __construct(TagModel $Tag,TagContent $TagContent)
	{
		parent::__construct($Tag);
		$this->append = $TagContent;
	}
	
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\StoreInterface::store()
	 * @author root
	 */
	public function store(array $data)
	{
		// TODO Auto-generated method stub
		
		$this->model->status = $data['status'];;
		
		return $this->storeHandle($data);
	}
	
	/*
	 * (non-PHPdoc)
	 * @see \Simon\Tag\Services\Tag\Interfaces\TagStoreInterface::userStore()
	 * @author simon
	 */
	public function userStore(array $data)
	{
		// TODO Auto-generated method stub
		$this->model->status = TagModel::STATUS_NOT_VERIFIED;
		
		return $this->storeHandle($data);
	}

	/**
	 * 存储处理
	 * @param array $data
	 * @author simon
	 */
	protected function storeHandle(array $data)
	{
		$this->model->name = $data['name'];
		$this->builtModelStore();
		$this->model->save();
		
		//append
		$this->append->tid = $this->model->id;
		$this->append->content = $data['content'];
		$this->append->save();
		
		return $this->model;
	}
	
	/**
	 * 
	 * @param numeric $tagId
	 * @author simon
	 */
	public function increment($tagId)
	{
		$this->model->where('id',$tagId)->increment('count_num');
	}
	
}