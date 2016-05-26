<?php
namespace Simon\File\Services\File;
use Simon\File\Services\File;
use App\Services\Traits\StoreTrait;
use Simon\File\Services\File\Interfaces\FileStoreInterface;
use Simon\File\Models\FileData;
use Simon\File\Models\File as FileModel;
class FileStoreService extends File implements FileStoreInterface
{
	use StoreTrait;

	public function __construct(FileModel $File,FileData $FileData)
	{
		parent::__construct($File);
		$this->append = $FileData;
	}
	
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\File\Services\Interfaces\FileStoreInterface::store()
	 * @author simon
	 */
	public function store(array $data, \Illuminate\Http\Request $Request)
	{
		// TODO Auto-generated method stub

		//main
		$this->model->old_name = $data['old_name'];
		$this->model->new_name = $data['new_name'];
		$this->model->hash = $data['hash'];
		$this->model->full_path = $data['full_path'];
		$this->model->full_root = $data['full_root'];
		$this->model->filesize = $data['filesize'];
		$this->model->upload_time = $data['complete_microtime'];
		$this->model->port = $Request->getPort();
		$this->model->scheme = $Request->getScheme();
		$this->model->mark = (string)$Request->input('mark');
		$this->model->domain = env('APP_URL');
		$this->model->full_domain = $Request->fullUrl();
		$this->model->client_ip = ip_long($Request->ip());
		$this->builtModelStore();
		$this->model->save();
		
		//append
		$this->append->fid = $this->model->id;
		$this->append->server_ip = ip_long(gethostbyname('localhost'));
		$this->append->hash = $data['hash'];
		$this->append->extension = $data['extension'];
		$this->append->mime_type = $data['mime_type'];
		$this->append->save_path = $data['save_path'];
		$this->append->save();
		
		return $this->model;
	}


	
	
	
}