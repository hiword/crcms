<?php
namespace Simon\File\Uploads\Exceptions;
class UploadException extends \RuntimeException
{
	
	public function __construct($filename,$error) 
	{
		parent::__construct(sprintf("%s upload error %s",$filename,$this->handleError($error)));
	}
	
	protected function handleError($error) 
	{
		switch ($error)
		{
			case UPLOAD_ERR_CANT_WRITE:
				$error = '文件写入失败';
				break;
			case UPLOAD_ERR_PARTIAL:
				$error = '文件只有部分被上传';
				break;
			case UPLOAD_ERR_FORM_SIZE:
				$error = '文件大小超过表单大小限制';
				break;
			case UPLOAD_ERR_INI_SIZE:
				$error = '文件大小超过服务器大小限制';
				break;
			case UPLOAD_ERR_NO_FILE:
				$error = '没有文件被上传';
				break;
			case UPLOAD_ERR_NO_TMP_DIR:
				$error = '找不到临时文件夹';
				break;
		}
		return $error;
	}
}