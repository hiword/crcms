<?php
namespace Simon\Document\Services;
use App\Services\Service;
use Simon\Document\Services\Interfaces\CategoryInterface;
use Simon\Document\Models\Category as CategoryModel;
use App\Services\ServiceCudTrait;
class Category extends Service implements CategoryInterface
{
	use ServiceCudTrait;
	
	public function __construct(CategoryModel $Category)
	{
		parent::__construct();
		
		$this->model = $Category;
	}
	
	public function find($id)
	{
		return $this->model->findOrFail($id);
	}
	
	public function tree()
	{
		$category = $this->model->orderBy(CategoryModel::CREATED_AT,'desc')->get()->toArray();
		return show_tree(array_tree($category));
	}
	
	public function status() 
	{
		return CategoryModel::STATUS;
	}
	
	
}