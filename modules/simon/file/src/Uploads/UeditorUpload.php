<?php
namespace Simon\File\Uploads;
class UeditorUpload extends FileUpload
{
	
// 	public function getFiles()
// 	{
// 		$file = $this->files[0];
// 		logger($file);
// 		return [
// 				'state'=>'SUCCESS',
// 				'url'=>$file['full_root'],
// 				'title'=>$file['new_name'],
// 				'original'=>$file['old_name'],
// 				'type'=>'.'.$file['extension'],
// 				'size'=>$file['filesize'],
// 		];
// 	}
	
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
	
}