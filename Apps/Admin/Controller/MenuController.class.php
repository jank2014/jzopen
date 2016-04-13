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

class MenuController extends CommonController{
	public function index(){
			$table=array(
    		'id'=>'id',
    		'pid'=>'父ID',
    		'title'=>'名称',
    		'name'=>'验证规则',
    		'sort'=>'排序值',
    		'url'=>'链接地址',
    		'icon'=>'图表',
    		'status'=>'状态',
    		'update_time'=>'上次修改时间',
    		);
		$page =$_GET['page'];
		$system  = M('Menu');
		$count = $system->count();
		$jz_page = (C('JZ_TABLE_PAGE'));
		$page_list = ceil($count/ $jz_page);
		$info = $system->page($page,$jz_page)->select();

		//调用表格制作函数 返回make_table 用来拆分$tbale 的key 和 value
		$make_table=makeTable($table);
		//调用jankzmaker 生成页面
 		$jankzmaker = new \JankzMaker\Controller\Admin\MakerTable();
 		$jankzmaker->setMetaTitle('菜单列表')
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

	/**
	 * [添加菜单]
	 */
	public function add()
	{
		$id = $_GET['id'];
		if(!empty($_POST)){
			$info =D('Menu');
			$info->create();
			if($info->create()){
				$res = $info->add();
				if($res){
					$this->success('添加成功',U('Admin/Menu/index'));
				}else{
					$this->error('添加失败!',U('Admin/Menu/index'));
				}
			}else{
				$this->error($info->getError());
			}
		}else{
			$info = getList();//调用无限级分类函数
			$jankzmaker = new \JankzMaker\Controller\Admin\MakerForm();
			$jankzmaker->setMetaTitle('后台管理')
					->setUrl(U('Admin/Menu/add'))
					->addField('title','text','菜单名称')
					->addField('sort','text','排序值')
					->addField('name','text','权限规则标示')
					->addField('url','text','链接地址')
					->addField('icon','text','图标')
					->addField('condition','text','规则表达式，为空表示存在就验证，不为空表示按照条件验证')
					->addField('pid','select','父ID','',array('info'=>$info))
					->display();
		}
	}

	/**
	 * [编辑]
	 * @return [type] [description]
	 */
	public function edit()
	{
		$id =I('id','',intval);
		if(!empty($_POST)){
			$_POST['id'] = $_GET['id'];
			$info = M('Menu');
			$info->create();
			if($info->create()){
				$res = $info->save();
				if($res){
					$this->success('已编辑',U('Menu/index'));
				}else{
					$this->error('编辑失败!');
				}
			}else{
				$this->error($info->getError());
			}
		}else{
			$form_data = M('Menu')->find($id);
			$info = getList();//调用无限级分类函数
			$jankzmaker = new \JankzMaker\Controller\Admin\MakerForm();
			$jankzmaker->setMetaTitle('编辑')
				->setUrl(U('Admin/Menu/edit',array('id'=>$id)))
				->addField('title','text','菜单名称')
				->addField('sort','text','排序值')
				->addField('name','text','权限规则标示')
				->addField('url','text','链接地址')
				->addField('icon','text','图标')
				->addField('condition','text','规则表达式，为空表示存在就验证，不为空表示按照条件验证')
				->addField('pid','select','父ID','',array('info'=>$info,'selected'=>$form_data['pid']))
				->addFormData($form_data)
				->display();
			}

	}
	/**
	 * [删除]
	 * @return [type] [description]
	 */
	public function delete()
	{
		$id = I('get.id');
		$status = I('get.status');
		$info = M('Menu');
		$info = $info->delete($id);
		if($info){
			$this->success('删除成功',U('Menu/index'));
		}else{
			$this->error('删除失败');
		}

	}
	/**
	 * [禁用]
	 * @return [type] [description]
	 */
	public function forbid()
		{
		$id = I('get.id');
		$status = I('get.status');
		$info = M('Menu');
		$_POST['id'] = $id;
		$_POST['status'] = $status;
		$info->create();
		$res = $info->save();
		if($res){
			$this->success('锁定成功',U('Menu/index'));
		}else{
			$this->error('锁定失败');
		}

	}

	/**
	 * [开启]
	 * @return [type] [description]
	 */
	public function resume(){
		$id = I('get.id');
		$status = I('get.status');
		$info = M('Menu');
		$_POST['id'] = $id;
		$_POST['status'] = $status;
		$info->create();
		$res = $info->save();
		if($res){
			$this->success('开启成功',U('Menu/index'));
		}else{
			$this->error('开启失败');
		}

	}



}
 ?>