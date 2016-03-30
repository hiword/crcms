<?php
namespace Simon\Log\Models;
use App\Models\Model;
class LoginLog extends Model
{
	
	/**
	 *
	 * @var array
	 * @author simon
	 */
	protected $fillable = ['userid','name','email','client_ip','login_status','remark','url','created_uid','created_type'];
}