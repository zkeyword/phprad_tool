<?php
return array(
	//'配置项'=>'配置值'
	'URL_MODEL'          => '2', //URL模式
	'URL_CASE_INSENSITIVE' =>true, //地址不区分大小写
	
	'DB_TYPE' => 'mysql',
	'DB_HOST' => getenv("MYSQL_HOST"),
	'DB_NAME' => 'tool_phpqun',
	'DB_USER' => getenv("MYSQL_USER"),
	'DB_PWD' => getenv("MYSQL_PWD"),
	'DB_PORT' => '3306',
	'DB_PREFIX' => 'site_',

	'APP_GROUP_LIST' => 'home,admin', //项目分组设定
	'DEFAULT_GROUP'  => 'home', //默认分组

	'TMPL_PARSE_STRING'  =>array(
	    '__S__' => '/static', // 增加新的JS类库路径替换规则
	),
	//异常模版
	// 'TMPL_EXCEPTION_FILE' => APP_PATH.'/Tpl/Admin/Public/exception.html',
	'UPLOAD_DIR' => "./uplode/", //文件上传的目录
	'UPLOAD_URL' => "http://tool.card7.net/uplode/",  //文件存放目录访问地址
	'UPLOAD_HOST' => "http://tool.card7.net",  //后面不要加/

	'REDIS_HOST' => 'localhost', 
	'IM_HOST' => 'localhost', 

	'AES_KEY'=>'ddddd',
	'PROJECT_ID_PRE' => 'P',
);
?>