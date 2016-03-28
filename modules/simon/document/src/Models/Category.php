<?php
namespace Simon\Document\Models;
use App\Models\Model;
use App\Models\SoftDeleting\SoftDeletes;
class Category extends Model
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
	
	/**
	 * table name
	 * @var string
	 * @author simon
	 */
	protected $table = 'categorys';
	
	/**
	 * 对多对  所有category
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 * @author simon
	 */
	public function belongsToManyDocument()
	{
		return $this->belongsToMany('Simon\Document\Models\Document','category_documents','category_id','document_id');
	}
	
}