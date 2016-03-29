<?php
namespace Simon\Document\Services\Category;
use Simon\Document\Services\CategoryCud;
use App\Services\Interfaces\UpdateInterface;
class CategoryUpdateService extends CategoryCud implements UpdateInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\UpdateInterface::update()
	 * @author root
	 */
	public function update($id, array $data)
	{
		$this->model->id = $id;
		$this->model->pid = $data['pid'];
		$this->model->name = $data['name'];
		$this->model->mark = $data['mark'];
		$this->model->status = $data['status'];
		
		$this->builtUpdate();
		
		return $this->model->save();
	}

	
}