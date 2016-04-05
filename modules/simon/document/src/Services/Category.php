<?php
namespace Simon\Document\Services;
use App\Services\Service;
use Simon\Document\Models\Category as CategoryModel;
abstract class Category extends Service
{
	
	public function __construct(CategoryModel $Category) 
	{
		parent::__construct();
		$this->model = $Category;
	}
	
}