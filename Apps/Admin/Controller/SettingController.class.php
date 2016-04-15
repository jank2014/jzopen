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
* 系统设置控制器
*/
class SettingController extends CommonController
{
	/**
	 * [系统设置控制器]
	 * @return [type] [description]
	 */
	public function index()
	{
		//获取id
		$id =I('id','',intval);
		$info = M('Conf');
		$db_fields = $info->where(array('status'=>1,'conf_group'=>'system'))->select();
		$jankzmaker = new \JankzMaker\Controller\Admin\MakerForm();
		$jankzmaker->setMetaTitle('系统配置')
			->setUrl(U('settingsave'))
			->setDbFields($db_fields)
			->display();
	}
	/**
	 * [保存系统设置]
	 * @return [type] [description]
	 */
	public function settingsave()
	{
		$config = I('post.');
		if($config &&is_array($config)){
			$conf = D('Conf');
			foreach ($config as $key => $value) {
				$map['name'] = $key;
				if(is_array($value)){
					$value = implode(',',$value);
				}
				$conf->where($map)->setField('value',$value);
			}
		}
		$this->success('保存成功！',U('index'));

	}
}



 ?>