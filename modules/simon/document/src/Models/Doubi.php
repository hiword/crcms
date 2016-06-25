<?php
namespace Simon\Document\Models;
use App\Models\Model;
use App\Models\SoftDeleting\SoftDeletes;
class Doubi extends Model
{
	use SoftDeletes;

	/**
	 * 状态
	 * @var numeric
	 * @author simon
	 */
	const STATUS_OPEN = 1;
	
	/**
	 * 状态
	 * @var numeric
	 * @author simon
	 */
	const  STATUS_HIDDEN = 2;
	
	/**
	 * 状态
	 * @var numeric
	 * @author simon
	 */
	const STATUS_CLOSE = 3;
	
	/**
	 * 会员状态数组
	 * @var numeric
	 * @author simon
	 */
	const STATUS = [self::STATUS_OPEN=>'开启',self::STATUS_HIDDEN=>'隐藏',self::STATUS_CLOSE=>'禁止'];
	
	public function hasOneDoubiData()
	{
		return $this->hasOne('Simon\Document\Models\DoubiData','did','id');
	}
	
	public function belongsToManyCategory()
	{
		return $this->belongsToMany('Simon\Document\Models\Category','category_documents','document_id','category_id')->where('type',get_class($this));
	}
	
	/**
	 * 多态多对多Tags
	 * @author simon
	 */
	public function morphToManyTag()
	{
		return $this->morphToMany('Simon\Tag\Models\Tag', 'outside','tag_outsides','outside_id','tag_id');
	}
	
	/**
	 * 多态，images,多对多
	 * @author simon
	 */
	public function morphManyCount()
	{
		return $this->morphMany('Simon\Count\Models\Count','counts','outside_type','outside_id');
	}
}