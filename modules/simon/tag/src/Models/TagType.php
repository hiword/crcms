<?php
namespace Simon\Tag\Models;
use App\Models\Model;
class TagType extends Model
{
	
	/**
	 * 开启状态
	 * @var numeric
	 * @author simon
	 */
	CONST STATUS_OPEN = 1;
	
	/**
	 * 关闭状态
	 * @var numeric
	 * @author simon
	 */
	CONST STATUS_CLOSE = 2;
	
	/**
	 * tag type多对多
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 * @author simon
	 */
	public function hasBelongsToManyTag()
	{
		return $this->belongsToMany('Simon\Tag\Models\Tag','tag_tag_types','type_id','tag_id');
	}
}