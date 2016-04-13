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

class AccessController extends CommonController{
		public function index(){
		$page = $_GET['page'];
		$config = array(
			'type'		=>'newtable');
		$table=array(
			'group_id'	=>'用户组ID',
			'uid'		=>'用户ID',
			);
		$count = M('AuthGroupAccess')->count();
		$page_list = ceil($count/10);
		$info = M('AuthRule')->where(array('status'=>1))->page($page,10)->select();
		$make_table=makeTable($table);
		$jankzmaker = new \Maker\Controller\JankzMaker();
		$jankzmaker->setMetaTitle('用户组明细')
				->addConfTpl($config)
				->setThead($make_table['thead'])
				->setTbodyList($make_table['list'])
				->setTbodyData($info)
				->addTopBtn('default')
				->setPage($page_list)
				->display();

	}

}

 ?>