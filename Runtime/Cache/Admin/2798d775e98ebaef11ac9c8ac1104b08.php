<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Site Properties -->
  <title>Login Example - Semantic</title>
  <link rel="stylesheet" type="text/css" href="/jzopen/Public/libs/semantic/v2.1.7/components/reset.css">
  <link rel="stylesheet" type="text/css" href="/jzopen/Public/libs/semantic/v2.1.7/components/site.css">

  <link rel="stylesheet" type="text/css" href="/jzopen/Public/libs/semantic/v2.1.7/components/container.css">
  <link rel="stylesheet" type="text/css" href="/jzopen/Public/libs/semantic/v2.1.7/components/grid.css">
  <link rel="stylesheet" type="text/css" href="/jzopen/Public/libs/semantic/v2.1.7/components/header.css">
  <link rel="stylesheet" type="text/css" href="/jzopen/Public/libs/semantic/v2.1.7/components/image.css">
  <link rel="stylesheet" type="text/css" href="/jzopen/Public/libs/semantic/v2.1.7/components/menu.css">

  <link rel="stylesheet" type="text/css" href="/jzopen/Public/libs/semantic/v2.1.7/components/divider.css">
  <link rel="stylesheet" type="text/css" href="/jzopen/Public/libs/semantic/v2.1.7/components/segment.css">
  <link rel="stylesheet" type="text/css" href="/jzopen/Public/libs/semantic/v2.1.7/components/form.css">
  <link rel="stylesheet" type="text/css" href="/jzopen/Public/libs/semantic/v2.1.7/components/input.css">
  <link rel="stylesheet" type="text/css" href="/jzopen/Public/libs/semantic/v2.1.7/components/button.css">
  <link rel="stylesheet" type="text/css" href="/jzopen/Public/libs/semantic/v2.1.7/components/list.css">
  <link rel="stylesheet" type="text/css" href="/jzopen/Public/libs/semantic/v2.1.7/components/message.css">
  <link rel="stylesheet" type="text/css" href="/jzopen/Public/libs/semantic/v2.1.7/components/icon.css">
  <link rel="stylesheet" href="/jzopen/Public/libs/layer/v2.1/skin/layer.css">
  <script src="/jzopen/Public/libs/jquery/jquery-2.1.4.min.js"></script>
  <script src="/jzopen/Public/libs/semantic/v2.1.7/components/form.js"></script>
  <script src="/jzopen/Public/libs/semantic/v2.1.7/components/transition.js"></script>
  <script src="/jzopen/Public/libs/layer/v2.1/layer.js"></script>

  <style type="text/css">

    body {
      background-color: #DADADA;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
      margin-top:100px;
    }
  </style>
  
</head>
<body>


<div class="ui center aligned grid">
  <div class="column">
    <h2 class="ui teal image header">
      <!-- <img src="/jzopen/Public/logo.png" class="image"> -->
      <div class="content">
        jzopen
      </div>
    </h2>
    <form class="ui large form" action="<?php echo U('Admin/Public/login');?>" method="post" accept-charset="utf-8">
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon small input">
            <i class="user icon"></i>
            <input type="text" name="username" placeholder="Username">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon small input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>
        <a class="ui fluid teal submit button is_ajax_post" type="submit">登陆</a>
      </div>

      <div class="ui error message"></div>
    </form>
  </div>
</div>

<script type="text/javascript">
  jQuery(document).ready(function() {
    $('.is_ajax_post').click(function() {
      $.post($('form').attr('action'), $('form').serialize(), function(data, status, xhr) {
        /*optional stuff to do after success */
        layer.msg(data.info,{offset:'100px'},function(){
          if(data.status == 1){
          location.href = data.url;
        }
        });
      });
    });
  });
</script>

</body>

</html>