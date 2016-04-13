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

class ManagerController extends CommonController{
	/**
	 * [管理员列表]
	 * @return [type] [description]
	 */
	public function index(){
		$page = $_GET['page'];
		$table=array(
			'id'				=>'主键id',
			'uid'				=>'管理员id',
			'group_id'			=>'管理员用户组id',
			'status'			=>'状态',
			'create_time'		=>'创建时间',
			'update_time'		=>'最后修改时间',
			);
		$count = M('Manager')->count();
		$page_list = ceil($count/10);
		$info = M('Manager')->where(array('status'=>1))->page($page,10)->select();
		$make_table=makeTable($table);
		$jankzmaker = new \JankzMaker\Controller\Admin\MakerTable();
		$jankzmaker->setMetaTitle('管理员列表')
	        ->setTbodyData($info)
			->setThead($make_table['thead'])
			->setTbodyList($make_table['list'])
			->addTopBtn('default')
			->addRightBtn('info')
			->addRightBtn('edit')
			->addRightBtn('resume')
			->addRightBtn('forbid')
			->addRightBtn('delete')
			->setPage($page_list)
			->display();

	}
	/**
	 * [新增]
	 */
	public function add(){
		if(!empty($_POST)){
			$info = D('Manager');
			$info->create();
			$info=$info->add();
			if($info){
				$this->success('添加成功');
			}else{
				$this->error($this->getError);
			}
		}else{
			$info = M('AuthGroup')->where(array('status'=>1))->select();
			$jankzmaker = new \JankzMaker\Controller\Admin\MakerForm();
			$jankzmaker->setMetaTitle('添加管理员')
				->setUrl(U('Manager/add'))
				->addField('uid','text','用户id')
				->addField('group_id','select','用户组','',array('info'=>$info))
				->display();
		}
	}
	/**
	 * [编辑]
	 * @return [type] [description]
	 */
	public function edit(){
		$id = I('id','',intval);
		if(!empty($_POST)){
			$_POST['id'] = $_GET['id'];
			$info = M('Manager');
			$info->create();
			if($info->create()){
				$res = $info->save();
				if($res){
					$this->success('已编辑',U('Manager/index'));
				}else{
					$this->error('编辑失败!');
				}
			}else{
				$this->error($info->getError());
			}
		}else{
			$info = M('AuthGroup')->where(array('status'=>1))->select();
			$form_data = M('Manager')->find($id);
			$jankzmaker = new \JankzMaker\Controller\Admin\MakerForm();
			$jankzmaker->setMetaTitle('添加管理员')
				->setUrl(U('Manager/edit',array('id'=>$id)))
				->addField('uid','text','用户id')
				->addField('group_id','select','用户组','',array('info'=>$info,'selected'=>$form_data['id']))
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
		$info = M('Manager');
		$info = $info->delete($id);
		if($info){
			$this->success('删除成功',U('Manager/index'));
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
		$info = M('Manager');
		$_POST['id'] = $id;
		$_POST['status'] = $status;
		$info->create();
		$res = $info->save();
		if($res){
			$this->success('锁定成功',U('Manager/index'));
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
		$info = M('Manager');
		$_POST['id'] = $id;
		$_POST['status'] = $status;
		$info->create();
		$res = $info->save();
		if($res){
			$this->success('开启成功',U('Manager/index'));
		}else{
			$this->error('开启失败');
		}

	}


}


 ?>