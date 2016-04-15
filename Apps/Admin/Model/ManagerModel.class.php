<?php
// +----------------------------------------------------------------------
// | JankzMaker [ Just Do It And Think It ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.jankz.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: jankz <jankz@jankz.com> <http://www.jankz.com>
// +----------------------------------------------------------------------
namespace Admin\Model;
use Think\Model;

class ManagerModel extends Model{
/**
 * [自动验证规则 来自thinkphp官方手册]
 * array(
     array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
     array(验证字段2,验证规则,错误提示,[验证条件,附加规则,验证时间]),
);

* [自动完成规则 来自thinkphp官方手册]
array(
     array(完成字段1,完成规则,[完成条件,附加规则]),
     array(完成字段2,完成规则,[完成条件,附加规则]),
     ......
);
 */
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
	protected $_link = array(
		'AuthGroup' => array(
		    'mapping_type'      =>  self::MANY_TO_MANY,
		    'class_name'        =>  'AuthGroup',
		    'mapping_name'      =>  'group',
		    'foreign_key'       =>  'uid',
		    'relation_foreign_key'  =>  'group_id',
		    'relation_table'    =>  'hsc_auth_group_access' //此处应显式定义中间表名称，且不能使用C函数读取表前缀
		    )
		);

}


 ?>