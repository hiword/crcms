<?php
namespace Simon\Model\Models;
use App\Models\Model as AppModel;
class Field extends AppModel 
{
	
	/**
	 * 
	 * @var numeric
	 * @author simon
	 */
	const STATUS_OPEN = 1;
	
	/**
	 * 
	 * @var numeric
	 * @author simon
	 */
	const STATUS_CLOSE = 2;
	
	/**
	 * 
	 * @var unknown
	 * @author simon
	 */
	const STATUS = [self::STATUS_OPEN=>'开启',self::STATUS_CLOSE=>'禁用'];
	
	/**
	 * 
	 * @var unknown
	 * @author simon
	 */
	const PRIMARY_YES = 3;
	
	/**
	 * 主键自增
	 * @var 
	 * @author root
	 */
	const PRIMARY_INCREMENT = 1;
	
	/**
	 * 
	 * @var unknown
	 * @author simon
	 */
	const PRIMARY_NOT = 2;
	
	/**
	 * 
	 * @var unknown
	 * @author simon
	 */
	const PRIMARY = [self::PRIMARY_NOT=>'非主键',self::PRIMARY_INCREMENT=>'主键自增',self::PRIMARY_YES=>'主键非自增'];
	
	/**
	 *
	 * @var numeric
	 * @author simon
	 */
	const LIST_OPEN = 1;
	
	const LIST_CLOSE = 2;
	
	const LISTS = [self::LIST_OPEN=>'是',self::LIST_CLOSE=>'否'];
	
	const SEARCH_OPEN = 1;
	
	const SEARCH_CLOSE = 2;
	
	const SEARCH = [self::SEARCH_OPEN=>'是',self::SEARCH_CLOSE=>'否'];
	
	
	
	const OPTION = ['list'=>'列表项','search'=>'搜索项'];
	/**
	 * attr transformation
	 * @var array $casts
	 */
	protected $casts = [
		'setting' => 'object',
		'validate_rule' => 'array',
		'attribute' => 'array',
		'uri'=>'array',
		'option' => 'array',
	];
	
	public function belongsToManyModel() 
	{
		return $this->belongsToMany('Simon\Model\Models\Model','model_fields','field_id','model_id');
	}
}