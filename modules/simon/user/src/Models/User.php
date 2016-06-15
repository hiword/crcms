<?php
namespace Simon\User\Models;
use App\Models\Model;
use App\Models\SoftDeleting\SoftDeletes;
class User extends Model
{
// 	use SoftDeletes;
	
	/**
	 * 已验证
	 * @var integer
	 * @author simon
	 */
	const MAIL_STATUS_VERIFY = 1;
	
	/**
	 * 未验证
	 * @var integer
	 * @author simon
	 */
	const MAIL_STATUS_NOT_VERIFY = 2;
	
	/**
	 * 被禁止
	 * @var integer
	 * @author simon
	 */
	const MAIL_STATUS_BAN = 3;
	
}