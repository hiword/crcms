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
	const PRIMARY_YES = 1;
	
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
	const PRIMARY = [self::PRIMARY_YES=>'主键',self::PRIMARY_NOT=>'非主键'];
	
	protected $casts = [
		'setting' => 'object',
		'validate_rule' => 'array',
		'attr' => 'array',
	];
	
	
}