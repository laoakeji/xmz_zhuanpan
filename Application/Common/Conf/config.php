<?php
return array(
		// 添加数据库配置信
	'SHOW_PAGE_TRACE' => false,
	'DB_TYPE' => 'mysql', // 数据库类型
	'DB_HOST' => '120.24.214.120', // 服务器地址
	'DB_NAME' => 'pg_xmz99', // 数据库名
	'DB_USER' => 'root', // 用户名
	'DB_PWD' => '64400c8e61', // 密码
	'DB_CHARSET' => 'utf8mb4',
	'DB_PORT' => 3306, // 端口
	'DB_PREFIX' => 'pg_', // 数据库表前缀缀
	'SESSION_OPTIONS' => array(
		'type' => 'db', //session采用数据库保存
		'expire' => 14400, //session过期时间，如果不设就是php.ini中设置的默认值
	),

	'appId' => 'wx7013c93ebe2eb4dc', //
	'appSecret' => '07ac056d1945493d9685e89a25b16ea1', //
	'token' => 'ioncpw1413441418', //
	'erweima_expire_time' => '2592000', //
);