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
	public function store(array $data)
	{
		// TODO Auto-generated method stub
		
		$this->model->pid = $data['pid'];
		$this->model->name = $data['name'];
		$this->model->mark = $data['mark'];
		$this->model->status = $data['status'];
		
		$this->builtStore();
		
		return $this->model->save();
	}
	
}