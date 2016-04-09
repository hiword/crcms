<?php
namespace Attachment\Controller;
use Common\Controller\GlobalController;
use Org\Util\SystemTool;
use Org\Net\Http;
class IndexController extends GlobalController {
	
	protected function _initialize() {
	//多个域名可通过来源来判断，如
		// if($host == 'baidu.com') {
		// } else if ($host == 'g.cn') {
		// }
		// header("Access-Control-Allow-Origin:http://{$host}");
		header("Access-Control-Allow-Origin:*");//html5
		// other CORS headers if any...
		if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
			exit; // finish preflight CORS requests here
		}
		parent::_initialize();
		$this->crcms_model = D('Attachment/Attachment');
		//SESSION 丢失解决方法
		if(isset($_REQUEST['SESSION_ID']) && $_REQUEST['SESSION_ID'] !=session_id()){
			session_destroy();
			session_id($_REQUEST['SESSION_ID']);
			session_start();
		}
		$this->crcms_model = D('Attachment/Attachment');
	}
	
	public function index() {
		//配置上传路径
		load('@.common');
		parent::assign('domain',\setDistributedDomain());
		//设置token值和远程服务器进行交互
		$rand = mt_rand(1, 20000);
		parent::assign('remote_rand',$rand);
		parent::assign('remote_token',SystemTool::remoteEncrypt($rand));
		parent::display('upload');
	}
	
	/**
	 * 返回上传的配置信息，各远程文件统一调度
	 */
	public function return_upload_setting() {
		$params = I('post.');
		if ($params['token'] !== SystemTool::remoteEncrypt($params['rand'].$params['rand'])) {
			SystemTool::log("token值比对失败！", 'SYSTEM_ERROR',$this->crcms_model);
			exit('Error!!!');
		}
		$config = array(
// 			'savepath'=>UPLOADS_PATH,
			'allowExtType'=>array('zip'),
			'allowmimetype'=>array('application/zip','application/octet-stream','image/jpeg','image/jpg','image/gif','image/png'),
			'allowFileSize'=>'500mb',
			'upFileName'=>'file',
			'ischunk'=>true,
		);
		echo json_encode($config);
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Common\Controller\GlobalController::add()
	 * 远程文件入库
	 */
	public function add() {
		if (!IS_POST) parent::error(C('NOT_POST'));
		//验证token
		$params = I('post.');
		$this->crcms_data = $params['data'];
		//token值加密比对判断
		if ($params['token'] !== SystemTool::remoteEncrypt($params['rand'].$params['rand'])) {
			SystemTool::log("token值比对失败！", 'SYSTEM_ERROR',$this->crcms_model);
			exit('Error!!!');
		}
		$insertId = $this->crcms_model->addData($this->crcms_data);
		if ($insertId) {
			$this->crcms_data['atid'] = $insertId;
			$AttachmentData = D('Attachment/AttachmentData');
			if ($AttachmentData->addData($this->crcms_data)) {
				echo 'success';
			} else {
				SystemTool::log("数据附件数据写入附件附加表失败", 'SYSTEM_ERROR',$AttachmentData);
			}
		} else {
			SystemTool::log("数据附件数据写入失败", 'SYSTEM_ERROR',$this->crcms_model);
		}
	}
	
	
	/* =====================如果是不同服务器移植的方法========================= */
	
	/**
	 * 返回SESSION id用于文件分割上传的ajax
	 */
	public function return_session() {
		$params = I('get.');
		if ($params['token'] !== SystemTool::remoteEncrypt($params['rand'])) {
			SystemTool::log("token值比对失败！", 'SYSTEM_ERROR',$this->crcms_model);
			exit('Error!!!');
		}
		echo session_id();
	}
	
	/**
	 * SESSION保存原文件名 plupload限制
	 */
	public function set_attachment_old_name() {
		$params = I('post.');
		if ($params['token'] !== SystemTool::remoteEncrypt($params['rand'])) {
			SystemTool::log("token值比对失败！", 'SYSTEM_ERROR',$this->crcms_model);
			exit('Error!!!');
		}
		$oldname = $this->checkData('oldname','POST');
		session('oldname',$oldname);
	}
	
	public function upload() {
		$params = I('post.');
		if ($params['token'] !== SystemTool::remoteEncrypt($params['rand'])) {
			exit('Error!!!');
		}
		//获取配置
		$config = session('upload_conf');
		if (empty($config)) {
			$data = array();
			$data['rand'] = mt_rand(1, 9999);
			$data['token'] = SystemTool::remoteEncrypt($data['rand'].$data['rand']);
			$uploadsConfigPath = C('REMOET_UPLOADS_CONFIG') ? C('REMOET_UPLOADS_CONFIG') : U('return_upload_setting');
			$result = Http::curlPost($uploadsConfigPath, $data);
			if (empty($result)) {
				SystemTool::log('无法加载远程上传配置！', 'SYSTEM_ERROR',$this->crcms_model);
				parent::error('无法加载上传配置！');
			}
			$config = json_decode($result,true);
			if (json_last_error() === JSON_ERROR_NONE) {
				$config = array_change_key_case($config);
				$config['savepath'] = UPLOADS_PATH;//上传目录更新为自己
				session('upload_conf',$config);
			} else {
				SystemTool::log('解析远程JSON上传配置失败！', 'SYSTEM_ERROR',$this->crcms_model);
				parent::error('无法加载上传配置！');
			}
		}
		$Uploads = new PlUpload();
		$this->crcms_data = $Uploads->config($config)->save();
		//出错返回错误信息
		if ((bool) $error = $Uploads->getError()) {
			parent::ajaxReturn($error);
		}
		//文件入库
		if ($Uploads->isUploadComplete()) {
			//删除session保存的原文件名
			session('oldname',null);
			$this->crcms_data = $this->crcms_data[0];
			$data = array();
			$data['data'] = $this->crcms_data;
			//附加其它选项
			$data['data']['client_ip'] = CLIENT_IP_NUM;
			$data['data']['client_ip_normal'] = CLIENT_IP;
			$data['data']['server_ip'] = sprintf("%u",ip2long($_SERVER['SERVER_ADDR']));
			$data['data']['server_ip_normal'] = $_SERVER['SERVER_ADDR'];
			$data['data']['http_host'] = $_SERVER['HTTP_HOST'];
			$data['data']['scheme']   =  is_ssl()?'https':'http';
			//写入随机加密值，不加上data['data']，在POST提交时对方服务器处理则会将数值型变为字符型数值
			$data['rand'] = mt_rand(1,19999);
			$data['token'] = SystemTool::remoteEncrypt($data['rand'].$data['rand']);
			//远程数据写入
			$postDataUrl = C('REMOET_ATTACHMENT_POSTDATA_URL') ? C('REMOET_ATTACHMENT_POSTDATA_URL') : U('add');
			$result = Http::curlPost($postDataUrl,$data);//()
			if ($result === 'success') {
				parent::ajaxReturn($this->crcms_data);
			} else {
				parent::error('附件添加失败！');
			}
		}
	}
	
}