<?php
namespace File\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
class FileController extends Controller {
	
	protected $filepath = '/';
	
// 	protected $files = [];
	
	/**
	 * 文件列表
	 */
	public function getIndex() {
		
		
		
		$this->filepath = $this->request->input('filepath');
		
		$size = Storage::size('file1.jpg');
		dd($size);
		
		
		//get files
		$files = Storage::files($this->filepath);
		
		//get directories
		$directories = Storage::directories($this->filepath);
		
		return $this->response(['success'],array_merge($directories,$files));
	}
	
	//post
	public function getMkdir() {
		$dirname = $this->param['dirname'];
		Storage::makeDirectory($this->filepath.$dirname);
	}
	
// 	public function getMoving() {
// 		$file = $this->param['file'];
// 		Storage::move('old/file1.jpg', 'new/file1.jpg');
// 	}
	
	//postfilesize
	public function getFilesize() {
		$files = $this->param['files'];
		
// 		foreach ($files as $item) {
// 			is_dir($filename);
// 		} else {
// 			$size = Storage::size('file1.jpg');
// 		}
		
	}
// 		$filesize
// 	}
}