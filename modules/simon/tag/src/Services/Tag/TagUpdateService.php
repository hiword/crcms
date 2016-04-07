<?php
namespace Simon\Tag\Services\Tag;
use Simon\Tag\Services\Tag;
use Simon\Tag\Services\Tag\Interfaces\TagUpdateInterface;
use Simon\Tag\Models\TagContent;
use App\Services\Traits\UpdateTrait;
class TagUpdateService extends Tag implements TagUpdateInterface 
{
	use UpdateTrait;
	
	public function __construct(\Simon\Tag\Models\Tag $Tag,TagContent $TagContent)
	{
		parent::__construct($Tag);
		$this->append = $TagContent;
	}
	
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
		$this->builtUpdate();
		$this->model->save();
		
		$this->append = $this->append->findOrFail($id);
		$this->append->content = $data['content'];
		$this->append->save();
		
		return $this->model;
	}

	
}