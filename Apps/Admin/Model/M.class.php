<?php
namespace Admin\Model;
use Think\Model;

class ManagerModel extends Model{
	protected $_validate = array(
		array('username','require','用户名不能为空', 0,'unique',1),//新增验证
		array('password','require','密码不能为空',0,'regex',1),
		array('repassword','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
		array('email','require','邮箱不能为空',0,'regix',1),
		);
	protected $_auto = array(
		array('status','1'),
		array('c_time',NOW_TIME,self::MODEL_INSERT)
		);
}


 ?>