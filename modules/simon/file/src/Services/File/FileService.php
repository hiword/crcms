<?php
namespace Simon\File\Services\File;
use Simon\File\Services\File;
use Simon\File\Exceptions\FileUploadException;
use Simon\File\Uploads\PlUpload;
use Simon\File\Services\File\Interfaces\FileInterface;
use Simon\File\Uploads\FileUpload;
class FileService extends File implements FileInterface
{
	
	public function uploading(FileUpload $FileUpload) 
	{
		try
		{
			$FileUpload->config(upload_config())->upload();
			$files = $FileUpload->getFiles();
		}
		catch (\Exception $e)
		{
			throw new FileUploadException($e->getMessage());
		}
		
		$files[0]['img_src'] = img_src($files[0]['full_root']);
		return $files[0];
	}
	
}