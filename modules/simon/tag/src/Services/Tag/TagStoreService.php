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
		$this->model->name = $data['name'];
		
		//这里要user_session判断用户，并定义status的状态，
		//现在为了逻辑，简单点
		$this->model->status = isset($data['status']) ? $data['status'] : TagModel::STATUS_NOT_VERIFIED;
		
		$this->builtStore();
		$this->model->save();
		
		$this->append->tid = $this->model->id;
		$this->append->content = $data['content'];
		$this->append->save();
		
		return $this->model;
	}

	
	
	
}