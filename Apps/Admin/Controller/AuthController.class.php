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

class AuthController extends CommonController{
	public function index(){
		$page = $_GET['page'];
		$table=array(
			'id'		=>'主键',
			'name'		=>'规则唯一标识',
			'title'		=>'中文名称',
			'type'		=>'类型',
			'status'	=>'状态',
			'condition'	=>'规则表达式',
			);
		$count = M('AuthRule')->count();
		$page_list = ceil($count/10);
		$info = M('AuthRule')->where(array('status'=>1))->page($page,10)->select();
		$make_table=makeTable($table);
		$jankzmaker = new \JankzMaker\Controller\Admin\MakerTable();
		$jankzmaker->setMetaTitle('权限规则列表')
				->setThead($make_table['thead'])
				->setTbodyList($make_table['list'])
				->setTbodyData($info)
				->addTopBtn('default')
				->setPage($page_list)
				->display();
	}

}

 ?>