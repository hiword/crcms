<?php
namespace Simon\File\Services\File\Interfaces;
use Simon\File\Uploads\FileUpload;
interface FileInterface
{
	public function uploading(FileUpload $FileUpload);
}