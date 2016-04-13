<?php
namespace Admin\Model;
use Think\Model;

/**
* 配置模型
*/
class ConfModel extends Model
{
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
	/**
	 * [自动验证]
	 * @var array
	 */
	protected $_validate = array(
		array('name','require','name不能为空',self::MUST_VALIDATE,'regex',self::MODEL_BOTH),
		array('type','require','type不能为空',self::MUST_VALIDATE,'regex',self::MODEL_BOTH),
		array('title','require','title不能为空',self::MUST_VALIDATE,'regex',self::MODEL_BOTH),
		);
	/**
	 * [自动完成]
	 * @var array
	 */
	protected $_auto = array(
		array('status',1),
		array('create_time','time',self::MODEL_INSERT,'function'),
		array('update_time','time',self::MODEL_BOTH,'function')
		);
}


 ?>