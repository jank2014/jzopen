<?php
namespace User\Controller;
use Think\Controller;

class GroupController extends CommonController{


	/**
	 * [用户组列表]
	 * @return [type] [description]
	 */
	public function index()
	{
		//预设表格
		$table = array(
			'id'		=>'Id',
			'title'		=>'用户组名称',
			'icon'		=>'图标',
			'sort'		=>'排序',
			'update_time'=>'上次修改时间'
			);
		$page = $_GET['page'];
		$group = M('UserGroup');
		$count = $group->count();
		$page_list = ceil($count /10 );
		$info = $group->where(array('status'=>1))->select();
		$make_table = makeTable($table);
		$jankzmaker = new \JankzMaker\Controller\Admin\MakerTable();
		$jankzmaker->setMetaTitle(用户组列表)
				->setTbodyData($info)
				->setThead($make_table['thead'])
				->setTbodyList($make_table['list'])
				->addRightBtn('info')
				->addRightBtn('edit')
				->addRightBtn('forbid')
				->addRightBtn('resume')
				->addRightBtn('delete')
				->addTopBtn('add,forbid,delete')
				->setPage($page_list)
				->display();

	}
	/**
	 * [新增用户组]
	 */
	public function add()
	{
		if(!empty($_POST)){
			$info = D('UserGroup');
			$info->create();
			if($info->create()){
				$res = $info->add();
				if($res){
					$this->success('添加成功',U('index'));
				}else{
					$this->error('添加失败',U('index'));
				}
			}else{
				$this->error($info->getError());
			}
		}else {
			$jankzmaker = new \JankzMaker\Controller\Admin\MakerForm();
			$jankzmaker->setMetaTitle('添加用户组')
			    ->setUrl(U('add'))
				->addField('title','text','用户组名称')
				->addField('icon','text','图标')
				->addField('sort','text','排序值')
				->display();
		}
	}
	/**
	 * [编辑用户组]
	 */
	public function edit()
	{
		//获取id
		$id = $_GET['id'];
		if(!empty($_POST)){
			$_POST['id'] = $_GET['id'];
			$info = D('Group');
			$info->create();
			if($info->create()){
				$res = $info->save();
				if($res){
					$this->success('编辑成功',U('index'));
				}else{
					$this->error('编辑失败',U('index'));
				}
			}else{
				$this->error($info->getError());
			}
		}else{
			//获取数据
			$form_data = M('Group')->find($id);
			$jankzmaker = new \JankzMaker\Controller\Admin\MakerForm();
			$jankzmaker->setMetaTitle('添加用户组')
				->setUrl(U('edit',array('id'=>$id)))
				->addField('title','text','用户组名称')
				->addField('icon','text','图标')
				->addField('sort','text','排序值')
				->addFormData($form_data)
				->display();
		}
	}
}



 ?>