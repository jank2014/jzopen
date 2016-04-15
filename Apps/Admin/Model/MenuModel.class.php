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

class MenuModel extends Model{
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