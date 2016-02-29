<?php
namespace Simon\Tag\Models;
use App\Models\Model;
class TagOutside extends Model
{
	/**
	 * 关闭时间戳
	 * @var boolean
	 * @author simon
	 */
	public $timestamps = false;
	
	protected $fillable = ['tag_id','outside_id','outside_type'];
	
	/**
	 * 多态中间表多对多关联
	 * @author simon
	 */
	public function morphToTagOutside() 
	{
		return $this->morphTo(null,'outside_type','outside_id');
	}
}