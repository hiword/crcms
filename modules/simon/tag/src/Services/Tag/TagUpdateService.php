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
		$this->data['name'] = $data['name'];
		$this->data['status'] = $data['status'];
		$this->builtDataUpdate();
		$this->model->where('id',$id)->update($this->data);
		
		//append
		$this->append->where('tid',$id)->update([
			'content'=>$data['content'],
		]);
	}

	/**
	 *
	 * @param numeric $tagId
	 * @author simon
	 */
	public function increment($tagId)
	{
		return $this->model->where('id',$tagId)->increment('count_num');
	}
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Tag\Services\Tag\Interfaces\TagUpdateInterface::decrement()
	 * @author simon
	 */
	public function decrement($tagId)
	{
		// TODO Auto-generated method stub
		if ($this->model->where('id',$tagId)->take(1)->value('count_num') > 0)
		{
			return $this->model->where('id',$tagId)->decrement('count_num');
		}
		
	}

	
}