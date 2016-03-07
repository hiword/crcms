<?php
namespace Simon\Count\Models;
use App\Models\Model;
use App\Models\SoftDeleting\SoftDeletes;
class Count extends Model
{
	
	use SoftDeletes;
	
	protected static $fields = [
		'outside_type'=>'Simon\Count\Fields\Count\OutsideType',
		'outside_id'=>'Simon\Count\Fields\Count\OutsideId',
		'client_ip'=>'Simon\Count\Fields\Count\ClientIp',
	];
	
	protected function dataStoreHandle()
	{
		parent::dataStoreHandle();
		
		$this->data['outside_type'] = "Simon\\{$this->data['outside_type']}";
		
		$this->data['client_ip'] = ip_long($this->data['client_ip']);
	}
	
}