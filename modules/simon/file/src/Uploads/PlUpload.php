<?php
namespace Simon\File\Uploads;
use Simon\File\Uploads\Exceptions\UploadException;
class PlUpload extends FileUpload
{
	
	/**
	 * 当前块
	 * @var integer
	 * @author simon
	 */
	protected $chunk = 0;
	
	/**
	 * 总块数
	 * @var integer
	 * @author simon
	 */
	protected $chunks = 0;
	
	protected function getFileName($name = null)
	{
		return $_POST['name'];
	}
	
// 	//获取文件名称
// 	$filename = $this->getFileName($upload['name']);
	
// 	//获取层级目录
// 	$dir = $this->getHashDir($filename);
		
// 	//设置完整路径
// 	$filepath = $this->getFilePath($dir,$filename);
	
// 	//自动创建目录
// 	$this->mkDir(dirname($filepath));
		
// 	if (move_uploaded_file($upload['tmp_name'], $filepath))
// 	{
// 		$file = [];
// 		$file['hash'] = sha1($filepath);
// 		$file['new_name'] = $filename;
// 		$file['old_name'] = $upload['name'];
// 		$file['save_path'] = $this->path;
// 		$full_path = $file['full_path'] = $filepath;
// 		$file['full_root'] = str_replace($_SERVER['DOCUMENT_ROOT'], '', $full_path);
// 		$file['extension'] = $this->file->getExtension($full_path);
// 		$file['mime_type'] = $this->file->getFileMime($full_path);
// 		$file['filesize'] = $this->file->getSize($full_path);
// 		//完成上传时间
// 		$file['complete_time'] = time();
// 		//完成上传的微秒时间，用于大并发
// 		list($usec, $sec) = explode(" ", microtime());
// 		$file['complete_microtime'] = (float)$usec + (float)$sec;
// 		/* //合并上传信息
// 		 //$file = array_merge($upload,$file); */
// 		$this->files[] = $file;
			
// 		return true;
// 	}
	
// 	return false;
	
	/**
	 * 分块上传大小设置
	 */
	protected function getChunking() {
		// Chunking might be enabled
		$this->chunk = isset($_POST["chunk"]) ? intval($_POST["chunk"]) : 0;
		$this->chunks = isset($_POST["chunks"]) ? intval($_POST["chunks"]) : 0;
	}
	
	/**
	 * 清理目录临时文件
	 */
	private function _clearTempFile() {
		$filelists = scandir($this->_savePath);
		foreach ($filelists as $fvalue) {
			if ($fvalue === '.' || $fvalue==='..') continue;
			$tmpfilePath = $this->_savePath . DIRECTORY_SEPARATOR . $fvalue;
			// If temp file is current file proceed to the next
			if ($tmpfilePath === "{$this->__newFileName}.part") {
				continue;
			}
			// Remove temp file if it is older than the max age and is not the current file
			if (preg_match('/\.part$/', $fvalue) && (filemtime($tmpfilePath) < time() - $this->_maxFileAge)) {
				@unlink($tmpfilePath);
			}
		}
	}
	
	protected function handleUpload(array $upload) 
	{
		//获取文件名
		$filename = $this->getFileName();
		
// 		if ($this->chunks === 0)
// 		{
// 			// 	//获取层级目录
// 			$dir = $this->getHashDir($filename);
			
// 			// 	//设置完整路径
// 			$filepath = $this->getFilePath($dir,$filename);
// 		}
		
		
		//块上传大小
		$this->getChunking();
		
		//读取并写入数据流
		if (!(boolean) $fpIn = fopen("php://input", "rb"))
		{
			throw new UploadException($this->getFileName(), UploadException::READ_FILE_STREAM_ERR);
		}
			
		//获取文件路径
		$file = $this->getFilePath($this->getHashDir($filename), $filename.'.part');
		
// 		$this->file->isDir()
		$this->mkDir(dirname($file));
// 		if ($this->chunks === 0)
// 		{
// 			//自动创建目录
// 			echo dirname($file);exit();
			
// 		}
		
		//读取文件
		if (!(boolean) $fpOut = fopen($file, $this->chunks ? "ab" : "wb"))
		{
			//关闭文件流
			fclose($fpIn);
			throw new UploadException($this->getFileName(), UploadException::WRITER_ERR_NO_TMP_DIR);
		}
		
		var_dump($buff = fread($fpIn, 4096));
		//循环按照指定字节读取文件
		while ((boolean)$buff = fread($fpIn, 4096))
		{
			$status = fwrite($fpOut, $buff);
		}
		
	
		fclose($fpOut);
		
		//关闭文件流
		fclose($fpIn);
		
		if ($status)
		{
			if (!$this->chunks || $this->chunk == $this->chunks - 1) {
				$newname = substr($file,0,-5);
				rename($file, $newname);
			}
		}
		
		//清理临时文件，[非必须]
// 		$this->_clearTempFile();
		if (!$in = @fopen("php://input", "rb")) {
			die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
		}
	}
	
	/**
	 * 重命名文件
	 * @param unknown $filename
	 */
	private function _renameFile($filename) {
		//完成文件读取后，去除分区临时文件名.part
		if (!$this->__chunks || $this->__chunk == $this->__chunks - 1) {
			$newname = substr($filename,0,-5);
			if (rename($filename, $newname)) {
				$this->__newFileName = basename($newname);
				//设置上传完成标识
				$this->__status = true;
			}
		}
	}
	
}