<?php
// +----------------------------------------------------------------------
// | JankzMaker [ Just Do It And Think It ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.jankz.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: jankz <jankz@jankz.com> <http://www.jankz.com>
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Think\Controller;
use Think\Auth;
class CommonController extends Controller{
	function _initialize() {
		//检测是否登录
		if (!is_login()) {
			$this->redirect('Admin/Public/login');
		}
		// var_dump(session('manager_info')['id']);die;

		//调用生成菜单函数
        $allmenu=getInto();
        $this->allmenu=$allmenu;
		//面包导航
		$url = MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME;
		// var_dump($url);die;
		$breadcrumb = getBreadcrumb($url);
		// var_dump($breadcrumb);die;
		$this->assign('breadcrumb',$breadcrumb);


		//登录后检测权限
		$auth_module = MODULE_NAME;
		$auth_controller = MODULE_NAME.'/'.CONTROLLER_NAME;
		$auth_action = MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME;
		$id = session('manager_info')['id'];
		$manager_type = session('manager_info')['managet_type'];
		$group_id = session('manager_info')['group_id'];
		// var_dump($auth_controller);die;
		//超级管理组不验证权限
		if($id == 1 || $group_id == 1){
			return true;
		}else{
			$auth=new Auth();
			//权限检测
			//第一步 检验是否有访问模块的权利
			if($auth_controller == 'Admin/Public'){
				return true;
			}else{
				// $module_auth_res = $auth->check($autu_module,$id);
				// if($module_auth_res){
				// 	//检测访问控制器权利
				// 	$controller_auth_res = $auth->check($auth_controller,$id);
				// 	if($auth_controller){
				// 		//检查方法权限
				// 		$action_auth_res = $auth->check($auth_action,$id);
				// 		if($action_auth_res){
				// 			return true;
				// 		}else{
				// 			$this->error('无访问地址权限');
				// 		}
				// 	}else{
				// 		$this->error('无访问此控制器权限');
				// 	}
				// }else{
				// 	$this->error('无访问此模块权限');
				// }
				$auth_action_res = $auth->check($auth_action,$id);
				// var_dump($id);
				// var_dump($auth_action_res);die;
				if($auth_action_res){
					return true;
				}else{
					$this->error('无访问权限');
				}
			}
		}

	}

}

 ?>