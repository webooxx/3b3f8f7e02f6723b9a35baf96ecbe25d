<?php

$host_online = array(
    'online.host.com',
);


if (in_array($_SERVER['HTTP_HOST'], $host_online) ) {
    define('ENV', 'online');
}else {
    define('ENV', 'develop');
}

/**
 * 默认的项目配置
 *
 */
$config_default = array(

    #    数据库设置
    'DB_PREFIX'   => 'sp_',               #    数据库表前缀
    'DB_HOST'     => '127.0.0.1',
    'DB_PORT'     => '3306',
    'DB_NAME'     => 'spinach',
    'DB_USERNAME' => 'root',
    'DB_PASSWORD' => '',
    'DB_CHART'    => 'UTF8',

    #    模板默认设置
    'TPL_THEME'   => '.',

    // 调试模式
    'DEBUG'            => true,
);

/**
 * 线上的项目配置
 *
 */
 $config_plug = array();
if (ENV === 'online') {
    $config_plug = array(
      'DB_PREFIX'   => 'sp_',               #    数据库表前缀
      'DB_HOST'     => '127.0.0.1',
      'DB_PORT'     => '3306',
      'DB_NAME'     => 'spinach',
      'DB_USERNAME' => 'root',
      'DB_PASSWORD' => '',
    );
}

return array_merge($config_default, $config_plug);
