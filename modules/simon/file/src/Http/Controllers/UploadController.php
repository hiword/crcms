<?php
namespace Simon\File\Http\Controllers;
use App\Http\Controllers\Controller;
use CrCms\Services\Basic\Data;
use Simon\File\Models\FileData;
use Filter;
use File\Services\Upload;
use CrCms\Contracts\Service\Message;
use Simon\File\Models\File;
// use Illuminate\Support\Facades\Session;
class UploadController extends Controller {
	
	
	public function __construct(File $File)
	{
		parent::__construct();
		$this->model = $File;
		$this->view = 'file::upload.';
	}
	
	public function getIndex()
	{
		return $this->response("{$this->view}upload");
	}
	
	
	
	public function postS()
	{
		$FileUpload = new \Simon\File\Uploads\FileUpload(public_path('uploads'));
		try 
		{
			$files = $FileUpload->upload()->getFiles();
		}
		catch (Exception $e) 
		{
			$this->throwError($e->getMessage());
		}
		return json_encode([
			'success'=>true,
			'msg'=>'ok',
			'file_path'=>$files[0]['full_root'],
		]);
// 		{
// 			"success": true/false,
// 			"msg": "error message", # optional
// 			"file_path": "[real file path]"
// 		}
	}
	
	public function postUeditor(FileData $FileData)
	{
		//文件上传
		$FileUpload = new \Simon\File\Uploads\UeditorUpload(public_path('uploads'));
		$FileUpload->upload();
		$file = $FileUpload->getFiles()[0];
		
		//数据写入
		$this->model = $this->model->storeData($file);
		$FileData->storeData(array_merge($file,['fid'=>$this->model->id]));
		
		/* 输出结果 */
		$result = json_encode($FileUpload->getFileInfo());
		if (isset($_GET["callback"]))
		{
			if (preg_match("/^[\w_]+$/", $_GET["callback"]))
			{
				return htmlspecialchars($_GET["callback"]) . '(' . $result . ')';
			}
			else
			{
				return json_encode(['state'=> 'callback参数不合法']);
			}
		}
		else
		{
			return $result;
		}
	}
	
	public function getUeditor()
	{
		$CONFIG = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents(static_asset('static/ueditor/php/config.json'))), true);
		
		switch ($this->data['action']) {
			case 'config':
				$result =  json_encode($CONFIG);
				break;
				/* 上传图片 */
			case 'uploadimage':
				/* 上传涂鸦 */
			case 'uploadscrawl':
				/* 上传视频 */
			case 'uploadvideo':
				/* 上传文件 */
			case 'uploadfile':
				/* 上传配置 */
			$FileUpload = new \Simon\File\Uploads\FileUpload(public_path('uploads'));
			logger('1111111111111111');
			logger($FileUpload->upload()->getFiles());
/**
 * 得到上传文件所对应的各个参数,数组结构
 * array(
 *     "state" => "",          //上传状态，上传成功时必须返回"SUCCESS"
 *     "url" => "",            //返回的地址
 *     "title" => "",          //新文件名
 *     "original" => "",       //原始文件名
 *     "type" => ""            //文件类型
 *     "size" => "",           //文件大小
 * )
 */

/* 返回数据 */
$result = json_encode($up->getFileInfo());
				break;
		
				/* 列出图片 */
			case 'listimage':
				$result = include("action_list.php");
				break;
				/* 列出文件 */
			case 'listfile':
				$result = include("action_list.php");
				break;
		
				/* 抓取远程文件 */
			case 'catchimage':
				$result = include("action_crawler.php");
				break;
		
			default:
				$result = json_encode(array(
				'state'=> '请求地址出错'
						));
				break;
		}
		/* 输出结果 */
		if (isset($_GET["callback"])) {
			if (preg_match("/^[\w_]+$/", $_GET["callback"])) {
				echo htmlspecialchars($_GET["callback"]) . '(' . $result . ')';
			} else {
				echo json_encode(array(
						'state'=> 'callback参数不合法'
				));
			}
		} else {
			echo $result;
		}
	}
	
	/**
	 * 获取上传的session
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function getSession()
	{
		return $this->response(['success'],['session_id'=>session()->getId()]);
	}
	
	/**
	 * 获取上传配置
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function getConfig(Upload $upload)
	{
		return $this->response(['success'],$upload->getConfig());
	}
	
	public function getUpload()
	{
		$config = ['allowexttype'=>['jpg','jpeg','zip','rar','png','gif'],'allowfilesize'=>size_byte('2MB')];
	    return $this->response("upload",['config'=>$config,'session_id'=>session()->getId()]);
	}
	
	public function postUpload()
	{
		$FileUpload = new \Simon\File\Uploads\PlUpload(public_path('uploads'));
		try
		{
			$files = $FileUpload->upload()->getFiles();
		}
		catch (Exception $e)
		{
			$this->throwError($e->getMessage());
		}
		dd($files);
		return json_encode([
				'success'=>true,
				'msg'=>'ok',
				'file_path'=>$files[0]['full_root'],
		]);
	}
	
	/**
	 * 
	 * @param Upload $upload
	 * @return \Illuminate\View\View
	 */
// 	public function getUpload(Upload $upload)
// 	{
// 		$id = empty($this->param['id']) ? '1' : intval($this->param['id']);
// 		return view('uploads.upload',['config'=>$upload->getConfig(),'session_id'=>session()->getId()]);
// 	}
	
// 	public function 
	
	public function getUploadSingle(Upload $upload)
	{
		$id = empty($this->param['id']) ? '1' : intval($this->param['id']);
		return view("uploads.upload-single-{$id}",['config'=>$upload->getConfig(),'session_id'=>session()->getId()]);
	}

	/**
	 * 文件上传
	 * @param Data $dataStore
	 * @param Upload $upload
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function postUpload2(Upload $upload) 
	{
		$status = $upload->uploaded();
		
		if ($status === false) 
		{
			return $this->response(['error',$message->getLastMessage()],true);
		}
		
		if ($status === true) 
		{
			
			$fileinfo = $upload->successFileInfo();
			
			//save
			$this->model = $this->model->storeData($fileinfo);
			
			//save file data
			$fileinfo['atid'] = $this->model->id;
			
			$fileData = new FileData();
			
			$this->model->append = $fileData->storeData($fileinfo);
			
			return $this->response(['success'],true,['data'=>$this->model]);
		}
		
	}
	
}