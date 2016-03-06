<?php
namespace App\Models;
class MysqlModel extends Model
{
	
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
	protected $guarded =[];
	
}