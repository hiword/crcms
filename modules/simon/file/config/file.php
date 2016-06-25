<?php
return [
	'image_upload'=>[
			'filesize'=>size_byte('2MB'),
			'extensions'=>['jpg','jpeg','gif','png','bmp'],
			'checkExtension'=>true,
			'checkMime'=>true,
			'rename'=>true,
	],
	'file_upload'=>[
			'filesize'=>size_byte('2MB'),
			'extensions'=>['rar','zip','gz'],
			'check_extension'=>true,
			'check_mime'=>true,
			'rename'=>true,
	],
	'mixed_upload'=>[
			'filesize'=>size_byte('2MB'),
			'extensions'=>['jpg','jpeg','gif','png','bmp','rar','zip','gz'],
			'check_extension'=>true,
			'check_mime'=>true,
			'rename'=>true,
	],
	'video_upload'=>[
			'filesize'=>size_byte('10MB'),
			'extensions'=>['mp3','mp4','mp5','rmvb','avi','wma'],
			'check_extension'=>true,
			'check_mime'=>true,
			'rename'=>true,
	],
	'exec_upload'=>[
		'filesize'=>size_byte('3MB'),
		'extensions'=>['php'],
		'check_extension'=>true,
		'check_mime'=>true,
		'rename'=>true,
		'path'=>public_path('scripts'),
		'chunk_size'=>'1024kb',
	]
];