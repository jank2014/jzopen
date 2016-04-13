<?php
// +----------------------------------------------------------------------
// | JankzMaker
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://www.jankz.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: jankz <jankz@jankz.com>
// +----------------------------------------------------------------------

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');



// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',false);

// 定义应用目录
define('APP_PATH','./Apps/');

//定义Common目录
define('COMMON_PATH', './Common/');

//定义开发测试目录
define('MYTEST_PATH', './test/');

//定义RUNTIME_PATH
define('RUNTIME_PATH', './Runtime/');
//定义静态HTML缓存目录
define('HTML_PATH', RUNTIME_PATH.'Html/');

define('__UPLOADS__','./Uploads/');
//检测安装信息
if (is_file('./Conf/install.lock') === false ) {
    define('BIND_MODULE','Install');
}
// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';
