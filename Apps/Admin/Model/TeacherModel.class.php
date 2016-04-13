<?php
namespace Admin\Model;
use Think\Model;

class TeacherModel extends Model{
	// 自动验证 这里后台添加目录 有长度限制且不可为空
	protected $_validate= array(
		array('name','require','老师姓名不能为空',self::MUST_VALIDATE,'regex',self::MODEL_BOTH),
		array('subject','require','科目不能为空',self::MUST_VALIDATE,'regex',self::MODEL_BOTH),
		array('grade','require','年级不能为空',self::EXISTS_VALIDATE,'regex',self::MODEL_BOTH),
		// array('phone','require','联系不能为空',self::EXISTS_VALIDATE,'regex',self::MODEL_BOTH),
		// array('email','require','邮箱不能为空',self::EXISTS_VALIDATE,'regex',self::MODEL_BOTH),
		);
	// 自动完成
	protected $_auto =array(
		array('status','1'),
		array('isinorder','1'),
		array('c_time',NOW_TIME,self::MODEL_INSERT),
		array('u_time',NOW_TIME,self::MODEL_INSERT),
		);
}


 ?>