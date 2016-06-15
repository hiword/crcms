<?php
namespace Simon\Hacker\Models;
use App\Models\Model;
use App\Models\SoftDeleting\SoftDeletes;
class Subject extends Model
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
	
	
	const STATUS = [self::STATUS_OPEN=>'开启',self::STATUS_HIDDEN=>'隐藏',self::STATUS_CLOSE=>'关闭'];
	
}