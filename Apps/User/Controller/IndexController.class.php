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

class IndexController extends CommonController{
	/**
	 * [用户列表]
	 * @return [type] [description]
	 */
	public function index(){
		$table=array(
    		'id'=>'id',
    		'user_type'=>'用户类型',
    		'username'=>'用户名',
    		'email'=>'邮箱',
    		'mobile'=>'手机',
    		'status'=>'状态',
    		'create_time'=>'创建时间',
     		);
		$page =$_GET['page'];
		$user = M('User');

		$count = $user->count();
		$page_list = ceil($count/10);
		$info = $user->where(array('status'=>'1'))->page($page,10)->select();
		$make_table=makeTable($table);
		//调用jankzmaker 生成页面
 		$jankzmaker = new \JankzMaker\Controller\Admin\MakerTable();
 		$jankzmaker->setMetaTitle('用户列表')
				->setTbodyData($info)//总数据
				->setTbodyList($make_table['list'])//循环列表 这里根据table设定生成
				->setThead($make_table['thead'])//循环表头 这里根据table设定生成
				->addRightBtn('info')
				->addRightBtn('edit')
				->addRightBtn('forbid')
				->addRightBtn('resume')
				->addRightBtn('delete')
				->addTopBtn('add,forbid')
				->addTopBtn('delete')
				->setPage($page_list)
				->display();

	}

	public function add(){
		$id = $_GET['id'];
		if(!empty($_POST)){
			$group =M('User');
			$_POST['password'] = user_md5($_POST['password']);
			$group->create();
			$res = $group->add();
			if($res){
				$this->success('添加成功',U('User/Index/index'));
			}else{
				$this->error($menu->getError());
			}
		}else{
			$info = getList();//调用无限级分类函数
			$jankzmaker = new \JankzMaker\Controller\Admin\MakerForm();
			$jankzmaker->setMetaTitle('后台管理')
					->setUrl(U('User/Index/add'))
					->addField('nickname','text','用户昵称')
					->addField('username','text','用户名')
					->addField('password','text','密码')
					->addField('email','text','邮箱')
					->addField('mobile','text','手机')
					->addField('reg_type','text','注册方式')
					->addField('avatar','picture','头像')
					->display();
		}
	}

}
