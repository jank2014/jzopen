<?php
namespace Admin\Model;
use Think\Model;

class MenuModel extends Model{
	// 自动验证 这里后台添加目录 有长度限制且不可为空
	protected $_validate= array(
		array('title','require','标题不能为空',self::MUST_VALIDATE,'regex',self::MODEL_BOTH),
		array('pid','require','父ID不能为空',self::MUST_VALIDATE,'regex',self::MODEL_BOTH),
		array('title','1,45','标题不能超过30字符',self::EXISTS_VALIDATE,'length',self::MODEL_BOTH),
		);
	// 自动完成
	protected $_auto =array(
		array('status','1'),
		array('create_time',NOW_TIME,self::MODEL_INSERT),
		array('update_time',NOW_TIME,self::MODEL_INSERT),
		);
}


 ?>