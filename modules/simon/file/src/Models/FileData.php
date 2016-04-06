<?php
namespace Simon\File\Models;
use App\Models\Model;
class FileData extends Model {
	
	public $timestamps = false;
	
	protected $primaryKey = 'fid';
	
	protected $fillable = ['fid','server_ip','domain','hash','extension','mime_type','save_path','created_type','updated_type','deleted_type','created_uid','updated_uid','deleted_uid','created_at','updated_at','deleted_at'];
	
	protected function dataStoreHandle()
	{
		parent::dataStoreHandle();
		$request = app('request');
		$this->data['server_ip'] = ip_long(gethostbyname('localhost'));
	}
}