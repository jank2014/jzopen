<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Jzopen--超级后台</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/jz/Public/libs/semantic/v2.1.7/components/site.css">
    <link rel="stylesheet" href="/jz/Public/libs/semantic/v2.1.7/components/reset.css">
    <link rel="stylesheet" href="/jz/Public/libs/fontawesome/v4.5/css/font-awesome.css">
    <link rel="stylesheet" href="/jz/Public/admin/css/lte.css">
    <link rel="stylesheet" href="/jz/Public/libs/semantic/v2.1.7/components/reset.css">
    <link rel="stylesheet" href="/jz/Public/libs/semantic/v2.1.7/components/site.css">
    <link rel="stylesheet" href="/jz/Public/libs/semantic/v2.1.7/components/divider.css">
    <link rel="stylesheet" href="/jz/Public/libs/semantic/v2.1.7/components/form.css">
    <link rel="stylesheet" href="/jz/Public/libs/semantic/v2.1.7/components/input.css">
    <link rel="stylesheet" href="/jz/Public/libs/semantic/v2.1.7/components/button.css">
    <link rel="stylesheet" href="/jz/Public/libs/semantic/v2.1.7/components/dropdown.css">
    <link rel="stylesheet" href="/jz/Public/libs/semantic/v2.1.7/components/label.css">
    <link rel="stylesheet" href="/jz/Public/libs/semantic/v2.1.7/components/checkbox.css">
    <link rel="stylesheet" href="/jz/Public/libs/semantic/v2.1.7/components/accordion.css">
    <link rel="stylesheet" href="/jz/Public/libs/semantic/v2.1.7/components/transition.css">
    <link rel="stylesheet" href="/jz/Public/libs/semantic/v2.1.7/components/table.css">
    <link rel="stylesheet" href="/jz/Public/libs/semantic/v2.1.7/components/search.css">
    <link rel="stylesheet" href="/jz/Public/libs/semantic/v2.1.7/components/grid.css">



    <link rel="stylesheet" href="/jz/Public/libs/laypage/v1.3/skin/laypage.css">
    <link rel="stylesheet" href="/jz/Public/libs/layer/v2.1/skin/layer.css">
    <link rel="stylesheet" type="text/css" href="/jz/Public/libs/wang/css/wangEditor.min.css">


    <link rel="stylesheet" href="/jz/Public/admin/css/skins/_all-skins.min.css">
    <link type="image/x-icon" href="/jz/Public/favicon1.png" rel="shortcut icon" />
    <link href="/jz/Public/favicon1.png" rel="bookmark icon" />
    <style type="text/css" media="screen">
        ul.navbar-nav>li{
            float:left;
            padding:0 5px;
            margin:5px;
        }
    </style>
    

    <script src="/jz/Public/libs/jquery/jquery-1.11.3.min.js"></script>
    <script src="/jz/Public/libs/semantic/v2.1.7/components/form.js"></script>
    <script src="/jz/Public/libs/semantic/v2.1.7/components/transition.js"></script>
    <script src="/jz/Public/libs/semantic/v2.1.7/components/dropdown.js"></script>
    <script src="/jz/Public/libs/semantic/v2.1.7/components/checkbox.min.js"></script>
    <script src="/jz/Public/libs/semantic/v2.1.7/components/accordion.js"></script>

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
                    <img src="/jz/Public/admin/images/profile_small.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo ($_SESSION['manager_info']['username']); ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i><?php echo ($_SESSION['manager_info']['manager_type']); ?> Online</a>
                </div>
            </div>
            <ul class="sidebar-menu">
                <li class="header">Menu</li>
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
         
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">
                <div class="ui fluid grid">
                    <div class="six wide column ">
                        <div class="ui mini buttons">
                            <?php if(!empty($topbtns)): if(is_array($topbtns)): $i = 0; $__LIST__ = $topbtns;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$topbtns): $mod = ($i % 2 );++$i;?><a href="<?php echo ($topbtns["second"]["href"]); ?>" class="ui compact button <?php echo ($topbtns["second"]["btn_class"]); ?>"> <i class="icon <?php echo ($topbtns["second"]["i_class"]); ?>"></i>
                                        <?php echo ($topbtns["second"]["name"]); ?>
                                    </a>
                                    &nbsp;<?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </div>
                    </div>

                    <div class=""></div>
                </div>
            </h3>

            <div class="box-tools pull-right">
                <div class="ten wide column">
                    <div class="ui form">
                        <div class="fields">
                            <div class="field">
                                <div class="ui mini icon input">
                                    <input id="start" placeholder="点击选择开始日期"> <i class="calendar icon"></i>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui mini icon input">
                                    <input id="end" placeholder="点击选择开始日期">
                                    <i class="calendar icon"></i>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui mini search">
                                    <div class="ui icon input aligned right">
                                        <input class="prompt" type="text" placeholder="Search ...">
                                        <i class="search icon"></i>
                                    </div>
                                    <div class="results"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="box-body">
            <table class="ui teal very compact table">
                <?php if(!empty($thead)): ?><thead>
                        <tr>
                            <th>
                                <input class="checkall" type="checkbox"></th>
                            <?php if(is_array($thead)): $i = 0; $__LIST__ = $thead;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$thead): $mod = ($i % 2 );++$i;?><th><?php echo ($thead["name"]); ?></th><?php endforeach; endif; else: echo "" ;endif; ?>
                            <?php if(!empty($rightbtns)): ?><th>
                                    操作
                                    <i class="icon wrench"></i>
                                </th><?php endif; ?>
                        </tr>
                    </thead><?php endif; ?>
                <?php if(!empty($tbody)): ?><tbody>
                        <?php if(is_array($tbody)): $i = 0; $__LIST__ = $tbody;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tbody): $mod = ($i % 2 );++$i;?><tr>
                                <td>
                                    <input class="ids" type="checkbox" value="<?php echo ($tbody['id']); ?>" name="ids"></td>
                                <?php if(is_array($tbody_list)): $i = 0; $__LIST__ = $tbody_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><td><?php echo ($tbody[$list['name']]); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
                                <?php if(!empty($tbody["rightbtns"])): ?><td>
                                        <div class="ui mini buttons">
                                            <?php if(is_array($tbody["rightbtns"])): $i = 0; $__LIST__ = $tbody["rightbtns"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rightbtns): $mod = ($i % 2 );++$i;?><a href="<?php echo ($rightbtns["href"]); ?>" class="ui icon button compact basic <?php echo ($rightbtns["btn_class"]); ?>">
                                                    <input type="hidden" value="<?php echo ($rightbtns["href"]); ?>">
                                                    <i class="icon <?php echo ($rightbtns["i_class"]); ?>"></i>
                                                </a><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </div>

                                    </td><?php endif; ?>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody><?php endif; ?>
            </table>

            <?php if(!empty($page_list)): ?><div id="page_list">
                    <input type="hidden" id="pages" value="<?php echo ($page_list); ?>"></div><?php endif; ?>
        </div>

        <div class="box-footer"></div>
    </div>


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

<script src="/jz/Public/libs/fastclick/fastclick.js"></script>
<script src="/jz/Public/admin/js/app.js"></script>
<script src="/jz/Public/libs/semantic/v2.1.7/components/form.js"></script>
<script src="/jz/Public/libs/semantic/v2.1.7/components/transition.js"></script>
<script src="/jz/Public/libs/semantic/v2.1.7/components/dropdown.js"></script>
<script src="/jz/Public/libs/semantic/v2.1.7/components/checkbox.min.js"></script>
<script src="/jz/Public/libs/semantic/v2.1.7/components/accordion.js"></script>

<script src="/jz/Public/libs/slimeScroll/v1.3.8/jquery.slimscroll.min.js"></script>
<script src="/jz/Public/libs/layer/v2.1/layer.js"></script>
<script src="/jz/Public/libs/laydate/v1.1/laydate.js"></script>
<script src="/jz/Public/libs/laypage/v1.3/laypage.js"></script>
<!-- <script src="/jz/Public/libs/pace/v1.0.2/pace.min.js"></script> -->

<script src="/jz/Public/admin/js/demo.js"></script>

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

    
    <script src="/jz/Public/libs/laypage/v1.3/laypage.js"></script>
    <script type="text/javascript">
    laypage({
        cont: 'page_list',
        pages:$("#pages").val(),
        skip: true, //是否开启跳页
        skin: 'molv',
        curr: function(){ //通过url获取当前页，也可以同上（pages）方式获取
            var page = location.search.match(/page=(\d+)/);
            return page ? page[1] : 1;
        }(),
        jump: function(e, first){ //触发分页后的回调
            if(!first){ //一定要加此判断，否则初始时会无限刷新
                location.href = '?page='+e.curr;
            }
        }
    });
</script>
    <script>
    var start = {
        elem: '#start',
        format: 'YYYY/MM/DD hh:mm:ss',
        min: laydate.now(), //设定最小日期为当前日期
        max: '2099-06-16 23:59:59', //最大日期
        istime: true,
        istoday: false,
        choose: function(datas){
            end.min = datas; //开始日选好后，重置结束日的最小日期
            end.start = datas //将结束日的初始值设定为开始日
        }
    };
    var end = {
        elem: '#end',
        format: 'YYYY/MM/DD hh:mm:ss',
        min: laydate.now(),
        max: '2099-06-16 23:59:59',
        istime: true,
        istoday: false,
        choose: function(datas){
            start.max = datas; //结束日选好后，重置开始日的最大日期
        }
    };
    laydate(start);
    laydate(end);
    laydate.skin('molv');

    //全选/反选/单选的实现
    $(".checkall").click(function() {
        $(".ids").prop("checked", this.checked);
    });

    $(".ids").click(function() {
        var option = $(".ids");
        option.each(function() {
            if (!this.checked) {
                $(".checkall").prop("checked", false);
                return false;
            } else {
                $(".checkall").prop("checked", true);
            }
        });
    });
</script>


</body>
</html>