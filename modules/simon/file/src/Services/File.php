<?php
namespace Simon\File\Services;
use App\Services\Service;
use Simon\File\Models\File as FileModel;
abstract class File extends Service
{
	public function __construct(FileModel $File) 
	{
		parent::__construct();
		$this->model = $File;
	}
}