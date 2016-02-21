<?php
namespace Simon\File\Uploads;
class RemoteUpload extends FileUpload
{
	
	protected $fieldName = 'source';
	
	public function upload() 
	{
		$fieldName = 'source';
		
		/* 抓取远程图片 */
		$list = array();
		if (isset($_POST[$fieldName]))
		{
			$source = $_POST[$fieldName];
		}
		else
		{
			$source = $_GET[$fieldName];
		}
		logger($source);
		foreach ($source as $imgUrl) {
			$item = new Uploader($imgUrl, $config, "remote");
			$info = $item->getFileInfo();
			array_push($list, array(
					"state" => $info["state"],
					"url" => $info["url"],
					"size" => $info["size"],
					"title" => htmlspecialchars($info["title"]),
					"original" => htmlspecialchars($info["original"]),
					"source" => htmlspecialchars($imgUrl)
			));
		}
		
		/* 返回抓取数据 */
		return json_encode(array(
				'state'=> count($list) ? 'SUCCESS':'ERROR',
				'list'=> $list
		));
	}
	
}