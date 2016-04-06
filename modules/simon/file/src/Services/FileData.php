<?php
namespace Simon\File\Services;
use App\Services\Service;
use Simon\File\Models\FileData as FileDataModel;
abstract class FileData extends Service
{
	
	public function __construct(FileDataModel $FileData) 
	{
		parent::__construct();
		$this->model = $FileData;
	}
	
}