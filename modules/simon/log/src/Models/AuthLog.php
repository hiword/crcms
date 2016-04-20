<?php
namespace Simon\Log\Models;
use App\Models\Model;
class AuthLog extends Model
{
	
	/**
	 *
	 * @var array
	 * @author simon
	 */
	//protected $fillable = ['userid','name','email','client_ip','login_status','remark','url','created_uid','created_type'];
	
	const TYPE_REGISTER = 1;
	
	const TYPE_LOGIN = 2;
	
	const STATUS_SUCCESS = 1;
	
	const STATUS_ERROR = 2;
	
	
}