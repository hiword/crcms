<?php
namespace Simon\Log\Models;
use App\Models\Model;
class ActionLog extends Model
{
	
	/**
	 * 
	 * @var array
	 * @author simon
	 */
	protected $fillable = ['url','method','scheme','port','client_ip','device','browser','browser_version','os','os_version','is_robot','robot_name','remark','created_uid','created_type'];
	
}