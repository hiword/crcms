<?php
namespace Simon\Document\Services;
use App\Services\AbsCud;
use Simon\Document\Models\Category;
abstract class CategoryCud extends AbsCud
{
	
	public function __construct(Category $Category)
	{
		parent::__construct();
		$this->model = $Category;
	}
	
	
}
