<?php
namespace Simon\Comment\Models;
use App\Models\Model;
use App\Models\SoftDeleting\SoftDeletes;
class Comment extends Model
{
	use SoftDeletes;
	
	/**
	 * 已审核状态
	 * @var numeric
	 * @author simon
	 */
	CONST STATUS_AUDIT = 1;
	
	/**
	 * 未验证状态
	 * @var numeric
	 * @author simon
	 */
	CONST STATUS_NOT_AUDIT = 2;
	
	/**
	 * 未通过状态
	 * @var numeric
	 * @author simon
	 */
	CONST STATUS_NOT_BY = 3;
	
	/**
	 * 禁止
	 * @var numeric
	 * @author simon
	 */
	CONST STATUS_BAN = 4;
	
	/**
	 * 
	 * 
	 * @author simon
	 */
	public function hasOneCommentData() 
	{
		return $this->hasOne('Simon\Comment\Models\CommentData','cid','id');
	}
	
	public function scopeOutside($query,$outsideId,$outsideType) 
	{
		return $query->where('outside_id',$outsideId)->where('outside_type',$outsideType)->where(function($query){
			$query->where('status',static::STATUS_AUDIT)->orWhere('status',static::STATUS_NOT_AUDIT);
		});
	}
	
}