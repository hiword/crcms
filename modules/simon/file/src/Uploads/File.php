<?php
namespace Simon\File\Uploads;
class File extends \SplFileInfo
{
	
	protected $path = null;
	
	public function __construct($path)
	{
		parent::__construct($path);
		$this->path = $path;
	}
	
	/**
	 * 获取文件的mime类型
	 * @param string $path
	 * @author simon
	 */
	public function getFileMime($path = null)
	{
		$Finfo = new \finfo(FILEINFO_MIME_TYPE);
		return $Finfo->file(empty($path) ? $this->path : $path);
	}
	
	/**
	 * 获取文件扩展名
	 * (non-PHPdoc)
	 * @see SplFileInfo::getExtension()
	 * @author simon
	 */
	public function getExtension($path = null) 
	{
		return empty($path) ? parent::getExtension() : pathinfo($path,PATHINFO_EXTENSION);
	}
	
	/**
	 * 获取文件大小
	 * (non-PHPdoc)
	 * @see SplFileInfo::getSize()
	 * @author simon
	 */
	public function getSize($path = null)
	{
		return empty($path) ? parent::getSize() : filesize($path);
	}
}