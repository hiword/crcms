<?php
namespace Simon\Document\Services\Category;
use App\Services\Interfaces\DestroyInterface;
use Simon\Document\Services\Category;
use App\Services\Traits\DestroyTrait;
class CategoryDestroyService extends Category implements DestroyInterface
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