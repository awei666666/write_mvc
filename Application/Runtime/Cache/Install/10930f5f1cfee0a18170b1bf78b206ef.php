<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>安装完成</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0"/>
<link rel="stylesheet" href="/awin_mvc/Public/CSS/bootstrap.min.css">
<link rel="stylesheet" href="/awin_mvc/Public/CSS/admin_base.css">

<!--[if lt IE 9]>
<script type="text/javascript" src="/awin_mvc/Public/jsrespond.min.js"></script>
<![endif]-->
<script src="/awin_mvc/Public/js/jquery.min.js"></script>
<script src="/awin_mvc/Public/js/bootstrap.min.js"></script>
<script src="/awin_mvc/Public/js/admin_base.js"></script>
<script src="/awin_mvc/Public/js/layer/layer.js"></script>

</head>
<style>
	body{
		margin: 0;
		padding: 0;
	}
	#head h1{
		margin: 44px 0 0 -21px;
		padding: 0;
		display: inline;
		color: #fff;
		float: left;
	}
	#head{
		background: #428bca url("/awin_mvc/Public/img/install_img/index_back.png") repeat scroll center center;
		height: 140px;
		margin-bottom: 30px;
	}
	#head img{
		float: left;
		display: inline	;
		margin: 31px 24px 0 126px;
	}
	.panel-body{
		width:70%;
		margin: 0px auto;
		text-align: center;
	}
	.content{
		line-height: 20px;
	}
	p{
		margin: 10px 0;
	}
	.panel-title{text-align: center; font-size: 24px;}
</style>
<body>
<header id="header" >
	<div id="head" ><img src="/awin_mvc/Public/img/install_img/LOGO.png" alt=""><h1>粮易网后台管理系统安装程序</h1></div>
</header>
<content id="content" >
	<div class="panel panel-default " >
		<div class="panel-heading ">
			<h3 class="panel-title text-center">安装完成</h3>
		</div>
		<div class="panel-body">
			<h4 class="content agreement">
				<a href="<?php echo ($url); ?>/admin" type="button" class="btn btn-success">登陆后台</a>
				&nbsp;&nbsp;&nbsp;
				<a href="<?php echo ($url); ?>" type="button" class="btn btn-danger">网站首页</a>
			</h4>
		</div>
	</div>

</content>
</body>
</html>