<?php
namespace Simon\Document\Services;
use App\Services\Service;
use Simon\Document\Services\Interfaces\CategoryInterface;
use Simon\Document\Models\Category;
class Category extends Service implements CategoryInterface
{
	
	public function __construct(Category $Category)
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
		$category = $this->model->orderBy(Category::CREATED_AT,'desc')->get()->toArray();
		return show_tree(array_tree($category));
	}
}