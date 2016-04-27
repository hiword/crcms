<?php
namespace Simon\Model\Models;
use App\Models\Model as AppModel;
class Model extends AppModel
{
	const STATUS_OPEN = 1;
	
	const STATUS_CLOSE = 2;
	
	const STATUS = [self::STATUS_OPEN=>'开启',self::STATUS_CLOSE=>'禁止'];
	
	const TYPE_MAIN = 1;
	
	const TYPE_APPEND = 2;
	
	const TYPE = [self::TYPE_MAIN=>'主模型',self::TYPE_APPEND=>'附加模型'];
	
	const ENGINE_INNODB = 'InnoDB';
	
	const ENGINE_MYISAM = 'MyISAM';
	
	const ENGINE_MEMORY = 'MEMORY';
	
	const ENGINE = [self::ENGINE_INNODB=>'InnoDB',self::ENGINE_MYISAM=>'MyISAM',self::ENGINE_MEMORY=>'MEMORY'];
	
	
	protected $casts = [
		'uri'=>'array',
	];
	
	/**
	 * 
	 * 
	 * @author simon
	 */
	public function belongsToManyField()
	{
		return $this->belongsToMany('Simon\Model\Models\Field','model_fields','model_id','field_id');
	}
	
	
}