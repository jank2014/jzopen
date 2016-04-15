<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    
    <title>complete</title>

    <link rel="stylesheet" href="/jzopen/Public/libs/semantic/v2.1.7/semantic.css">
    <link rel="stylesheet" href="/jzopen/Public/install/install.css"></head>
<body>

    <div class="ui fixed secondary menu">
        <div class="header item">JankzMaker</div>
        <div class="right menu">
            <a href="#" class="item">官网</a>
            <a class="item">授权</a>
            <a class="item"></a>
        </div>
    </div>
    
    <div class="ui main text container">
        <div class="column">
            <div class="ui secondary pointing menu">
                <div class="active item">安装协议</div>
                <a class="active item">环境检测</a>
                <a class="active item">参数设置</a>
                <a class="active item">开始安装</a>
                <a class="active item">完成安装</a>
            </div>
        </div>
        <div class="colum steps">
            <h6 class="ui top attached inverted header">jankzMaker安装协议</h6>
            <div class="ui buttom attached segment">
                <h2 class="ui center aligned icon header"><i class="circular teal checkmark icon"></i> 安装完成! </h2>

                 <a class="ui tiny teal fluid button" href="<?php echo U('Home/Index/index');?>">打开前台</a>
<a class="ui tiny fluid button " style="margin-top: 0.2em" href="<?php echo U('Admin/Index/index');?>">进入后台</a>

            </div>
            <h6 class="ui bottom attached header">版权所有 (c) 2014－2016楠哲科技有限公司 保留所有权利。</h6>
        </div>
    </div>

    <script src="/jzopen/Public/libs/jquery/jquery-2.1.4.min.js"></script>
    <script src="/jzopen/Public/libs/semantic/v2.1.7/semantic.min.js"></script>
    
</body>

</html>