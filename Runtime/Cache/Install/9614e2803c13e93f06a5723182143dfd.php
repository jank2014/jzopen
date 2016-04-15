<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    
	<title>step2</title>

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
				<a class="item">开始安装</a>
				<a class="item">完成安装</a>
			</div>
		</div>
		<div class="colum steps">
			<h6 class="ui top attached inverted header">jankzMaker安装协议</h6>
			<div class="ui buttom attached segment">
				<form class="ui form" action="/jzopen/index.php/Index/step3.html" method="post" target="_self">
					<div class="column step-padding">
						<div class="two fields">
							<div class="field">
								<label>数据库连接类型</label>
								<select name="db[DB_TYPE]" class="ui dropdown">
									<option>mysql</option>
								</select>
							</div>
							<div class="field">
								<label>数据库服务器，数据库服务器IP，一般为127.0.0.1</label>
								<input class="" type="text" name="db[DB_HOST]" value="127.0.0.1"></div>
						</div>

						<div class="field">
							<label>数据库名</</label>
							<input class="" type="text" name="db[DB_NAME]" value="Jzopen_<?php echo C('PRODUCT_MODEL');?>"></div>
						<div class="inline fields">
						    <label>是否覆盖同名数据库</label>
						    <div class="field">
						      <div class="ui radio checkbox">
						        <input type="radio" id="cover0" class="radio" name="cover" value="0" checked="checked">
						        <label>不覆盖</label>
						      </div>
						    </div>
						    <div class="field">
						      <div class="ui radio checkbox">
						        <input type="radio" id="cover1" class="radio" name="cover" value="1">
						        <label>不覆盖</label>
						      </div>
						    </div>
						  </div>
						<div class="field">
							<label>数据库用户名</</label>
							<input class="" type="text" name="db[DB_USER]" value="root"></div>

						<div class="field">
							<label>数据库密码</</label>
							<input class="" type="password" name="db[DB_PWD]" value=""></div>

						<div class="field">
							<label>数据库表前缀</</label>
							<input class="" type="text" name="db[DB_PREFIX]" value="<?php echo (C("ORIGINAL_TABLE_PREFIX")); ?>"></div>
						<div class="ui horizontal divider">创建管理员</div>
						<div class="field">
							<label>用户名</</label>
							<input class="" type="text" name="username" value="admin"></div>
						<div class="field">
							<label>密码</</label>
							<input class="" type="password" name="password" value=""></div>
						<div class="field">
							<label>重复密码</</label>
							<input class="" type="password" name="repassword" value=""></div>
						<div class="field">
							<label>邮箱</</label>
							<input class="" type="email" name="email" value="admin@admin.com"></div>
					</div>
				</div>

				<a class="ui tiny teal fluid button" type="submit" onclick="$('form').submit();return false;">下一步</a>
				<a class="ui tiny fluid button " style="margin-top: 0.2em" href="<?php echo U('step2');?>">上一步</a>
			</form>
		</div>
	</div>

    <script src="/jzopen/Public/libs/jquery/jquery-2.1.4.min.js"></script>
    <script src="/jzopen/Public/libs/semantic/v2.1.7/semantic.min.js"></script>
    
	<script>
	$(document).ready(function() {
		$('select.dropdown')
  .dropdown();
	});
	</script>

</body>

</html>