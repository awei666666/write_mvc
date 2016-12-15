<?php
$db_config=include_once 'db_config.php';
return array(
	//修改定界符
	'TMPL_L_DELIM'    =>    '<{',
	'TMPL_R_DELIM'    =>    '}>',
	'__MESSAGE__' => './Public/img/message/', //事件上传的路径
	'__DOMAIN__' => './Public/img/citystation/',//城市分站的logo

	//配置路径常量
	'TMPL_PARSE_STRING'  =>array(
			'__CSS__' => __ROOT__.'/Public/css',
			'__JS__' => __ROOT__.'/Public/js',
			'__IMG__' => __ROOT__.'/Public/img',
			'__UPLOADIFY__' => __ROOT__.'/Public/uploadify', //上传图片
			'__UWDITOR__' => __ROOT__.'/Public/ueditor', //编辑框
			'PROJECT_NAME'=>'awin后台管理系统',
			//页面编辑按钮快捷方式@韩威兵
			'__edit__'=>'btn btn-success btn-xs glyphicon glyphicon-pencil',
			'__delete__'=>'btn btn-danger btn-xs glyphicon glyphicon-trash',
			'__submit__'=>'btn btn-primary',
			'__other_img_url__' 		=> 'http://www.lytx.com/admin/member/manager/upload',


	),
	'DB_TYPE'   => $db_config['DB_TYPE'],
	'DB_HOST'   => $db_config['DB_HOST'],
	'DB_NAME'   => $db_config['DB_NAME'],
	'DB_USER'   => $db_config['DB_USER'],
	'DB_PWD'    => $db_config['DB_PWD'],
	'DB_PORT'   => $db_config['DB_PORT'],
	'DB_PREFIX' => $db_config['DB_PREFIX'],
);
