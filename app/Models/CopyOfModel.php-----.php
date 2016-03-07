<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model as BaseModel;
use Fields\Fields;
use Carbon\Carbon;
use DateTime;
use App\Fields\Field;
abstract class Model extends BaseModel {
	
	use ModelTrait;
	
	protected static function autoStore()
	{
		return false;
	}
	
	/**
	 * 软删除所需时间字段
	 * @var array
	 */
	protected $dates = ['deleted_at'];
	
	/**
	 * 时间戳格式
	 * @var mixed
	 */
	protected $dateFormat = 'U';
	
	/**
	 * 黑名单 为空则表示关闭
	 * @var array
	 */
	protected $guarded = array();
	
	/**
	 * 获取当前时间
	 * @return int
	 */
	public function freshTimestamp()
	{
		return time();
	}
	
	/**
	 * 避免转换时间戳为时间字符串
	 * @param DateTime|int $value
	 * @return DateTime|int
	 */
	public function fromDateTime($value)
	{
		return $value;
	}
	
	/**
	 * Get a plain attribute (not a relationship).
	 *
	 * @param  string  $key
	 * @return mixed
	 */
	public function getAttributeValue($key)
	{
		$value = $this->getAttributeFromArray($key);
	
		// If the attribute has a get mutator, we will call that then return what
		// it returns as the value, which is useful for transforming values on
		// retrieval from the model to a form that is more useful for usage.
		if ($this->hasGetMutator($key)) {
			return $this->mutateAttribute($key, $value);
		}
	
		// If the attribute exists within the cast array, we will convert it to
		// an appropriate native PHP type dependant upon the associated value
		// given with the key in the pair. Dayle made this comment line up.
		if ($this->hasCast($key)) {
			$value = $this->castAttribute($key, $value);
		}
	
		// If the attribute is listed as a date, we will convert it to a DateTime
		// instance on retrieval, which makes it quite convenient to work with
		// date fields without having to create a mutator for each property.
		//自动维护的三个时间字段，直接返回时间戳
		elseif (in_array($key, $this->getDates())) {
			return $value;
			/* if (!is_null($value)) {
				return $this->asDateTime($value);
			} */
		}
	
		return $value;
	}
	
}