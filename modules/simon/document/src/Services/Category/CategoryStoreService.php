<?php
namespace Simon\Document\Services\Category;
use Simon\Document\Services\CategoryCud;
use App\Services\Interfaces\StoreInterface;
class CategoryStoreService extends CategoryCud implements StoreInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\CudInterface::save()
	 * @author simon
	 */
	public function store(array $data) {
		// TODO Auto-generated method stub
		
		//保存数据
		$this->data($data);
		
		$this->fillable(['pid','name','mark',['status']]);
		
		$this->builtStore();

		$this->create();
		//过滤数据
		$this->filterFields(['name','id']);
		
		//
		$this->storeHandle();
		
		$this->create();
		$this->model->create($data);
	}

	
	/**
	 * 
	 * 也使用组合模式
	 * 
	 * 一个需要执行的客户端，每个，
	 * 
	 * 
	 * @param unknown $data
	 * @author simon
	 */
	
}