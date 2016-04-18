<?php
namespace Simon\Tag\Services\TagOutside;
use Simon\Tag\Services\TagOutside;
use Simon\Tag\Services\TagOutside\Interfaces\TagOutsideDestroyInterface;
use Illuminate\Support\Facades\DB;
class TagOutsideDestroyService extends TagOutside implements TagOutsideDestroyInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\DestroyInterface::destroy()
	 * @author simon
	 */
	public function destroy(array $data)
	{
		// TODO Auto-generated method stub
		foreach ($data as $values)
		{
			$item = explode('|',$values);
			$this->model->where('tag_id',$item[0])->where('outside_id',$item[1])->where('outside_type',$item[2])->delete();
		}
	}

	
}