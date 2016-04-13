<?php
namespace User\Model;
use Think\Model;


class UserModel extends Model{
	protected $tableName = 'user';
	protected $_validate = array(
        // 验证用户类型
        array('user_type', 'require', '请选择用户类型', self::MUST_VALIDATE, 'regex', self::MODEL_INSERT),
        //验证用户名
        array('nickname', 'require', '昵称不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_BOTH),
        // 验证用户名
        array('username', 'require', '请填写用户名', self::MUST_VALIDATE, 'regex', self::MODEL_INSERT),
        array('username', '3,32', '用户名长度为1-32个字符', self::MUST_VALIDATE, 'length', self::MODEL_INSERT),
        array('username', '', '用户名被占用', self::MUST_VALIDATE, 'unique', self::MODEL_INSERT),
        array('username', '/^(?!_)(?!\d)(?!.*?_$)[\w]+$/', '用户名只可含有数字、字母、下划线且不以下划线开头结尾，不以数字开头！', self::MUST_VALIDATE, 'regex', self::MODEL_INSERT),
        // 验证密码
        array('password', 'require', '请填写密码', self::MUST_VALIDATE, 'regex', self::MODEL_INSERT),
        array('password', '6,30', '密码长度为6-30位', self::MUST_VALIDATE, 'length', self::MODEL_INSERT),
        array('password', '/(?!^(\d+|[a-zA-Z]+|[~!@#$%^&*()_+{}:"<>?\-=[\];\',.\/]+)$)^[\w~!@#$%^&*()_+{}:"<>?\-=[\];\',.\/]+$/', '密码至少由数字、字符、特殊字符三种中的两种组成', self::MUST_VALIDATE, 'regex', self::MODEL_INSERT),
        array('repassword', 'password', '两次输入的密码不一致', self::EXISTS_VALIDATE, 'confirm', self::MODEL_INSERT),

        // 验证邮箱
        array('email', 'email', '邮箱格式不正确', self::EXISTS_VALIDATE, 'regex', self::MODEL_INSERT),
        array('email', '1,32', '邮箱长度为1-32个字符', self::EXISTS_VALIDATE, 'length', self::MODEL_INSERT),
        array('email', '', '邮箱被占用', self::EXISTS_VALIDATE, 'unique', self::MODEL_INSERT),

        // 验证手机号码
        array('mobile', '/^1\d{10}$/', '手机号码格式不正确', self::EXISTS_VALIDATE, 'regex', self::MODEL_INSERT),
        array('mobile', '', '手机号被占用', self::EXISTS_VALIDATE, 'unique', self::MODEL_INSERT),

        // 验证注册来源
        array('reg_type', 'require', '注册来源不能为空', self::MUST_VALIDATE, 'regex', self::MODEL_INSERT),
    );

    /**
     * 自动完成规则
     * @author jry <598821125@qq.com>
     */
    protected $_auto = array(
        array('reg_ip', 'get_client_ip', self::MODEL_INSERT, 'function', 1),
        array('password', 'user_md5', self::MODEL_BOTH, 'function'),
        array('create_time', 'time', self::MODEL_INSERT, 'function'),
        array('update_time', 'time', self::MODEL_BOTH, 'function'),
        array('status', '1', self::MODEL_INSERT),
    );

}



 ?>