<?php
namespace Simon\Tag\Services\Tag;
use Simon\Tag\Services\Tag;
use Simon\Tag\Services\Tag\Interfaces\TagDestroyInterface;
class TagDestroyService extends Tag implements TagDestroyInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\DestroyInterface::destroy()
	 * @author root
	 */
	public function destroy(array $data)
	{
		// TODO Auto-generated method stub
		
		return $this->model->destroy($data);
	}

	
	
	
}