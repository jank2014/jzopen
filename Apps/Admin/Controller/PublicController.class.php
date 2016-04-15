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

/**
* 后台入口
*/
class PublicController extends Controller
{
	/**
	 * [管理员登]
	 * @return [type] [description]
	 */
	public function login()
	{
		// var_dump(session('step'));die;
		if(!empty($_POST)){
			$user = M('User');
	        $username = trim(I('username'));
			$password = I('password');
			if(empty($username)){
				$this->error('请输入用户信息');
			}
			if(empty($password)){
				$this->error('请输入密码');
			}
	        if (preg_match("/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/", $username)) {
	            $map['email'] = array('eq', $username);     // 匹配邮箱登陆
	        } elseif (preg_match("/^1\d{10}$/", $username)) {
	            $map['mobile'] = array('eq', $username);    // 匹配手机号登陆
	        } else {
	            $map['username'] = array('eq', $username);  // 匹配用户名登陆
	        }
			$res = $user->where($map)->find();
			if($res){
				if(user_md5($password) == $res['password']){
					$id = $res['id'];
					if($id == 1){
						$manager_info = array(
							'username'=>$username,
							'manager_type'=>'超级管理员',
							'group_id'=>'1',
							'uid'=>'1'
							);
						session('rules','all');
						session('manager_info',$manager_info);//用户信息 写入session
						$this->success('超级管理员登陆成功',U('Admin/Index/index'));
					}else{
						//获取所有管理员
						$managers = M('Manager')->where(array('status'=>1))->select();

						foreach ($managers as $key => $value) {
							$manager_ids[] = $value['uid'];
						}
						if(in_array($id,$manager_ids)){
							//这里是管理员 非默认超级管理员认证
							$manager = M('Manager')->where(array('uid'=>$id))->find();//获取管理员的分组id
							$group_id = $manager['group_id'];
							$group = M('AuthGroup')->where(array('id'=>$group_id))->find();//获取权限分组
							$manager_info = array(
							'id' =>$id,
							'username'=>$username,
							'manager_type'=>$group['title'],
							'group_id' => $group['id'],
							);
							session('manager_info',$manager_info);
							$this->success($group['title'].'登陆成功!',U('Admin/Index/index'));
						}else{
							$this->error('该用户没有管理权限!');
						}
					}
				}else{
					$this->error('密码错误');
				}

			}else{
				$this->error('用户不存在');
			}
		}else{

			$this->display();
		}
	}
	/**
	 * [退出后台]
	 * @return [type] [description]
	 */
	public function loginout()
	{
		session('manager_info',null);
		session('rules',null);
		$this->success('退出成功',U('login'));
	}
	/**
	 * [生成验证码]
	 * @return [type] [description]
	 */
	public function verifyImg()
	{
		$conf = array(
            'length' => 5,
            'useNoise' => false,
            'useCurve' => false,
            'imageH' => 39,
            'imageW' => 160,
            'fontSize' => 18,
        );
        $verify = new \Think\Verify();
        $verify->entry();
	}
}



 ?>