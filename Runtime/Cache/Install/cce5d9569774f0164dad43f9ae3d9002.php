<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    
    <title>step1</title>

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
                <div class="column step-padding">

                    <h1>环境检测</h1>
                    <table class="ui very basic aligned table">
                        <h2>运行环境检查</h2>

                        <thead>
                            <tr>
                                <th>项目</th>
                                <th>所需配置</th>
                                <th>当前配置</th>
                                <th>检测结果</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php if(is_array($check_env)): $i = 0; $__LIST__ = $check_env;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
                                <td><?php echo ($item['title']); ?></td>
                                <td><?php echo ($item['limit']); ?></td>
                                <td><?php echo ($item['current']); ?></td>
                                <td><i class="<?php echo ($item['icon']); ?>"></i></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <?php if(isset($check_dirfile)): ?><table class="ui very basic aligned table">

                            <h2>目录、文件权限检查</h2>
                            <thead>
                                <tr>
                                    <th>目录/文件</th>
                                    <th>所需状态</th>
                                    <th>当前状态</th>
                                    <th>检测结果</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(is_array($check_dirfile)): $i = 0; $__LIST__ = $check_dirfile;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
                                    <td><?php echo ($item['path']); ?></td>
                                    <td><i class="fa fa-check text-success"></i> 可写</td>
                                    <td><?php echo ($item['title']); ?></td>
                                    <td><i class="<?php echo ($item['icon']); ?>"></i> </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table><?php endif; ?>
                    <table class="ui very basic aligned table">
                        <h2>函数依赖性检查</h2>
                        <thead>
                            <tr>
                                <th>函数名称</th>
                                <th>所需状态</th>
                                <th>当前状态</th>
                                <th>检测结果</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($check_func_and_ext)): $i = 0; $__LIST__ = $check_func_and_ext;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
                                <td><?php echo ($item['name']); ?></td>
                                <td>安装</td>
                                <td><?php echo ($item['title']); ?></td>
                                <td><i class="<?php echo ($item['icon']); ?>"></i> </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>

                <a class="ui tiny teal fluid button" href="<?php echo U('step3');?>">下一步</a>
                <a class="ui tiny fluid button " style="margin-top: 0.2em">上一步</a>
            </div>
        </div>
    </div>

    <script src="/jzopen/Public/libs/jquery/jquery-2.1.4.min.js"></script>
    <script src="/jzopen/Public/libs/semantic/v2.1.7/semantic.min.js"></script>
    
</body>

</html>