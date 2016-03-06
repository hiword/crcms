<?php
namespace Simon\Count\Models;
use App\Models\Model;
class CountDetail extends Model
{
	
	public $timestamps = false;
	
	protected $primaryKey = 'cid';
	
	protected static $fields = [
		'cid'=>'Simon\Count\Fields\CountDetail\Cid',
		'agent'=>'Simon\Count\Fields\CountDetail\Agent',
	];
	
	protected function dataStoreHandle()
	{
		
	}
	
	protected function dataUpdateHandle()
	{
		
	}
	
	protected function dataDestroyHandle()
	{
		
	}
}