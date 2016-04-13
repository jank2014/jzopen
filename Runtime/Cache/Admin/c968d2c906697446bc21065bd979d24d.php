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
            <h3 class="box-title"></h3>

            <div class="box-tools pull-right"></div>
        </div>

        <div class="box-body">
            <form class="ui form" action="<?php echo ($post_url); ?>">
                <div class="ui grid">
                    <div class="one wide column"></div>
                    <div class="ten wide column">
                        <div class="ui container" style="margin-top: 40px">
                            <?php if(is_array($fields)): $i = 0; $__LIST__ = $fields;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i; switch($item["type"]): case "text": ?><div class="field">
<label><?php echo ($item["title"]); ?></label>
<div class="ui icon input">
	<input type="text"  name="<?php echo ($item["name"]); ?>" value="<?php echo ($item["value"]); ?>"></div>
</div><?php break;?>
<?php case "textarea": ?><div class="field">
    <label><?php echo ($item["title"]); ?></label>
   	<textarea  class="<?php echo ($item["class"]["row"]); ?>" name="<?php echo ($item["name"]); ?>" ><?php echo ($item["value"]); ?></textarea>
  </div><?php break;?>
<?php case "password": break;?>
<?php case "select": ?><div class="field">
    <label><?php echo ($item["title"]); ?></label>
    <select class="ui dropdown" name="<?php echo ($item["name"]); ?>">
        <?php if(is_array($item["conf"]["info"])): foreach($item["conf"]["info"] as $key=>$select): ?><option value="<?php echo ($select["id"]); ?>" <?php if(($item["value"]) == $select["id"]): ?>selected<?php endif; ?>  ><?php echo ($select["title"]); ?></option><?php endforeach; endif; ?>
    </select>
</div>
<!-- <div class="ui divider"></div> --><?php break;?>
<?php case "checkbox": ?><div class="<?php echo ($item["class"]); ?> field">
      <div class="ui checkbox">
        <input class="hidden" name="<?php echo ($item["name"]); ?>" type="checkbox" value="<?php echo ($item["value"]); ?>">
        <label><?php echo ($item["title"]); ?></label>
      </div>
</div><?php break;?>
<?php case "divider": ?><div class="ui <?php echo ($item["class"]); ?> divider"><?php echo ($item["title"]); ?></div><?php break;?>
<?php case "icon-divider": ?><h4 class="ui <?php echo ($item["class"]["divider"]); ?> divider header"><i class="icon <?php echo ($item["class"]["icon"]); ?>"></i> <?php echo ($item["title"]); ?> </h4><?php break;?>
<?php case "label": ?><a class="ui <?php echo ($item["class"]); ?> label"><?php echo ($item["title"]); ?></a><?php break;?>
<?php case "labels": ?><div class="ui <?php echo ($item["class"]); ?> labels">
	<?php if(is_array($item["conf"])): $i = 0; $__LIST__ = $item["conf"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><a class="ui <?php echo ($data["class"]["label"]); ?>label"><i class="icon <?php echo ($data["class"]["icon"]); ?>"></i> <?php echo ($data["title"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
</div><?php break;?>
<?php case "textarea": ?><div class="field">
    <label><?php echo ($item["title"]); ?></label>
   	<textarea  class="<?php echo ($item["class"]["row"]); ?>" name="<?php echo ($item["name"]); ?>" ><?php echo ($item["value"]); ?></textarea>
  </div><?php break;?>
<?php case "slider": ?><div class="ui slider checkbox">
  <input type="checkbox" name="<?php echo ($item["name"]); ?>">
  <label><?php echo ($item["title"]); ?></label>
</div><?php break;?>
<?php case "toggle": ?><div class="inline field">
    <div class="ui toggle checkbox">
      <input name="<?php echo ($item["name"]); ?>" type="checkbox">
      <label><?php echo ($item["title"]); ?></label>
    </div>
  </div><?php break;?>
<?php case "radio": ?><div class="inline fields">
  <label><?php echo ($item["title"]); ?></label>
  <?php if(is_array($item["conf"])): $i = 0; $__LIST__ = $item["conf"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="field">
      <div class="ui radio checkbox">
        <input type="radio" name="<?php echo ($data["name"]); ?>" value="{{data.value}}" >
        <label><?php echo ($data["title"]); ?></label>
      </div>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div><?php break;?>
<?php case "button": ?><button type="button" class="$item.class.button"><i class="icon <?php echo ($item["class"]["icon"]); ?>"></i><?php echo ($item["title"]); ?></button><?php break;?>
<?php case "buttons": ?><div class="ui <?php echo ($item["class"]); ?> buttons">
	<?php if(is_array($item["conf"])): $i = 0; $__LIST__ = $item["conf"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><button type="button" class="$data.class.button"><i class="icon <?php echo ($data["class"]["icon"]); ?>"></i><?php echo ($data["title"]); ?></button><?php endforeach; endif; else: echo "" ;endif; ?>
</div><?php break;?>
<?php case "wangEditor": ?><div class="field">
    <label><?php echo ($item["title"]); ?></label>
	  <textarea id="jz_editor" name="<?php echo ($item["name"]); ?>">

      </textarea>

<script src="/jz/Public/libs/wang/js/wangEditor.min.js"></script>
<script src="/jz/Public/libs/plupload/v2.1.8/js/plupload.full.min.js"></script>
    <!--<script type="text/javascript" src="../../dist/js/wangEditor.min.js"></script>-->
    <script type="text/javascript">
        // 封装console.log
        function printLog(title, info) {
            window.console && console.log(title, info);
        }
        // 配置上传
        function uploadInit () {
            var editor = this;
            var btnId = editor.customUploadBtnId;
            var containerId = editor.customUploadContainerId;
            //实例化一个上传对象
            var uploader = new plupload.Uploader({
                browse_button: btnId,
                url: "<?php echo U('Admin/Index/upload');?>",
                flash_swf_url: 'lib/plupload/plupload/Moxie.swf',
                sliverlight_xap_url: 'lib/plupload/plupload/Moxie.xap',
                filters: {
                    mime_types: [
                        //只允许上传图片文件 （注意，extensions中，逗号后面不要加空格）
                        { title: "图片文件", extensions: "jpg,gif,png,bmp" }
                    ]
                }
            });
            //存储所有图片的url地址
            var urls = [];
            //初始化
            uploader.init();
            //绑定文件添加到队列的事件
            uploader.bind('FilesAdded', function (uploader, files) {
                //显示添加进来的文件名
                $.each(files, function(key, value){
                    printLog('添加文件' + value.name);
                });
                // 文件添加之后，开始执行上传
                uploader.start();
            });
            //单个文件上传之后
            uploader.bind('FileUploaded', function (uploader, file, responseObject) {
                //注意，要从服务器返回图片的url地址，否则上传的图片无法显示在编辑器中
                var url = responseObject.response;
                //先将url地址存储来，待所有图片都上传完了，再统一处理
                urls.push(url);
                printLog('一个图片上传完成，返回的url是' + url);
            });
            //全部文件上传时候
            uploader.bind('UploadComplete', function (uploader, files) {
                printLog('所有图片上传完成');
                // 用 try catch 兼容IE低版本的异常情况
                try {
                    //打印出所有图片的url地址
                    $.each(urls, function (key, value) {
                        printLog('即将插入图片' + value);
                        // 插入到编辑器中
                        editor.command(null, 'insertHtml', '<img src="' + value + '" style="max-width:100%;"/>');
                    });
                } catch (ex) {
                    // 此处可不写代码
                } finally {
                    //清空url数组
                    urls = [];
                    // 隐藏进度条
                    editor.hideUploadProgress();
                }
            });
            // 上传进度条
            uploader.bind('UploadProgress', function (uploader, file) {
                // 显示进度条
                editor.showUploadProgress(file.percent);
            });
        }
        // 创建编辑器
        var editor = new wangEditor('jz_editor');
        editor.config.customUpload = true;  // 配置自定义上传
        editor.config.customUploadInit = uploadInit;  // 配置上传事件
        editor.create();
    </script>
</div><?php break;?>








                                    <?php case "fields": ?><div class="<?php echo ($item["class"]); ?> fields">
                                            <?php if(is_array($item["conf"])): $i = 0; $__LIST__ = $item["conf"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$inline): $mod = ($i % 2 );++$i; switch($inline["type"]): case "inline-text": ?><div class="field">
<label><?php echo ($inline["title"]); ?></label>
<div class="ui icon input">
	<input type="text"  name="<?php echo ($inline["name"]); ?>" value="<?php echo ($inline["value"]); ?>"></div>
</div><?php break; endswitch; endforeach; endif; else: echo "" ;endif; ?>
                                        </div><?php break; endswitch; endforeach; endif; else: echo "" ;endif; ?>
                            <a class="ui teal button is_ajax_post">保存</a>
                            <a class="ui grey button go_back">返回</a>
                        </div>
                    </div>

                </div>
            </form>
        </div>

        <div class="box-footer"></div>
    </div>


        </section>
    </div>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
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

    
    <script type="text/javascript">
    $(document).ready(function(){
        $(".is_ajax_post").click(function(){
            $.post($('form').attr('action'),$('form').serialize(), function(data, textStatus, xhr) {
                layer.msg(data.info,{offset:'100px'},function () {
                   if(data.status ==1){
                      location.href = data.url;
                   }
                })
            });
        });
        $('.go_back').click(function(){

        });
    });
</script>

</body>
</html>