<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    
    <title>step3</title>

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
                <a class="item">参数设置</a>
                <a class="item">开始安装</a>
                <a class="item">完成安装</a>
            </div>
        </div>
        <div class="colum steps">
            <h6 class="ui top attached inverted header">jankzMaker安装协议</h6>
            <div class="ui buttom attached segment">
            <h1>安装</h1>
            <div id="show-list" class="install-database"></div>
                <a class="ui tiny teal fluid button" href="complete.html">正在安装，请稍候...</a>

            </div>
            <h6 class="ui bottom attached header">版权所有 (c) 2014－2016楠哲科技有限公司 保留所有权利。</h6>
        </div>
    </div>

    <script src="/jzopen/Public/libs/jquery/jquery-2.1.4.min.js"></script>
    <script src="/jzopen/Public/libs/semantic/v2.1.7/semantic.min.js"></script>
    
    <script type="text/javascript">
        var list   = document.getElementById('show-list');
        function showmsg(msg, classname){
            var li = document.createElement('p');
            li.innerHTML = '<a>'+ msg + '<i class="'+ classname+'"></i></a>';
            list.appendChild(li);
            document.scrollTop += 30;
        }


    </script>


</body>

</html>