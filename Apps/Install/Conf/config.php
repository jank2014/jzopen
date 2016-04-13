<?php
// +----------------------------------------------------------------------
// | JankzMaker [ Just Do It And Think It ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.jankz.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: jankz <jankz@jankz.com> <http://www.jankz.com>
// +----------------------------------------------------------------------
/**
 * 安装程序配置文件
 */
return array(
    //产品配置
    'INSTALL_PRODUCT_NAME'   => 'Jzopen', //产品名称
    'INSTALL_WEBSITE_DOMAIN' => 'http://www.Jzopen.com', //官方网址
    'INSTALL_COMPANY_NAME'   => '深圳楠哲科技有限公司', //公司名称
    'ORIGINAL_TABLE_PREFIX'  => 'jz_', //默认表前缀

    //前缀设置避免冲突
    'DATA_CACHE_PREFIX' => ENV_PRE.MODULE_NAME.'_', //缓存前缀
    'SESSION_PREFIX'    => ENV_PRE.MODULE_NAME.'_', //Session前缀
    'COOKIE_PREFIX'     => ENV_PRE.MODULE_NAME.'_', //Cookie前缀

    //是否开启模板编译缓存,设为false则每次都会重新编译
    'TMPL_CACHE_ON' => false,

    // 默认模块
    // 'DEFAULT_MODULE'     => 'Install',
);
