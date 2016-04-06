<?php
namespace Simon\Tag\Services\Tag;
use Simon\Tag\Services\Tag;
use Simon\Tag\Services\Tag\Interfaces\TagUpdateInterface;
class TagUpdateService extends Tag implements TagUpdateInterface 
{
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\UpdateInterface::update()
	 * @author root
	 */
	public function update($id, array $data)
	{
		// TODO Auto-generated method stub
		$this->model = $this->model->findOrFail($id);
		
		$this->model->name = $data['name'];
		$this->model->status = $data['status'];
		
		return $this->model->save();
	}

	
}