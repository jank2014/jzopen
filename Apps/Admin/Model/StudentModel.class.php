<?php
namespace Admin\Model;
use Think\Model;

class StudentModel extends Model{
	// 自动验证 这里后台添加目录 有长度限制且不可为空
	protected $_validate= array(
		array('stu_name','require','学生姓名不能为空',self::MUST_VALIDATE,'regex',self::MODEL_BOTH),
		array('stu_number','require','学生学号不能为空',self::MUST_VALIDATE,'regex',self::MODEL_BOTH),
		array('parent_number','require','家长号不能为空',self::EXISTS_VALIDATE,'regex',self::MODEL_BOTH),
		);
	// 自动完成
	protected $_auto =array(
		array('status','1'),
		array('c_time',NOW_TIME,self::MODEL_INSERT),
		array('u_time',NOW_TIME,self::MODEL_INSERT),
		);
}


 ?>