<?php
// +----------------------------------------------------------------------
// | JankzMaker [ Just Do It And Think It ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.jankz.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: jankz <jankz@jankz.com> <http://www.jankz.com>
// +----------------------------------------------------------------------

/**
 *  Jzopen数据库连接配置文件
 */
    return array(
        //数据库配置
        'DB_TYPE'   => 'mysql',       // 数据库类型
        'DB_HOST'   => '127.0.0.1',       // 服务器地址
        'DB_NAME'   => 'Jzopen_text3',       // 数据库名
        'DB_USER'   => 'root',       // 用户名
        'DB_PWD'    => 'apks2000',        // 密码
        'DB_PORT'   => '3306',            // 端口
        'DB_PREFIX' => 'jz_',     // 数据库表前缀

        //分页配置 默认显示10条数据分页
        'JZ_TABLE_PAGE'    =>10,


        //JankzMaker配置

        'JZ_FORM_OFFSET'    =>'two',        //form offset
        'JZ_FORM_WIDTH'     =>'ten',        //form width
        'JZ_TOPBTN'         =>'on',         //table topbtn 默认开启
        'JZ_RIGHTBTN_'      =>'on',         //tabel rightbtn 默认开启
        //系统状态
        'WEBSITE_STATUS'    =>'on',         //网站默认开启

    );

