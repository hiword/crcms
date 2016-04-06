<?php
namespace Simon\Tag\Services\TagContent;
use Simon\Tag\Services\Tag;
use Simon\Tag\Services\TagContent\Interfaces\TagContentUpdateInterface;
use App\Services\Traits\UpdateTrait;
use Simon\Tag\Services\TagContent;
class TagContentUpdateService extends TagContent implements TagContentUpdateInterface
{
	
	use UpdateTrait;
	
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\UpdateInterface::update()
	 * @author root
	 */
	public function update($id, array $data)
	{
		// TODO Auto-generated method stub
		$this->model = $this->model->findOrFail($id);
	
		$this->model->content = $data['content'];
		
		$this->builtUpdate();
		
		$this->model->save();
	}

	
	
	
}