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
	
	/**
	 * 获取当前outside的tags
	 * @param array $outside_id
	 * @param string $outside_model
	 */
	public function tagsOutside(array $outside_id,$outside_model)
	{
	    return $this->whereIn($outside_id)->where($outside_model)->get();
	}
}