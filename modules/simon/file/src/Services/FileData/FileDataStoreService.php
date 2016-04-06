<?php
namespace Simon\File\Services\FileData;
use Simon\File\Services\FileData;
use App\Services\Interfaces\StoreInterface;
use Simon\File\Services\Interfaces\FileDataStoreInterface;
class FileDataStoreService extends FileData implements FileDataStoreInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\File\Services\Interfaces\FileDataStoreInterface::store()
	 * @author simon
	 */
	public function store($fid, array $data, \Illuminate\Http\Request $Request)
	{
		// TODO Auto-generated method stub
		$this->model->fid = $fid;
		$this->model->server_ip = ip_long(gethostbyname('localhost'));
		$this->model->hash = $data['hash'];
		$this->model->extension = $data['extension'];
		$this->model->mime_type = $data['mime_type'];
		$this->model->save_path = $data['save_path'];
// 		$this->model->domain = $data['domain'];
		
		return $this->model->save();
	}


	
	
	
}