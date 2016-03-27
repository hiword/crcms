<?php
namespace Simon\Document\Services;
use App\Services\Service;
use Simon\Document\Services\Interfaces\CategoryInterface;
class Category extends Service implements CategoryInterface
{
	
	public function find($id)
	{
		return $this->model->findOrFail($id);
	}
	
}