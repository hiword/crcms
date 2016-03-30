<?php
namespace Simon\Document\Services\Category;
use App\Services\Interfaces\DestroyInterface;
use Simon\Document\Services\CategoryCud;
class CategoryDestroyService extends CategoryCud implements DestroyInterface
{
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