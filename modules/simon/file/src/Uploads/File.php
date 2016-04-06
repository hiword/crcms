<?php
namespace Simon\File\Uploads;
class File extends \SplFileInfo
{
	
	protected $path = null;
	
	protected $newName = null;
	
	protected $newPath = null;
	
	public function __construct($path)
	{
		parent::__construct($path);
		$this->path = $path;
	}
	
	/**
	 * 设置hash目录
	 * @param string $name
	 * @param integer $hashDirLayer
	 * @author simon
	 */
	public function getHashDir($name,$hashDirLayer = 2)
	{
		$dirs = '';
		
		if ($hashDirLayer === 0)
		{
			return $dirs;
		}
		
		$name = sha1($name);
		$length = strlen($name);
		
		for($i=0;$i<$length;$i++)
		{
			if ($i+1 > $hashDirLayer)
			{
				break;
			}
			$dirs .= substr($name, $i,1).'/';
		}
		
		return $dirs;
	}
	
	public function setNewPath($path)
	{
		$this->newPath = $path;
	}
	
	public function getNewPath()
	{
		return $this->newPath;
	}
	
	public function setNewName($name)
	{
		$this->newName = $name;
	}
	
	public function getNewName()
	{
		return $this->newName;
	}
	
	/**
	 * 创建目录
	 * @param string $dir
	 * @param number $mode
	 * @return boolean
	 */
	public function mkDir($dir, $mode = 0755)
	{
		if (is_dir($dir) || @mkdir($dir, $mode)) return true;
		if (!@$this->mkDir(dirname($dir), $mode)) return false;
		return mkdir($dir, $mode);
	}
	
	/**
	 * 判断是否是一个正常的文件
	 * (non-PHPdoc)
	 * @see SplFileInfo::isFile()
	 * @author simon
	 */
	public function isFile($path = null)
	{
		return empty($path) ? parent::isFile() : is_file($path);
	}
	
	/**
	 * 获取文件的mime类型
	 * @param string $path
	 * @author simon
	 */
	public function getFileMime($path = null)
	{
		if (!$this->isFile($path))
		{
			return false;
		}
		
		$Finfo = new \finfo(FILEINFO_MIME_TYPE);
		return $Finfo->file($path ? $path : $this->path);
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
		if (!$this->isFile($path))
		{
			return false;
		}
		
		return empty($path) ? parent::getSize() : filesize($path);
	}
}