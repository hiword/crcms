<?php
namespace Simon\File\Services;
use Simon\File\Tools\Uploads\PlUpload;
use App\Services\Service;
class Upload extends Service
{
	
	protected $upload = null;
	
	protected $config = [];
	
	protected function setConfig()
	{
		$this->config = [
				'allowmimetype'=>['image/jpeg','image/jpg','image/gif','image/png','image/bmp'],
				'allowexttype'=>['jpg','jpeg','gif','png','bmp'],
				'allowfilesize'=>'1mb',
				'upfilename'=>'file',
				'savepath'=>public_path('uploads'),
				'checkfilemime'=>false,
		];
		if ((boolean)$uploadConfig = session('upload_config'))
		{
			$this->config = array_merge($this->config,$uploadConfig);
		}
		
		return $this;
	}
	
	public function getConfig()
	{
		return $this->setConfig()->config;
	}
	
	protected function setHeader()
	{
		//多个域名可通过来源来判断，如
		// if($host == 'baidu.com') {
		// } else if ($host == 'g.cn') {
		// }
		// header("Access-Control-Allow-Origin:http://{$host}");
// 		header("Access-Control-Allow-Origin:*");//html5
		// other CORS headers if any...
		if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS')
		{
			exit; // finish preflight CORS requests here
		}
		
		//SESSION 丢失解决方法
		$request = app('request');
		if($request->input('SESSION_ID',null) && $request->input('SESSION_ID') !== session()->getId())
		{
			session()->setId($request->input('SESSION_ID'));
		}
		
		return $this;
	}
	
	public function uploaded() {
		logger(var_export($this->config,true));
		$this->setHeader()->setConfig();
		
		//upload
		$this->upload = new PlUpload();
		
		$this->upload->config($this->config)->setTotalSize(static::$data['orig_size'])->setOldName(static::$data['oldname'])->save();
		
		//出错返回错误信息
		if ((bool) $error = $this->upload->getError())
		{
			return $this->response->throwResponsed(['error',$error[0]['msg']]);
		}
		
		//文件入库
		if ($this->upload->isUploadComplete())
		{
			//重置session
			//session(['upload_config'=>[]]);
			return true;
		}
		
		return $this;
	}
	
	public function successFileInfo() 
	{
		return $this->upload->getUploadFileInfo()[0];
	}
}