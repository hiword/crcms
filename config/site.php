<?php
return [
		
// 		'theme'=>'skin1',
		
		'image_upload'=>[
			'filesize'=>2097152,
			'extensions'=>['jpg','jpeg','gif','png','bmp'],
			'checkExtension'=>true,
			'checkMime'=>true,
			'rename'=>true,
		],
		'file_upload'=>[
			'filesize'=>2097152,
			'extensions'=>['rar','zip','gz'],
			'check_extension'=>true,
			'check_mime'=>true,
			'rename'=>true,
		],
		'video_upload'=>[
			'filesize'=>10097152,
			'extensions'=>['mp3','mp4','mp5','rmvb','avi','wma'],
			'check_extension'=>true,
			'check_mime'=>true,
			'rename'=>true,
		]
		
];