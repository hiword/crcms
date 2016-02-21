<?php
// +-----------------------------------------------------------------
// | 文件上传类，全部MiMe类型检测，更安全，
// | 支持大文件上传，支持文件流上传
// +-----------------------------------------------------------------
// | @Author: CHENG <28737164@qq.com>
// +-----------------------------------------------------------------

namespace Simon\File\Tools\Uploads;

class Upload {
	
	protected $_allowExtType = array('jpg','jpeg','png','gif');//允许上传的扩展名类型
	protected $_allowMimeType = array();//允许上传的文件mime类型
	protected $_checkFileMime = true;//验证文件mime类型
	protected $_allowFileSize = '2MB';//允许的文件大小
	protected $_upFileName = null;//文件域表单名
	protected $_savePath = null;//文件上传路径
	protected $_isRename = true;//是否重命名
	protected $_renameRule = array();//重命名规则
	protected $_isUsePathFormat = true;//是否使用内部子目录格式
	protected $_pathFormat = 'Y/md';//子目录格式使用date函数创建
	protected $_allowPutStream = false;//input流上传
	protected $_isCoverFile = false;//文件存在时是否覆盖，false时将文件名改为 name(1)格式
	/* 不允许修改的属性以__结尾 */
	protected $__file = array();//$_FILES
	protected $__newFileName = null;//新的文件名
	protected $__fileExtension = null;//文件名扩展名
	protected $__error = array();//错误代码
	protected $__fileinfo = array();//成功后的文件信息
	
	/**
	 * 构造方法，上传初始化
	 * @param array $config
	 */
	public function __construct(array $config = array()) {
		if (!empty($config)) $this->config($config);
	}
	
	/**
	 * 设置上传配置
	 * @param unknown $config
	 * @return Uploads
	 */
	public function config(array $config = array()) {
		$classLowerKey = array_keys(array_change_key_case(get_class_vars(__CLASS__)));
		//批量属性设置
		$classVar = array_combine($classLowerKey, array_keys(get_class_vars(__CLASS__)));
		//获取所有配置key
		$configKey = array_keys($config);
		foreach ($configKey as $key) {
			$skey = $key;
			$skey = strtolower('_'.ltrim($skey,'_'));
			//设置属性
			if(in_array($skey, $classLowerKey,true)) {
				$this->$classVar[$skey] = $config[$key];
			}
		}
		//设置文件路径
		$this->_setFilePath();
		return $this;
	}
	
	/**
	 * 保存文件上传【核心】
	 * @return Uploads
	 */
	public function save() {
		if (empty($_FILES)) {
			//是否允许put流上传
			if ($this->_allowPutStream) {
				if ((bool) $result = $this->putStream()) {
					return $result;
				}
			}
			$this->_setError(9,'没有文件被上传！');
			return false;
		} else {
			$this->_setFiles();
		}
		foreach ($this->__file as $key=>$values) {
			//指定文件名则上传指定文件名否则上传全部
			if ($this->_upFileName && $values['file_key']!==$this->_upFileName) continue;
			//文件是否是通过 HTTP POST 上传的
			if (!$this->_checkUploadType($values)) continue;
			//验证错误类型
			if (!$this->_checkErrorType($values)) continue;
			//验证文件大小
			if (!$this->_checkFileSize($values)) continue;
			//设置获取文件扩展名
			$this->_setFileExtension($values);
			//验证文件类型 扩展名和mime两种类型验证
			if (!$this->_checkFileType($values)) continue;
			//文件创建目录
			$this->_setDir();
			//文件重命名处理
			$this->_setRename($values);
			//文件移动
			if ($this->_setFileMove($values)) {
				$this->__fileinfo[$key] = $this->_setUploadInfo($values);
			}
		}
		//$this->__file = $files;
		//return count($files)===count($files,true) ? array_shift($files) : $files;
		return $this;
	}
	
	/**
	 * 获取上传成功的文件信息
	 * @return multitype:
	 */
	public function getUploadFileInfo() {
		return $this->__fileinfo;
	}
	
	/**
	 * 返回错误信息
	 * @return multitype:
	 */
	public function getError() {
		return $this->__error;
	}
	
	
	/**
	 * 执行文件流上传
	 * @return boolean
	 */
	protected function putStream() {
		return false;
	}
	
	/**
	 * 设置需要上传的文件
	 * @return multitype:
	 */
	protected function _setFiles() {
		$temp = array();
		foreach ($_FILES as $key=>$values) {
			//过滤不存在的数据
			if (empty($values['name'])) continue;
			if (count($values) === count($values,true)) {
				$values['file_key'] = $key;
				$this->__file[] = $values;
			} else {
				foreach ($values['name'] as $k=>$vo) {
					if (empty($vo)) continue;
					$temp['name'] = $vo;
					$temp['type'] = $values['type'][$k];
					$temp['tmp_name'] = $values['tmp_name'][$k];
					$temp['error'] = $values['error'][$k];
					$temp['size'] = $values['size'][$k];
					$temp['file_key'] = $key;
					$this->__file[] = $temp;
				}
			}
		}
		return $this->__file;
	}
	
	/**
	 * 设置文件扩展名
	 * @param array $data
	 */
	protected function _setFileExtension($data) {
		$ext = explode('.', $data['name']);
		$this->__fileExtension = end($ext);
	}

	/**
	 * 设置完成上传后的返回数据信息
	 * @param array $data
	 * @return string
	 */
	protected function _setUploadInfo($data) {
		//设置文件扩展名
		$data['ext'] = $this->__fileExtension;
		//设置新文件名
		$data['new_name'] = $this->__newFileName;
		//保存路径
		$data['save_path'] = str_replace('\\', '/', $this->_savePath);
		//完成文件名 文件路径+文件名
		$data['full_path'] = $data['save_path'].$this->__newFileName;
		$data['full_root'] = str_replace($_SERVER['DOCUMENT_ROOT'], '', $data['full_path']);
		//完成上传时间
		$data['complete_time'] = time();
		//完成上传的微秒时间，用于大并发
		list($usec, $sec) = explode(" ", microtime());
		$data['complete_microtime'] = (float)$usec + (float)$sec;
		//上传的惟一值，理论上要做到永远惟一
		$data['unique_key'] = sha1($data['full_path']);
		return $data;
	}
	
	/**
	 * 文件上传-移动临时文件
	 * @param array $data
	 * @return Ambigous <number, boolean>|boolean
	 */
	protected function _setFileMove($data) {
		//一次性移动
		return move_uploaded_file($data['tmp_name'], $this->_savePath.$this->__newFileName);
	}
	
	/**
	 * 设置文件保存路径
	 * @return boolean
	 */
	protected function _setFilePath() {
		//设置默认主路径
		$this->_savePath = empty($this->_savePath) ? dirname(__FILE__).DIRECTORY_SEPARATOR : rtrim(rtrim($this->_savePath,'/'),DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
		//使用内部目录路径格式
		if ($this->_isUsePathFormat) {
			$dir = '';
			$pathFormat = explode('/',trim($this->_pathFormat,'/'));
			foreach ($pathFormat as $value) {
				$dir.=date($value).DIRECTORY_SEPARATOR;
			}
			$this->_savePath.=$dir;
		}
		return true;
	}
	
	/**
	 * 创建目录
	 * @param string $dir
	 * @param number $mode
	 * @return boolean
	 */
	protected function _setDir($dir ='',$mode = 0777) {
		empty($dir) && $dir = $this->_savePath;
		if (is_dir($dir) || @mkdir($dir, $mode)) return true;
		if (!$this->_setDir(dirname($dir), $mode)) return false;
		return @mkdir($dir, $mode);
	}
	
	/**
	 * 验证是否为正常上传文件
	 * @param array $data
	 * @return boolean
	 */
	protected function _checkUploadType($data) {
		if (is_uploaded_file($data['tmp_name'])) {
			return true;
		} else {
			$this->_setError(12, '非正常post表单文件');
			return false;
		}
	}
	
	/**
	 * 文件重命名
	 * @param array $data
	 * @return array
	 */
	protected function _setRename($data) {
		if ($this->_isRename) {
			$extension = $this->__fileExtension;
			//使用自定义命名规则
			if ($this->_renameRule) {
				$newname = call_user_func_array($this->_renameRule[0], $this->_renameRule[1]);
			} elseif (!$this->_renameRule) {
				//使用系统命名规则
				$newname = sha1(mt_rand(1,99999).uniqid().$data['name']);
			}
			$newname = $newname.'.'.$extension;
		} else {
			//为了保持统一，如果不重命名也创建新文件名=旧文件名
			$newname = $data['name'];
		}
		//判断文件是否存在，是否覆盖旧文件
		if (file_exists($this->_savePath.$newname) && !$this->_isCoverFile) {
			$newname = time().$newname;
		}
		$this->__newFileName = $newname;
		return true;
	}
	
	/**
	 * 验证文件大小是否符合
	 * @param array $data
	 * @return boolean
	 */
	protected function _checkFileSize($data) {
		//获取文件大小并转换为字节
		$this->_allowFileSize = $this->_sizeToByte($this->_allowFileSize);
		if ($data['size'] <= $this->_allowFileSize) {
			return true;
		} else {
			$this->_setError(11, '文件大小超过限制');
			return false;
		}
	}
	
	/**
	 * 验证文件MiMe类型
	 * @param array $data
	 * @return boolean
	 */
	protected function _checkFileType($data) {
		//验证mime类型
		if ($this->_checkFileMime) {
			//mime类型为空则使用类中内置的mime类型，类中内置的mime类型
			//都是通过php finfo->file方式获得,安全也强烈建议开启fileinfo扩展
			//如果只是通过验证data['type']即浏览器传递的mime类型，则需要手动设置_allowMimeType
			if (empty($this->_allowMimeType)) {
				//通过扩展名来获取PHP内置mime类型，需要浏览器的mime则需要手动提供
				$allMimeType = self::_getAllMimeType();
				$allowMimeType = array();
				array_map(function ($value)use($allMimeType,&$allowMimeType){
					$allMimeType[$value] && $allowMimeType[] = $allMimeType[$value];
				},$this->_allowExtType);
				$this->_allowMimeType = $allowMimeType;
			}
			if (class_exists('finfo')) {
				$finfo = new \finfo(FILEINFO_MIME_TYPE);
				$mime = $finfo->file($data['tmp_name']);
			} elseif (function_exists('mime_content_type')) {
				//此方法在5.3中已经逐步废弃，为兼容更低版本，也在没有finfo情况下有的情况下比接收浏览器的类型要好很多
				//也是相对安全的情况
				$mime = mime_content_type($data['tmp_name']);
			} else {
				//浏览器提供的mime类型，可以伪造，不安全
				//同时因为各浏览器所提供的mime类型不一致，所有需要手动定义mime类型
				$mime = $data['type'];
			}
			if (in_array($mime, $this->_allowMimeType,true)) {
				return true;
			}
		} else {
			//只验证扩展名，很不安全
			if (in_array($this->__fileExtension,$this->_allowExtType,true)) {
				return true;
			}
		}
		$this->_setError(10, '文件类型格式不正确');
		return false;
	}
	
	/**
	 * 验证错误类型
	 * @param array $data
	 * @return boolean
	 */
	protected function _checkErrorType($data) {
		if ($data['error'] === 0) {
			return true;
		} else {
			$error = array(
				1=>'文件大小超出了服务器限制',
				2=>'文件大小超出表单限制',
				3=>'文件仅部分被上传',
				4=>'没有找到要上传的文件',
				5=>'服务器临时文件夹丢失',
				6=>'文件写入到临时文件夹出错',
				7=>'上传的文件未能成功写入',
				8=>'服务器未开启上传功能',
			);
			$this->_setError($data['error'], $error[$data['error']]);
			return false;
		}
	}
	
	/**
	 * 设置错误
	 * @param numeric $code
	 * @param string $msg
	 */
	protected function _setError($code,$msg) {
		$error = array('code'=>$code,'msg'=>$msg);
		$this->__error[] = $error;
	}
	
	/**
	 * 文件大小转换为字节
	 * @param string $size
	 * @return unknown|number
	 */
	protected function _sizeToByte($size) {
		//如果是数字 返回原值 单位 Bytes
		if(is_numeric($size)) return $size;
		//获取单位
		$unit = strtoupper(substr($size,-2,2));
		//获取数值
		$size = rtrim($size,$unit);
		//真实Bytes尺寸
		$realSize = 0;
		switch($unit){
			case 'KB' : $realSize = $size * pow(2,10); break;
			case 'MB' : $realSize = $size * pow(2,20); break;
			case 'GB' : $realSize = $size * pow(2,30); break;
			default	  : $realSize = 0;
		}
		return $realSize;
	}
	
	/**
	 * 得到所有mime类型
	 * @return multitype:string
	 */
	protected static function _getAllMimeType() {
		return array(
				'html'=>'text/html',
				'htm'=>'text/html',
				'shtml'=>'text/html',
				'css'=>'text/css',
				'xml'=>'text/xml',
				'mml'=>'text/mathml',
				'txt'=>'text/plain',
				'jad'=>'text/vnd.sun.j2me.app-descriptor',
				'wml'=>'text/vnd.wap.wml',
				'htc'=>'text/x-component',
				'gif'=>'image/gif',
				'jpeg'=>'image/jpeg',
				'jpg'=>'image/jpg',
				'png'=>'image/png',
				'tif'=>'image/tiff',
				'tiff'=>'image/tiff',
				'tiff'=>'image/tiff',
				'wbmp'=>'image/vnd.wap.wbmp',
				'ico'=>'image/x-icon',
				'jng'=>'image/x-jng',
				'bmp'=>'image/x-ms-bmp',
				'svg'=>'image/svg+xml',
				'svgz'=>'image/svg+xml',
				'webp'=>'image/webp',
				'js'=>'application/javascript',
				'atom'=>'application/atom+xml',
				'rss'=>'application/rss+xml',
				'woff'=>'font-woff',
				'jar'=>'application/java-archive',
				'ear'=>'application/java-archive',
				'war'=>'application/java-archive',
				'json'=>'application/json',
				'hqx'=>'application/mac-binhex40',
				'doc'=>'application/msword',
				'pdf'=>'application/pdf',
				'ps'=>'application/postscript',
				'eps'=>'application/postscript',
				'ai'=>'application/postscript',
				'rtf'=>'application/rtf',
				'm3u8'=>'application/vnd.apple.mpegurl',
				'xls'=>'application/vnd.ms-excel',
				'eot'=>'application/vnd.ms-fontobject',
				'ppt'=>'application/vnd.ms-powerpoint',
				'wmlc'=>'application/vnd.wap.wmlc',
				'kml'=>'application/vnd.google-earth.kml+xml',
				'kmz'=>'application/vnd.google-earth.kmz',
				'7z'=>'application/x-7z-compressed',
				'cco'=>'application/x-cocoa',
				'jardiff'=>'application/x-java-archive-diff',
				'jnlp'=>'application/x-java-jnlp-file',
				'run'=>'application/javascript',
				'js'=>'application/x-makeself',
				'pl'=>'application/x-perl',
				'pm'=>'application/x-perl',
				'prc'=>'application/x-pilot',
				'pdb'=>'application/x-pilot',
				'rar'=>'application/x-rar-compressed',
				'rpm'=>'application/x-redhat-package-manager',
				'sea'=>'application/x-sea',
				'swf'=>'application/x-shockwave-flash',
				'sit'=>'application/x-stuffit',
				'tcl'=>'application/x-tcl',
				'tk'=>'application/x-tcl',
				'der'=>'application/x-x509-ca-cert',
				'pem'=>'application/x-x509-ca-cert',
				'crt'=>'application/x-x509-ca-cert',
				'xpi'=>'application/x-xpinstall',
				'xhtml'=>'application/xhtml+xml',
				'xspf'=>'application/xspf+xml',
				'zip'=>'application/zip',
				'bin'=>'application/octet-stream',
				'exe'=>'application/octet-stream',
				'dll'=>'application/octet-stream',
				'bin'=>'application/octet-stream',
				'deb'=>'application/octet-stream',
				'iso'=>'application/octet-stream',
				'dmg'=>'application/octet-stream',
				'img'=>'application/octet-stream',
				'msi'=>'application/octet-stream',
				'msp'=>'application/octet-stream',
				'msm'=>'application/octet-stream',
				'docx'=>'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
				'xlsx'=>'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
				'pptx'=>'application/vnd.openxmlformats-officedocument.presentationml.presentation',
				'mid'=>'application/midi',
				'midi'=>'application/midi',
				'kar'=>'application/midi',
				'mp3'=>'audio/mpeg',
				'ogg'=>'audio/ogg',
				'm4a'=>'audio/x-m4a',
				'ra'=>'audio/x-realaudio',
				'3gpp'=>'video/3gpp',
				'3gp'=>'video/3gpp',
				'ts'=>'video/mp2t',
				'mp4'=>'video/mp4',
				'mpg'=>'video/mpeg',
				'mpeg'=>'video/mpeg',
				'mov'=>'video/quicktime',
				'webm'=>'video/webm',
				'flv'=>'video/x-flv',
				'm4v'=>'video/x-m4v',
				'mng'=>'video/x-mng',
				'asx'=>'video/x-ms-asf',
				'asf'=>'video/x-ms-asf',
				'wmv'=>'video/x-ms-wmv',
				'avi'=>'video/x-msvideo',
		);
	} 
	
}
/*
 * text/html                             html htm shtml;
			text/css                              css;
			text/xml                              xml;
			
			text/mathml                           mml;
			text/plain                            txt;
			text/vnd.sun.j2me.app-descriptor      jad;
			text/vnd.wap.wml                      wml;
			text/x-component                      htc;
			
			image/gif                             gif;
			image/jpeg                            jpeg jpg;
			image/png                             png;
			image/tiff                            tif tiff;
			image/vnd.wap.wbmp                    wbmp;
			image/x-icon                          ico;
			image/x-jng                           jng;
			image/x-ms-bmp                        bmp;
			image/svg+xml                         svg svgz;
			image/webp                            webp;
			
			
			application/javascript                js;
			application/atom+xml                  atom;
			application/rss+xml                   rss;
			application/font-woff                 woff;
			application/java-archive              jar war ear;
			application/json                      json;
			application/mac-binhex40              hqx;
			application/msword                    doc;
			application/pdf                       pdf;
			application/postscript                ps eps ai;
			application/rtf                       rtf;
			application/vnd.apple.mpegurl         m3u8;
			application/vnd.ms-excel              xls;
			application/vnd.ms-fontobject         eot;
			application/vnd.ms-powerpoint         ppt;
			application/vnd.wap.wmlc              wmlc;
			application/vnd.google-earth.kml+xml  kml;
			application/vnd.google-earth.kmz      kmz;
			application/x-7z-compressed           7z;
			application/x-cocoa                   cco;
			application/x-java-archive-diff       jardiff;
			application/x-java-jnlp-file          jnlp;
			application/x-makeself                run;
			application/x-perl                    pl pm;
			application/x-pilot                   prc pdb;
			application/x-rar-compressed          rar;
			application/x-redhat-package-manager  rpm;
			application/x-sea                     sea;
			application/x-shockwave-flash         swf;
			application/x-stuffit                 sit;
			application/x-tcl                     tcl tk;
			application/x-x509-ca-cert            der pem crt;
			application/x-xpinstall               xpi;
			application/xhtml+xml                 xhtml;
			application/xspf+xml                  xspf;
			application/zip                       zip;
			
			application/octet-stream              bin exe dll;
			application/octet-stream              deb;
			application/octet-stream              dmg;
			application/octet-stream              iso img;
			application/octet-stream              msi msp msm;
			
			application/vnd.openxmlformats-officedocument.wordprocessingml.document    docx;
			application/vnd.openxmlformats-officedocument.spreadsheetml.sheet          xlsx;
			application/vnd.openxmlformats-officedocument.presentationml.presentation  pptx;
			
			audio/midi                            mid midi kar;
			audio/mpeg                            mp3;
			audio/ogg                             ogg;
			audio/x-m4a                           m4a;
			audio/x-realaudio                     ra;
			
			video/3gpp                            3gpp 3gp;
			video/mp2t                            ts;
			video/mp4                             mp4;
			video/mpeg                            mpeg mpg;
			video/quicktime                       mov;
			video/webm                            webm;
			video/x-flv                           flv;
			video/x-m4v                           m4v;
			video/x-mng                           mng;
			video/x-ms-asf                        asx asf;
			video/x-ms-wmv                        wmv;
			video/x-msvideo                       avi;
 */
?>