<?php
namespace Admin\Controller;
use Think\Controller;

class GroupController extends CommonController
{
	/**
	 * [权限 管理组列表]
	 * @return [type] [description]
	 */
	public function index()
	{
		$page = $_GET['page'];
		$table=array(
			'id'		=>'主键',
			'title'		=>'用户组中文名称',
			'icon'		=>'图标',
			'rules'		=>'用户组拥有权限id用,隔开',
			'status'	=>'状态',
			'sort'		=>'排序值',
			'update_time'=>'上次修改时间',
			);
		$count = M('AuthGroup')->count();
		$page_list = ceil($count/10);
		$info = M('AuthGroup')->where(array('status'=>1))->page($page,10)->select();
		$make_table=makeTable($table);
		$jankzmaker = new \JankzMaker\Controller\Admin\MakerTable();
		$jankzmaker->setMetaTitle('用户组管理')
				->setThead($make_table['thead'])
				->setTbodyList($make_table['list'])
				->setTbodyData($info)
				->addTopBtn('default')
				->addRightBtn('info')
				->addRightBtn('edit')
				->addRightBtn('forbid')
				->addRightBtn('resume')
				->addRightBtn('delete')
				->setPage($page_list)
				->display();

	}
	/**
	 * [添加管理组]
	 */
	public function add()
	{

		if(!empty($_POST)){
			$group = M('AuthGroup');
			$group->create();
			if($group->create()){
				$res = $group->add();
				if($res){
					$this->success('添加成功');
				}else{
					$this->error($info->getError);
				}
			}else{
				$this->error($group->getError());
			}
		}else{
			$jankzmaker = new \JankzMaker\Controller\Admin\MakerForm();
			$jankzmaker->setMetaTitle('添加用户组')
				->setCoulmn(1)
				->setUrl(U('Group/add'))
				->addField('title','text','用户组名')
				->addField('icon','text','图标')
				->addField('sort','text','排序值')
				->addField('rules','text','规则id')
				->display();
		}
	}
	/**
	 * [编辑管理组]
	 */
	public function edit()
	{
		$id = I('id','',intval);
		if(!empty($_POST)){
			$info = M('AuthGroup');
			$info->create();
			if($info->create()){
				$res = $info->save();
				if($res){
					$this->success('已编辑',U('Group/index'));
				}else{
					$this->error('编辑失败!');
				}
			}else{
				$this->error($info->getError());
			}
		}else{
			$form_data = M('AuthGroup')->find($id);
			$jankzmaker = new \JankzMaker\Controller\Admin\MakerForm();
			$jankzmaker->setMetaTitle('添加管理组')
				->setUrl(U('Group/edit',array('id'=>$id)))
				->addField('title','text','用户组名')
				->addField('icon','text','图标')
				->addField('sort','text','排序值')
				->addField('rules','text','规则id')
				->addFormData($form_data)
				->display();
		}
	}
	/**
	 * [删除管理组]
	 * @return [type] [description]
	 */
	public function delete()
	{
		$id = I('get.id');
		$status = I('get.status');
		$info = M('GroupAuth');
		$info = $info->delete($id);
		if($info){
			$this->success('删除成功',U('Group/index'));
		}else{
			$this->error('删除失败');
		}

	}
	/**
	 * [禁用管理组]
	 * @return [type] [description]
	 */
	public function forbid()
	{
		$id = I('get.id');
		$status = I('get.status');
		$info = M('GroupAuth');
		$_POST['id'] = $id;
		$_POST['status'] = $status;
		$info->create();
		$res = $info->save();
		if($res){
			$this->success('锁定成功',U('Group/index'));
		}else{
			$this->error('锁定失败');
		}

	}

	/**
	 * [启用]
	 * @return [type] [description]
	 */
	public function resume()
	{
		$id = I('get.id');
		$status = I('get.status');
		$info = M('GroupAuth');
		$_POST['id'] = $id;
		$_POST['status'] = $status;
		$info->create();
		$info = $info->save();
		if($res){
			$this->success('开启成功',U('Group/index'));
		}else{
			$this->error('开启失败');
		}

	}

}

 ?>