<?php
namespace Admin\Controller;
use Think\Controller;

/**
* [系统配置]
*/
class ConfController extends CommonController
{
	public function index()
	{
		$table = array(
			'id'		=>'Id',
			'name'		=>'name',
			'type'		=>'type',
			'title'		=>'title',
			'class'		=>'class',
			'value'		=>'value',
			'conf'		=>'conf',
			// 'sort'		=>'排序值',
			'conf_group'=>'组',
			// 'status'	=>'状态',
			// 'update_time'=>'上次修改时间',
			);
		$page = $_GET['page'];
		$conf = M('Conf');
		$count = $conf->count();
		$page_list = ceil($count/10);
		$info = $conf->where(array('status'=>1))->page($page,10)->select();
		$make_table = makeTable($table);
		$jankzmaker = new \JankzMaker\Controller\Admin\MakerTable();
		$jankzmaker->setMetaTitle('配置列表')
			->setTbodyData($info)
			->setThead($make_table['thead'])
			->setTbodyList($make_table['list'])
			->addRightBtn('info')
			->addRightBtn('edit')
			->addRightBtn('resume')
			->addRightBtn('forbid')
			->addRightBtn('delete')
			->addTopBtn('add,forbid,delete')
			->setPage($page_list)
			->display();
	}
	/**
	 * [新增配置]
	 */
	public function add()
	{
		if(!empty($_POST)){
			$info = D('Conf');
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
				->addField('name','text','name')
				->addField('type','text','type')
				->addField('title','text','配置名称')
				->addField('value','text','配置内容')
				->addField('class','text','样式')
				->addField('conf_group','text','配置所属分组')
				->addField('conf','text','配置项')
				->addField('sort','text','排序值')
				->display();
		}
	}
	/**
	 * [编辑配置项]
	 * @return [type] [description]
	 */
	public function edit() {
		//获取id
		$id =I('id','',intval);
		$info = D('Conf');
		if(!empty($_POST)){
			$_POST['id'] = $_GET['id'];
			$info->create();
			if($info->create()){
				$res = $info->save();
				if($res){
					$this->success('已编辑',U('index'));
				}else{
					$this->error('编辑失败!',U('index'));
				}
			}else{
				$this->error($info->getError());
			}
		}else{
			$form_data = $info->find($id);
			$jankzmaker = new \JankzMaker\Controller\Admin\MakerForm();
			$jankzmaker->setMetaTitle('编辑')
				->setUrl(U('edit',array('id'=>$id)))
				->addField('name','text','name')
				->addField('type','text','type')
				->addField('title','text','配置名称')
				->addField('value','text','配置值')
				->addField('class','text','样式')
				->addField('conf','text','配置项')
				->addField('sort','text','排序值')
				->addFormData($form_data)
				->display();
			}

	}
	 /**
	  * [删除]
	  * @return [type] [description]
	  */
	public function delete(){
		$id = I('get.id');
		$status = I('get.status');
		$info = M('Conf');
		$res = $info->delete($id);
		if($res){
			$this->success('删除成功',U('Menu/menulist'));
		}else{
			$this->error('删除失败');
		}

	}
	/**
	 * [禁用]
	 * @return [type] [description]
	 */
	public function forbid(){
		$id = I('get.id');
		$status = I('get.status');
		$info = M('Conf');
		$_POST['id'] = $id;
		$_POST['status'] = $status;
		$info>create();
		$info = $info->save();
		if($info){
			$this->success('锁定成功',U('Menu/menulist'));
		}else{
			$this->error('锁定失败');
		}

	}

	/**
	 * [启用]
	 * @return [type] [description]
	 */
	public function resume(){
		$id = I('get.id');
		$status = I('get.status');
		$info = M('Conf');
		$_POST['id'] = $id;
		$_POST['status'] = $status;
		$info->create();
		$res = $info->save();
		if($info){
			$this->success('开启成功',U('Menu/menulist'));
		}else{
			$this->error('开启失败');
		}

	}

}


 ?>