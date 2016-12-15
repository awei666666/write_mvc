<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>设置数据库及帐号信息 - 安装系统</title>
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
	body {
		margin: 0;
		padding: 0;
	}
	#head h1 {
		margin: 44px 0 0 -21px;
		padding: 0;
		display: inline;
		color: #fff;
		float: left;
	}
	#head {
		background: #428bca url("/awin_mvc/Public/img/install_img/index_back.png") repeat scroll center center;
		height: 140px;
		margin-bottom: 30px;
	}
	#head img {
		float: left;
		display: inline;
		margin: 31px 24px 0 126px;
	}
	.panel-body {
		width: 60%;
		margin: 0px auto;
	}
	.content {
		line-height: 20px;
	}
	.panel-title { text-align: center; font-size: 24px; }
	.black_screen {
		width: 100%;
		height: 1000px;
		background: rgba(22, 22, 22, 0.5);
		position: absolute;
		z-index: 22;
		top: 22%;
		display: none;
	}
	.message-info {
		margin-left: 25%;
		margin-top: 200px;
	}
	.detail-message {
		height: 160px;
		overflow: auto;
	}
	.info-red {
		color: red;
	}
</style>
<body style="overflow: auto; min-height: 870px;">
<header id="header">
	<div id="head"><img src="/awin_mvc/Public/img/install_img/LOGO.png" alt="">
		<h1>粮易网后台管理系统安装程序</h1></div>
</header>
<content id="content">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">数据库及帐号设置</h3>
		</div>
		<div class="panel-body">
			<form action="javascript:;" method="post" id="myform">
				<div class="content form-horizontal">
					<div class="alert alert-success" role="alert">
						数据库帐号配置
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">数据库主机</label>
						<div class="col-sm-4">
							<div class="input-group">
								<input type="text" name="host" class="form-control" placeholder="localhost">
								<div class="input-group-addon">端口号</div>
								<input type="text" name="port" class="form-control" size="4">
							</div>
						</div>
						<div class="col-sm-6"><span class="help-block">数据库服务器地址, 一般为 localhost，默认不需要填写地址和端口号</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">数据库帐号</label>
						<div class="col-sm-4">
							<input type="text" name="db_user" class="form-control" placeholder="数据库帐号">
						</div>
						<div class="col-sm-6"><span class="help-block">设置登录数据的账号</span></div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">数据库密码</label>
						<div class="col-sm-4">
							<input type="text" name="db_pass" class="form-control" placeholder="数据库密码">
						</div>
						<div class="col-sm-6"><span class="help-block">设置登录数据的密码</span></div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">数据库名称</label>
						<div class="col-sm-4">
							<input type="text" name="db_name" class="form-control" placeholder="数据库名称">
						</div>
						<div class="col-sm-6"><span class="help-block">设置数据库名称，不存则系统自动创建</span></div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">数据表前缀</label>
						<div class="col-sm-4">
							<input type="text" name="db_prefix" class="form-control" value="ly_">
						</div>
						<div class="col-sm-6"><span class="help-block">一般不需要手动更改，方便后期管理操作</span></div>
					</div>
					<div class="alert alert-success" role="alert">
						管理员帐号设置
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">管理员帐号</label>
						<div class="col-sm-4">
							<input type="text" name="username" class="form-control" value="admin">
						</div>
						<div class="col-sm-6"><span class="help-block">设置超级管理员的帐号，请牢记您的设置</span></div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">管理员密码</label>
						<div class="col-sm-4">
							<input type="password" name="password" class="form-control" placeholder="管理员密码">
						</div>
						<div class="col-sm-6"><span class="help-block">设置超级管理员的帐号登录密码，6-20位，请牢记您的设置</span></div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">再次输入密码</label>
						<div class="col-sm-4">
							<input type="password" name="repassword" class="form-control" placeholder="再次输入密码">
						</div>
						<div class="col-sm-6"><span class="help-block">再次输入的超级管理员密码，请牢记您的设置</span></div>
					</div>
				</div>
				<div class="buttons text-center">
					<a class="btn btn-danger" href="<?php echo U('check');?>">上一步</a>
					&nbsp;&nbsp;
					<button class="btn btn-success sub" type="submit">下一步，开始安装</button>
					&nbsp;&nbsp;
					<button class="btn btn-info" type="reset">重置</button>
				</div>
			</form>
		</div>
	</div>
	<div class="black_screen">

		<div class="col-sm-5 message-info">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">正在安装</h3>
				</div>
				<div class="panel-body">
					<div class="progress">
						<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">

						</div>
						<div>正在加载中……</div>
					</div>
					<div class="detail-message">
						<!--<div class=""><i class="glyphicon glyphicon-ok info-red"></i>　尽快还款计划考核科技</div>-->
					</div>

				</div>
			</div>
		</div>


	</div>
</content>

</body>
<script>
	var obj_detail_message = $('.detail-message');
	$(function () {
		$.fn.getName = function (name) {
			return $(this).find("[name='" + name + "']");
		};
		var $form    = $('form');

		$form.submit(function () {

			$.ajax({
				url     : '<?php echo U('install');?>',
				type    : 'post',
				async   : true,
				data    : $form.serialize(),
				success : function (data) {
					var layer_index = layer.confirm(data.info, {
						btn : ['确定'] //按钮
					}, function () {
						ajax_for(data);
						layer.close(layer_index);
					}, function () {

					});

				}
			});

		});
	});
	/**
	 * ajax循环备份提交
	 * @param data
	 */
	function ajax_for(data) {

		$.ajax({
			url     : data.url,
			//data:data,
			async   : true,
			type    : 'post',
			success : function (da) {

				if (da.status != 0) {
					$('.black_screen').css('display', 'block');
					detail_data_info(da.info, 1);
					detail_data_info('正在安装下一张表,' + da.next_table_name + '的结构', 0);
					detail_data_info('正在安装下一张表,' + da.next_table_name + '的数据', 0);

					var percent_number = (da.size / (da.totle - 1)) * 100;
					$('.progress-bar').css('width', percent_number + '%');
					$(".detail-message").scrollTop($(".detail-message")[0].scrollHeight);
					if (percent_number <= 100) {
						ajax_for(da);
					}

				}else {
					$('.progress-bar').removeClass('active');
					//询问框
					var layer_index = layer.confirm('安装完成！', {
						btn : ['确定'] //按钮
					}, function () {
						$('.black_screen').css('display', 'none');
						layer.close(layer_index);
						location.href="<?php echo U('complete');?>";
					}, function () {

					});
				}
				return;

			}
		});

	}

	/**
	 * 给详细信息添加信息
	 * @param info
	 * @param icon_number
	 */
	function detail_data_info(info, icon_number) {
		if (icon_number == 0) {
			var detail_message = create_back_html(info, 'glyphicon glyphicon-refresh info-red');
		} else {
			var detail_message = create_back_html(info, 'glyphicon glyphicon-ok info-red');
		}
		var old_detail_message2 = obj_detail_message.html();
		obj_detail_message.html(old_detail_message2 + detail_message);
	}
	/**
	 * 生成页面需要的html备份分布标签
	 */
	function create_back_html(str_back_info, icon_info) {
		return '<div class=""><i class="' + icon_info + '"></i>　' + str_back_info + '</div>';
	}
</script>
</html>