<?php
namespace Simon\File\Models;
use App\Models\Model;
use App\Models\SoftDeleting\SoftDeletes;
class File extends Model {
	
	use SoftDeletes;
	
	protected $fillable = ['old_name','new_name','hash','full_path','full_root','mark','port','client_ip','scheme','domain','full_domain','upload_time','created_type','updated_type','deleted_type','created_uid','updated_uid','deleted_uid','created_at','updated_at','deleted_at'];
	
	/**
	 * 附件附加数据
	 * @author simon
	 */
	public function hasOneFileData()
	{
		return $this->hasOne('File\Models\FileData','fid');
	}
	
	public function dataStoreHandle()
	{
		parent::dataStoreHandle();
		
		$this->data['upload_time'] = $this->data['complete_microtime'];
		$request = app('request');
		$this->data['port'] = $request->getPort();
		$this->data['scheme'] = $request->getScheme();
		$this->data['mark'] = (string)$request->input('mark');
		$this->data['domain'] = env('APP_URL');
		$this->data['full_domain'] = $request->fullUrl();
// 		logger($this->data);
	}
	
}