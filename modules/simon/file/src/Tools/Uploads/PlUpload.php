<?php
namespace Simon\File\Tools\Uploads;

class PlUpload extends Upload {
	
	
	protected $_allowPutStream = true;//允许使用inputstream上传
	private $_maxFileAge = 18000; // Temp file age in seconds
	private $_oldName = null;
	private $_totalSize = 0;
	private $__chunk = 0;
	private $__chunks = 0;
	private $__status = false;
	
	
	/**
	 * 检测是否上传完成
	 * @return boolean
	 */
	public function isUploadComplete() {
		return $this->__status;
	}
	
	/**
	 * (non-PHPdoc)
	 * 设置文件扩展名--因为是分片所以必须为_POST每次获取的文件名
	 * @see \Org\Net\Uploads::_setFileExtension()
	 */
	protected function _setFileExtension($data) {
		$ext = explode('.', $_POST['name']);
		$this->__fileExtension = end($ext);
	}
	
	/**
	 * (non-PHPdoc)
	 * 执行重命名操作--因为是分片所以必须为_POST每次获取的文件名
	 * @see \Org\Net\Uploads::_setRename()
	 */
	protected function _setRename($data) {
		$this->__newFileName = $_POST['name'];
	}
	
	/**
	 * (non-PHPdoc)
	 * 文件流上传
	 * @see \Org\Net\Uploads::putStream()
	 */
	protected function putStream() {
		//获取文件名
		$this->_setRename();
		//设置块上传大小
		$this->_setChunks();
		//清理临时文件，[非必须]
		$this->_clearTempFile();
		//读取并写入数据流
		if ((bool) $fpIn = fopen("php://input", "rb")) {
			$filename = $this->_savePath.$this->__newFileName.'.part';
			if ((bool) $fpOut = fopen($filename, $this->__chunks ? "ab" : "wb")) {
				//循环按照指定字节读取文件
				while ((bool)$buff = fread($fpIn, 4096)) {
					$status = fwrite($fpOut, $buff);
				}
				fclose($fpOut);
			} else {
				$this->_setError(14, '写入临时文件失败');
				$status = false;
			}
			fclose($fpIn);
			if ($status) {
				//重命名文件
				$this->_renameFile($filename);
			}
			return $status;
		} else {
			$this->_setError(20,'读取文件流失败！');
			return false;
		}
		if (!$in = @fopen("php://input", "rb")) {
			die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
		}
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \CrCms\Util\Uploads\Upload::_setFileMove()
	 */
	protected function _setFileMove($data) {
		// Chunking might be enabled
		$this->_setChunks();
		//清理临时文件，[非必须]
		$this->_clearTempFile();
		//读取临时文件
		if ((bool)$fpIn = fopen($data['tmp_name'], 'rb')) {
			$filename = $this->_savePath.$this->__newFileName.'.part';
			if ((bool)$fpOut = fopen($filename,$this->__chunks ? 'ab' : 'wb')) {
				//循环按照指定字节读取文件
				while ((bool)$buff = fread($fpIn, 4096)) {
					$status = fwrite($fpOut, $buff);
				}
				fclose($fpOut);
			} else {
				$this->_setError(14, '写入临时文件失败');
				$status = false;
			}
			fclose($fpIn);
			if ($status) {
				//重命名文件
				$this->_renameFile($filename);
			}
			return $status;
		} else {
			$this->_setError(13, '读取临时文件失败');
			return false;
		}
	}
	
	/**
	 * 分块上传大小设置
	 */
	private function _setChunks() {
		// Chunking might be enabled
		$this->__chunk = isset($_POST["chunk"]) ? intval($_POST["chunk"]) : 0;
		$this->__chunks = isset($_POST["chunks"]) ? intval($_POST["chunks"]) : 0;
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
	
	/**
	 * (non-PHPdoc)
	 * 设置文件上传后的返回信息
	 * @see \Org\Net\Uploads::_setUploadInfo()
	 */
	protected function _setUploadInfo($data) {
		$data = parent::_setUploadInfo($data);
		//plupload chunk限制，通过此方法获取文件原名
		$data['name'] = $this->_oldName;//session('oldname');
		$data['size'] = $this->_totalSize;
		return $data;
	}
	
	public function setTotalSize($size)
	{
		$this->_totalSize = $size;
		return $this;
	}	
	/**
	 *  设置文件名
	 * @param unknown $name
	 * @return \CrCms\Util\Uploads\PlUpload
	 */
	public function setOldName($name) {
		$this->_oldName = $name;
		return $this;
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
	
}
?>