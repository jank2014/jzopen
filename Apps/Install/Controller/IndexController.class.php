<?php
// +----------------------------------------------------------------------
// | JankzMaker [ Just Do It And Think It ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.jankz.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: jankz <jankz@jankz.com> <http://www.jankz.com>
// +----------------------------------------------------------------------
namespace Install\Controller;
use Think\Controller;
use Think\Db;
use Think\Storage;

/**
 * 安装控制器
 */
class IndexController extends Controller{
    // 初始化方法
    protected function _initialize() {
        $no_verify = array('index', 'step1', 'complete');
        if (in_array(ACTION_NAME, $no_verify)) {
            return true;
        }
        if (Storage::has('./Conf/install.lock')) {
            $this->error('已经成功安装了本系统，请不要重复安装!', U('Home/Index/index'));
        }
    }
    // 安装首页
    public function index() {
        $this->redirect('step1');
    }

    // 安装第一步，同意安装协议
    public function step1() {
        session('step', '1');
        session('error', false);
        $this->assign('meta_title', "step1");
        $this->display();
    }

    // 安装第二步，检测运行所需的环境设置
    public function step2() {
        if (IS_AJAX) {
            if (session('error')) {
                $this->error('环境检测没有通过，请调整环境后重试！');
            } else {
                $this->success('恭喜您环境检测通过', U('step3'));
            }
        } else {
            if (session('step') !== '1') {
                $this->error("请按顺序安装", U('step1'));
            } else {
                session('step', '2');
                session('error', false);

                //环境检测
                $this->assign('check_env', check_env());

                //目录文件读写检测
                if (IS_WRITE) {
                    $this->assign('check_dirfile', check_dirfile());
                }

                //函数及扩展库检测
                $this->assign('check_func_and_ext', check_func_and_ext());

                $this->assign('meta_title', "step2");
                $this->display();
            }
        }
    }

    // 安装第三步，创建数据库
    public function step3($db = null) {
        if (IS_POST) {
                       // 检测管理员账号
             if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])){
                $this->error('请填写完整管理员信息');
            } else if($_POST['password'] != $_POST['repassword']){
                $this->error('确认密码和密码不一致');
            } else {
                //缓存管理员信息
               $info = array();
               $info['username'] = $_POST['username'];
               $info['password'] = $_POST['password'];
               $info['email'] = $_POST['email'];
            session('admin_info', $info);
            }
            //检测数据库配置
             if (!is_array($db) || empty($db['DB_TYPE'])
                 || empty($db['DB_HOST']) || empty($db['DB_NAME'])
                 || empty($db['DB_USER']) || empty($db['DB_PREFIX'])){
                 $this->error('请填写完整的数据库配置');
             } else {
                //缓存数据库配置
                session('db_config', $db);

                //创建数据库连接
                $db_name = $db['DB_NAME'];
                unset($db['DB_NAME']); //防止不存在的数据库导致连接数据库失败
                $db_instance = Db::getInstance($db);

                //检测数据库连接
                $result1 = $db_instance->execute('select version()');
                if (!$result1) {
                    $this->error('数据库连接失败，请检查数据库配置！');
                }

                //用户选择不覆盖情况下检测是否已存在数据库
                if (I('post.cover') === '0') {
                    //检测是否已存在数据库
                    $result2 = $db_instance->execute('SELECT * FROM information_schema.schemata WHERE schema_name="'.$db_name.'"');
                    if ($result2) {
                        $this->error('该数据库已存在，请更换名称！如需覆盖，请选中覆盖按钮！');
                    }
                }

                //创建数据库
                $sql = "CREATE DATABASE IF NOT EXISTS `{$db_name}` DEFAULT CHARACTER SET utf8";
                $db_instance->execute($sql) || $this->error($db_instance->getError());
            }

            //跳转到数据库安装页面
            $this->success('参数正确开始安装', U('step4'));
        } else {
            if (session('step') !== '2') {
                $this->error("请按顺序安装", U('step2'));
            } else {
                session('step', '3');
                session('error', false);
                $this->assign('meta_title', "step3");
                $this->display();
            }
        }
    }

    // 安装第四步，安装数据表，创建配置文件
    public function step4() {
        if (session('step') !== '3') {
            $this->error('请按顺序安装', U('step3'));
        }
        session('step', '4');
        session('error', false);
        $this->assign('meta_title', "step4");
        $this->display();

        //连接数据库
        $db_config = session('db_config');
        $db_instance = Db::getInstance($db_config);

        //创建数据表
        create_tables($db_instance, $db_config['DB_PREFIX']);

        //创建配置文件
        $conf = write_config($db_config, $auth);

        $admin_info = session('admin_info');
        $username = $admin_info["username"];
        $password = user_md5($admin_info["password"]);
        $email = $admin_info["email"];
        show_msg('开始创建管理员');
        $sql = <<<SQL
        UPDATE `{$db_config["DB_PREFIX"]}user` SET `username`='{$username}' WHERE `id` = 1;
        UPDATE `{$db_config["DB_PREFIX"]}user` SET `password`='{$password}' WHERE `id` = 1;
        UPDATE `{$db_config["DB_PREFIX"]}user` SET `email`='{$email}' WHERE `id` = 1;
SQL;

        $result = $db_instance->execute($sql);
        if (!$result) {
            $this->error('添加失败');
        }
        show_msg('管理员创建成功!');
        if (session('error')) {
            $this->error('安装出错', 'index');
        } else {
            $this->redirect('complete');
        }
    }

    // 安装完成
    public function complete() {
        if (session('step') !== '4') {
            $this->error('请正确安装系统', U('step1'));
        }

        //写入安装锁定文件(只能在最后一步写入锁定文件，因为锁定文件写入后安装模块将无法访问)
        Storage::put('./Conf/install.lock', 'Jzopen Installed lock');

        session('step', null);
        session('error', null);
        session('db_config', null);
        $this->assign('meta_title', "完成");
        $this->display();
    }
}
