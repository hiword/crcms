<?php namespace Admin\Http\Controllers;

use App\Http\Controllers\Controller;
class IndexController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		//return view('admin.index.index');
		return $this->response('index.index');
	}
	
	public function getRecycle() {
		return response()->json([]);
	}

	public function getMenu() {
		/*
		[
			'folderlist'=>[
				0=>[
					name=>"新建文件夹",
					path=>"D:/webEvnt/www/kodexplor...ata/User/admin/recycle/"
					type=>"folder"
					mode=>"drwx rwx rwx (0777) "
					atime=>1429775151
					ctime=>1429775134
					mtime=>1429775151
					is_readable=>1
					is_writeable=>1
				],
			],
			'filelist'=>[
				0=>[
					name=>"icloud.oexe"
					path=>"D:/webEvnt/www/kodexplorer3.12/data/User/admin/recycle/"
					ext=>"oexe"
					type=>"app"
					mode=>"-rw- rw- rw- (0666) "
					atime=>1429775083
					ctime=>1429775083
					mtime=>1429775083
					is_readable=>1
					is_writeable=>1
					size=>142
					size_friendly=>"142 B "
					content=>"window.open("https://www.icloud.com/");"
					icon=>"icloud.png"
					width=>"800"
					height=>"600"
					simple=>0
					resize=>1
				]
			]
		]
		*/
		return response()->json([
			'code'=>'true',
			'data'=>[
		
				
		
				'folderlist'=>[],
				'filelist'=>[
					[
// 					'name'=>"HaADDD",
// 					'content'=>"window.open(\"https://www.icloud.com/\");",
// 					'icon'=>"icloud.png",
// 					'width'=>"800",
// 					'height'=>"600",
// 					'simple'=>0,
// 					'resize'=>1,

					'name'=>"modules",
// 					'path'=>"D:/webEvnt/www/kodexplorer3.12/data/User/admin/recycle/",
					'ext'=>"oexe",
					'type'=>"url",
// 					'mode'=>"-rw- rw- rw- (0666) ",
// 					'atime'=>1429775083,
// 					'ctime'=>1429775083,
// 					'mtime'=>1429775083,
// 					'is_readable'=>1,
// 					'is_writeable'=>1,
// 					'size'=>142,
// 					'size_friendly'=>"142 B ",
					'content'=>asset('manage/model'),
					'icon'=>"icloud.png",
					'width'=>"800",
					'height'=>"600",
					'simple'=>0,
					'resize'=>1,
				]
			],
			'path_type'=>"writeable"
				]
		]);
	}
}
