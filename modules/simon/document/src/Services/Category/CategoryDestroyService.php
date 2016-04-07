<?php
namespace Simon\Document\Services\Category;
use Simon\Document\Services\Category;
use App\Services\Traits\DestroyTrait;
use Simon\Document\Services\Category\Interfaces\CategoryDestroyInterface;
class CategoryDestroyService extends Category implements CategoryDestroyInterface
{
	
	use DestroyTrait;
	
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\DestroyInterface::destroy()
	 * @author simon
	 */
	public function destroy(array $data)
	{
		// TODO Auto-generated method stub
		return $this->model->destroy($data);
	}

	
}