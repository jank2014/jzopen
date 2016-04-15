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
class IndexController extends CommonController {
    public function index(){
        //调用生成菜单函数
        $info=getInto();
        $this->info=$info;
        $this->display();
    }
    public function removeRuntime() {
        $file = new \Maker\Util\File();
        $info = $file->del_dir(MYTEST_PATH);
        if ($info) {
            $this->success("缓存清理成功");
        } else {
            $this->error("缓存清理失败");
        }

    }
    public function main(){
        $this->display();
    }
    public function test(){
        $conf1 = array(
            array('email','inline-text','邮箱',''),
            array('phone','inline-text','手机',''),
            // array('qq','inline-text','QQ',''),

            );
        $conf2 = array(
            array('email','inline-text','邮箱',''),
            array('phone','inline-text','手机',''),
            // array('qq','inline-text','QQ',''),
            // array('icon','inline-text','ICON',''),

            );
        $labelconf = array(
            array('name'=>'','type'=>'label','title'=>'1',array('label'=>'red empty circular')),
            array('name'=>'','type'=>'label','title'=>'2',array('label'=>'gray empty circular')),
            );
        $radioconf = array(
            array('name'=>'like','type'=>'','title'=>'运动'),
            array('name'=>'like','type'=>'','title'=>'电视'),
            );
        $jankzmaker = new \JankzMaker\Controller\admin\makerForm();
        $jankzmaker->setMetaTitle('测试')
        ->addField('email','text','邮箱','')
        ->addField('passwoed','text','密码','')
        ->addFields('one','fields',$conf1,'inline equal width')
        ->addFields('two','fields',$conf2,'inline equal width')
        ->addField('is_agree','checkbox','同意条款','inline required')
        ->addField('','divider','','')
        ->addField('','icon-divider','And',array('divider'=>'horizontal','icon'=>'teal home'))
        ->addField('','labels','','',$labelconf)
        ->addField('','label','12')
        ->addField('context','textarea','说点什么吧')
        ->addField('like','radio','你的爱好','',$radioconf)
        ->addField('like','toggle','同意开启')
        ->addField('like','slider','关闭系统')
        ->addField('content','wangEditor','说点什么吧')
        ->display();
    }
    public function test2(){
        if(!empty($_POST)){
            $file = 
            $test = M('Test');
            $test->create();
            $res = $test->add();
            if($res){
                $this->success('yes');
            }else{
                $this->error('no');
            }


        }else{
            $this->display();
        }
    }
    public function test3(){
        $info = M('Test');
        $info = $info->where(array('id'=>2))->find();
        if($info){

        $this->assign('info',$info);
        $this->display();
        }else{
            $this->error('bad!');
        }
    }
    public function test6()
    {
        $this->display();
    }
      public function test7()
    {
        $this->display();
    }
    public function upload() {
    $upload = new \Think\Upload();// 实例化上传类
    $upload->maxSize   =     3145728 ;// 设置附件上传大小
    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
    $upload->rootPath  =      './Uploads/'; // 设置附件上传根目录
    // 上传单个文件
    $info   =   $upload->upload();
    if(!$info) {// 上传错误提示错误信息
        $this->error($upload->getError());
    }else{// 上传成功 获取上传文件信息
         foreach($info as $file){
            $url = 'http://localhost/jz/Uploads/'.$file['savepath'].$file['savename'];
            //预留接口 ************
            //在这里可以讲图片地址写入数据库 或者对图片进行操作 例如生成缩略图
            //这里返回每一次的URL pulpload 规则 参见 编辑器js



              $this->ajaxReturn($url,'EVAL');
            }
        }
    }


}