<?php
namespace Simon\File\Services\File;
use Simon\File\Services\File;
use Simon\File\Services\Interfaces\FileStoreInterface;
use App\Services\Traits\StoreTrait;
class FileStoreService extends File implements FileStoreInterface
{
	use StoreTrait;
	
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\File\Services\Interfaces\FileStoreInterface::store()
	 * @author simon
	 */
	public function store(array $data, \Illuminate\Http\Request $Request)
	{
		// TODO Auto-generated method stub
		

		$this->model->old_name = $data['old_name'];
		$this->model->new_name = $data['new_name'];
		$this->model->hash = $data['hash'];
		$this->model->full_path = $data['full_path'];
		$this->model->full_root = $data['full_root'];
		$this->model->filesize = $data['filesize'];
// 		$this->model->mark = $data['mark'];
		
		$this->model->upload_time = $data['complete_microtime'];
		$this->model->port = $Request->getPort();
		$this->model->scheme = $Request->getScheme();
		$this->model->mark = (string)$Request->input('mark');
		$this->model->domain = env('APP_URL');
		$this->model->full_domain = $Request->fullUrl();
		$this->model->client_ip = ip_long($Request->ip());
		
		$this->builtStore();
		
		$this->model->save();
		
		return $this->model;
	}


	
	
	
}