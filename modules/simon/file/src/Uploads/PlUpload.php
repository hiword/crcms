<?php
namespace Simon\File\Uploads;
use Simon\File\Uploads\Exceptions\UploadException;
class PlUpload extends FileUpload
{
	
	protected $checkMime = false;
	
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
	
	/**
	 * 上传的字节数据，也检测是否上传完成
	 * @var integer
	 * @author simon
	 */
	protected $status = 0;
	
	protected function getNewName()
	{
		return $_POST['name'];
	}
	
	/**
	 * 分块上传大小设置
	 */
	protected function setChunking()
	{
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
	
	protected function setUploading(array $upload)
	{
		$upload['name'] = $_POST['oldname'];
		parent::setUploading($upload);
	}
	
	protected function moveUploadFile() 
	{
		//块上传大小
		$this->setChunking();
		
		//读取并写入数据流
		if (!(boolean) $fpIn = fopen($this->uploading['tmp_name'], "rb"))
		{
			throw new UploadException($this->uploading['name'], UploadException::READ_FILE_STREAM_ERR);
		}
		
		//获取文件路径
		$file = $this->getTempFile();
		
		//读取文件
		if (!(boolean) $fpOut = fopen($file, $this->chunks ? "ab" : "wb"))
		{
			//关闭文件流
			fclose($fpIn);
			throw new UploadException($this->uploading['name'], UploadException::WRITER_ERR_NO_TMP_DIR);
		}
		
		//循环按照指定字节读取文件
		while ((boolean)$buff = fread($fpIn, 4096))
		{
			$this->status = fwrite($fpOut, $buff);
		}
	
		//关闭文件流
		fclose($fpOut);
		fclose($fpIn);
	}
	
	/**
	 * 处理文件上传
	 * @param array $upload
	 * @author simon
	 */
	protected function handleUpload()
	{
		//自动创建目录
		$this->file->mkDir(dirname($this->file->getNewPath()));
			
		$this->moveUploadFile();
		
		//上传完成
		if ($this->status && (!$this->chunks || $this->chunk == $this->chunks - 1))
		{
			$file = $this->getTempFile();
			$newname = substr($file,0,-5);
			rename($file, $newname);
			$this->files[] = $this->getUploadInfo();
		}
	}
	
	/**
	 * 临时文件名
	 * @author simon
	 */
	protected function getTempFile()
	{
		return $this->file->getNewPath().'.part';;
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