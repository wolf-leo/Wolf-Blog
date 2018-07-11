<?php

// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// [ 应用入口文件 ]

namespace think;

/*
 *  INSTALL_SQL 是否默认自动安装数据库 
 *  TRUE 默认安装 
 *  FALSE 取消默认安装【需要自行安装，详情阅读 必读——博客源码说明.md】
 */
//------------------------------项目正式上线后 请删除以下自动安装数据库的相关代码
define('INSTALL_SQL', TRUE);
if (INSTALL_SQL) {
    $lock_file = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'extend' . DIRECTORY_SEPARATOR . 'installsql.lock';
    if (!file_exists($lock_file)) {
        header('Location:/installsql.php');
        exit;
    }
}
//------------------------------项目正式上线后 请删除以上自动安装数据库的相关代码
// 加载基础文件
require __DIR__ . '/../thinkphp/base.php';

//bind('xxxx')  设置绑定index 
Container::get('app')->run()->send();
