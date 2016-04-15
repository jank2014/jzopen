<?php
// +----------------------------------------------------------------------
// | JankzMaker [ Just Do It And Think It ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.jankz.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: jankz <jankz@jankz.com> <http://www.jankz.com>
// +----------------------------------------------------------------------
namespace User\Controller;
use Think\Controller;
use Think\Auth;
class CommonController extends Controller{
	function _initialize() {
		//检测是否登录
		if (!is_login()) {
			$this->redirect('Admin/Public/login');
		}

		//面包导航
		$url = MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME;
		$breadcrumb = getBreadcrumb($url);
		$this->assign('breadcrumb',$breadcrumb);


	}

}

 ?>