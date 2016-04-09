<?php
namespace Simon\Tag\Services\Tag;
use Simon\Tag\Services\Tag;
use Simon\Tag\Services\Tag\Interfaces\TagDestroyInterface;
use App\Services\Traits\DestroyTrait;
class TagDestroyService extends Tag implements TagDestroyInterface
{
	
	use DestroyTrait;
	
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\DestroyInterface::destroy()
	 * @author root
	 */
	public function destroy(array $data)
	{
		// TODO Auto-generated method stub
		
		$this->updateDestroyBuilt($data);
		
		return $this->model->destroy($data);
	}

	
	
	
}