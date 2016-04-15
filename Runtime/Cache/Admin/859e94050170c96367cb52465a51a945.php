<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Jzopen--超级后台</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/jzopen/Public/libs/semantic/v2.1.7/components/site.css">
    <link rel="stylesheet" href="/jzopen/Public/libs/semantic/v2.1.7/components/reset.css">
    <link rel="stylesheet" href="/jzopen/Public/libs/fontawesome/v4.5/css/font-awesome.css">
    <link rel="stylesheet" href="/jzopen/Public/admin/css/lte.css">
    <link rel="stylesheet" href="/jzopen/Public/libs/semantic/v2.1.7/components/reset.css">
    <link rel="stylesheet" href="/jzopen/Public/libs/semantic/v2.1.7/components/site.css">
    <link rel="stylesheet" href="/jzopen/Public/libs/semantic/v2.1.7/components/divider.css">
    <link rel="stylesheet" href="/jzopen/Public/libs/semantic/v2.1.7/components/form.css">
    <link rel="stylesheet" href="/jzopen/Public/libs/semantic/v2.1.7/components/input.css">
    <link rel="stylesheet" href="/jzopen/Public/libs/semantic/v2.1.7/components/button.css">
    <link rel="stylesheet" href="/jzopen/Public/libs/semantic/v2.1.7/components/dropdown.css">
    <link rel="stylesheet" href="/jzopen/Public/libs/semantic/v2.1.7/components/label.css">
    <link rel="stylesheet" href="/jzopen/Public/libs/semantic/v2.1.7/components/checkbox.css">
    <link rel="stylesheet" href="/jzopen/Public/libs/semantic/v2.1.7/components/accordion.css">
    <link rel="stylesheet" href="/jzopen/Public/libs/semantic/v2.1.7/components/transition.css">
    <link rel="stylesheet" href="/jzopen/Public/libs/semantic/v2.1.7/components/table.css">
    <link rel="stylesheet" href="/jzopen/Public/libs/semantic/v2.1.7/components/search.css">
    <link rel="stylesheet" href="/jzopen/Public/libs/semantic/v2.1.7/components/grid.css">



    <link rel="stylesheet" href="/jzopen/Public/libs/laypage/v1.3/skin/laypage.css">
    <link rel="stylesheet" href="/jzopen/Public/libs/layer/v2.1/skin/layer.css">
    <link rel="stylesheet" type="text/css" href="/jzopen/Public/libs/wang/css/wangEditor.min.css">


    <link rel="stylesheet" href="/jzopen/Public/admin/css/skins/_all-skins.min.css">
    <link type="image/x-icon" href="/jzopen/Public/favicon1.png" rel="shortcut icon" />
    <link href="/jzopen/Public/favicon1.png" rel="bookmark icon" />
    <style type="text/css" media="screen">
        ul.navbar-nav>li{
            float:left;
            padding:0 5px;
            margin:5px;
        }
    </style>
    

     <script src="/jzopen/Public/libs/jquery/jquery-1.11.3.min.js"></script>
    <script src="/jzopen/Public/libs/semantic/v2.1.7/components/form.js"></script>
    <script src="/jzopen/Public/libs/semantic/v2.1.7/components/transition.js"></script>
    <script src="/jzopen/Public/libs/semantic/v2.1.7/components/dropdown.js"></script>
    <script src="/jzopen/Public/libs/semantic/v2.1.7/components/checkbox.min.js"></script>
    <script src="/jzopen/Public/libs/semantic/v2.1.7/components/accordion.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <a href="<?php echo U('Admin/Index/index');?>" class="logo">
            <span class="logo-mini"><b>j</b>z</span>
            <span class="logo-lg"><b>Jz</b>open</span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                 <li>
                        <a href="<?php echo U('Public/loginout');?>">退出</a>
                    </li>
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/jzopen/Public/admin/images/profile_small.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo ($_SESSION['manager_info']['username']); ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i><?php echo ($_SESSION['manager_info']['manager_type']); ?> Online</a>
                </div>
            </div>
            <ul class="sidebar-menu">
                <li class="header">Menu</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-share"></i> <span>Multilevel</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                        <li>
                            <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                                <li>
                                    <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                                    <ul class="treeview-menu">
                                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    </ul>
                </li>
                 <?php if(is_array($allmenu)): $i = 0; $__LIST__ = $allmenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$first_menu): $mod = ($i % 2 );++$i; if($first_menu["pid"] == 0): ?><li class="treeview <?php if($breadcrumb[0]['title'] == $first_menu['title']) echo 'active';?>">
                            <?php if(empty($first_menu["0"])): ?><a href="<?php echo U($first_menu['url']);?>">
                                    <i class="fa fa-<?php echo ($first_menu["icon"]); ?>"></i>
                                   <span><?php echo ($first_menu["title"]); ?></span>
                                </a>
                            <?php else: ?>
                                <a href="#">
                                <i class="fa fa-<?php echo ($first_menu["icon"]); ?>"></i>
                                <span><?php echo ($first_menu["title"]); ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                <?php if(is_array($first_menu[0])): $i = 0; $__LIST__ = $first_menu[0];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$second_menu): $mod = ($i % 2 );++$i;?><li class="<?php if($breadcrumb[1]['title'] == $second_menu['title']) echo 'active';?>">
                                     <?php if(empty($second_menu["0"])): ?><a href="<?php echo U($second_menu['url']);?>" >
                                        <i class="fa fa-<?php echo ($second_menu["icon"]); ?>"></i>
                                       <?php echo ($second_menu["title"]); ?>
                                        </a>
                                         <?php else: ?>
                                        <a href="#">
                                        <i class="fa fa-<?php echo ($second_menu["icon"]); ?>"></i>
                                        <?php echo ($second_menu["title"]); ?>
                                         <i class="fa fa-angle-left pull-right"></i>
                                        </a>
                                        <ul class="treeview-menu">
                                            <?php if(is_array($second_menu[0])): $i = 0; $__LIST__ = $second_menu[0];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$third_menu): $mod = ($i % 2 );++$i;?><li class="<?php if($breadcrumb[2]['title'] == $third_menu['title']) echo 'active';?>">
                                                <a href="<?php echo U($third_menu['url']);?>">
                                                        <i class="fa fa-<?php echo ($third_menu["icon"]); ?>"></i>
                                                    <?php echo ($third_menu["title"]); ?>
                                                </a>
                                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </ul><?php endif; ?>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul><?php endif; ?>
                        </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </section>
    </aside>
    <div class="content-wrapper">
        <section class="content-header">
            <h3>
                <?php echo ($meta_title); ?>
                <small></small>
            </h3>
            <!-- 面包屑导航 -->
            <?php if(isset($breadcrumb)): ?><ol class="ui breadcrumb">
                    <li><i class="fa fa-dashboard"></i></li>
                    <?php if(is_array($breadcrumb)): $i = 0; $__LIST__ = $breadcrumb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U($vo.url);?>"><i class="fa fa-<?php echo ($vo["icon"]); ?>"></i><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ol>
            <?php else: ?>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol><?php endif; ?>
        </section>
        <section class="content">
         
        </section>
    </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.3
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://jzopen.com">Jzopen</a>.</strong> All rights
        reserved.
    </footer>

    <aside class="control-sidebar control-sidebar-dark">
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

        </ul>
        <div class="tab-content">
            <div class="tab-pane" id="control-sidebar-home-tab">
            </div>

        </div>
    </aside>
    <div class="control-sidebar-bg"></div>

</div>

<script src="/jzopen/Public/libs/fastclick/fastclick.js"></script>
<script src="/jzopen/Public/admin/js/app.js"></script>
<script src="/jzopen/Public/libs/semantic/v2.1.7/components/form.js"></script>
<script src="/jzopen/Public/libs/semantic/v2.1.7/components/transition.js"></script>
<script src="/jzopen/Public/libs/semantic/v2.1.7/components/dropdown.js"></script>
<script src="/jzopen/Public/libs/semantic/v2.1.7/components/checkbox.min.js"></script>
<script src="/jzopen/Public/libs/semantic/v2.1.7/components/accordion.js"></script>

<script src="/jzopen/Public/libs/slimeScroll/v1.3.8/jquery.slimscroll.min.js"></script>
<script src="/jzopen/Public/libs/layer/v2.1/layer.js"></script>
<script src="/jzopen/Public/libs/laydate/v1.1/laydate.js"></script>
<script src="/jzopen/Public/libs/laypage/v1.3/laypage.js"></script>
<script src="/jzopen/Public/libs/pace/v1.0.2/pace.min.js"></script>

<script src="/jzopen/Public/admin/js/demo.js"></script>

<script>
    $(document).ready(function () {
        $('select.ui.dropdown')
                .dropdown()
        ;
        $('.ui.radio.checkbox')
                .checkbox()
        ;
        $('.ui.checkbox')
                .checkbox()
        ;
        $('.ui.accordion')
                .accordion()
        ;
    });


</script>

    
</body>
</html>