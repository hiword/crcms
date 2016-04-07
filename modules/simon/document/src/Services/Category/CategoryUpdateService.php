<?php
namespace Simon\Document\Services\Category;
use Illuminate\Support\Facades\DB;
use Simon\Document\Services\Category;
use App\Services\Traits\UpdateTrait;
use Simon\Document\Services\Category\Interfaces\CategoryUpdateInterface;
class CategoryUpdateService extends Category implements CategoryUpdateInterface
{
	
	use UpdateTrait;
	
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\UpdateInterface::update()
	 * @author simon
	 */
	public function update($id, array $data)
	{
		$this->model = $this->model->findOrFail($id);
// 		dd(DB::getQueryLog());
		$this->model->pid = $data['pid'];
		$this->model->name = $data['name'];
		$this->model->mark = $data['mark'];
		$this->model->status = $data['status'];
		
		$this->builtUpdate();
		
		return $this->model->save();
	}

	
}