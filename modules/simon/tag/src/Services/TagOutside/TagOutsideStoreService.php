<?php
namespace Simon\Tag\Services\TagOutside;
use Simon\Tag\Services\TagOutside;
use Simon\Tag\Services\TagOutside\Interfaces\TagOutsideStoreInterface;
use Illuminate\Support\Facades\DB;
class TagOutsideStoreService extends TagOutside implements TagOutsideStoreInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\StoreInterface::store()
	 * @author simon
	 */
	public function store(array $data)
	{
		// TODO Auto-generated method stub
		return $this->model->create([
			'tag_id'=>$data['tag_id'],
			'outside_id'=>$data['outside_id'],
			'outside_type'=>$data['outside_type'],
		]);
	}

}