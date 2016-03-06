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
	//这里其实还是应该用field属性来判断条件和控制
	protected $fillable = ['url','method','scheme','port','client_ip','device','browser','browser_version','os','os_version','is_robot','robot_name','remark','created_uid','created_type'];
	
	/**
	 * 
	 * 
	 * @author simon
	 */
	public function hasOneUser()
	{
		if ($this->attributes['created_type'] === 1)
		{
			return $this->hasOne('Simon\System\Models\Admin','id','created_uid');
		}
		elseif ($this->attributes['created_type'] === 2)
		{
			
		}
		else
		{
			return null;
		}
	}
}