<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>环境及权限检测 - 安装系统</title>
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
		width:60%;
		margin: 0px auto;
	}
	.content{
		line-height: 20px;
	}
	.panel-heading{
		text-align: center;
	}
	.glyphicon-ok:before {
		content: "\e013";
		color: #f00;
	}
	.glyphicon-remove:before {
		content: "\e013";
		color: #f00;
	}
	.table th{text-align: center}
	.table-bordered > tbody > tr:nth-child(odd) {
		background-color: #f9f9f9;
	}
	.panel-body{padding: 0px}
	.panel-title{text-align: center; font-size: 24px;}
</style>
<body style="overflow: auto; min-height: 870px;">
	<header id="header" >
		<div id="head" ><img src="/awin_mvc/Public/img/install_img/LOGO.png" alt=""><h1>粮易网后台管理系统安装程序</h1></div>
	</header>
	<content id="content" >
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">环境及权限检测</h3>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
					<tr>
						<th>检查项目</th>
						<th>当前环境</th>
						<th>要求环境</th>
						<th>状态</th>
					</tr>
					</thead>
					<tbody>
					<?php if(is_array($list)): foreach($list as $key=>$r): ?><tr class="text-center">
							<td><?php echo ($r["name"]); ?></td>
							<td width="450px"><?php echo ($r["condition"]); ?></td>
							<td><?php echo ($r["need"]); ?></td>
							<td><i class="icon <?php if(($r["status"]) == "true"): ?>glyphicon glyphicon-ok<?php else: ?>glyphicon glyphicon-remove<?php endif; ?>"></i></td>
						</tr><?php endforeach; endif; ?>
					</tbody>
				</table>
			</div>
			<div class="panel-heading">
				<h3 class="panel-title">目录权限检测</h3>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
					<tr>
						<th>目录文件</th>
						<th>所需状态</th>
						<th>当前状态</th>
					</tr>
					</thead>
					<tbody>
					<?php if(is_array($floder)): foreach($floder as $key=>$r): ?><tr class="text-center">
							<td class="text-left"><?php echo ($r["name"]); ?></td>
							<td>可写</td>
							<td><?php if(($r["status"]) == "true"): ?><span class="label label-success f12">可写</span><?php else: ?><span class="label label-danger f12">不可写</span><?php endif; ?></td>
						</tr><?php endforeach; endif; ?>
					</tbody>
				</table>
				<div class="radio" style="text-align: center">
					<label>
						<input type="radio" name="type" id="optionsRadios2" value="1">急速安装

					</label>
					<label><input type="radio" name="type" id="optionsRadios2" checked value="0">正常安装</label>
				</div>
			</div>
		</div>
		<?php if(($next) != "0"): ?><div class="alert alert-danger">环境或权限不足，无法进行安装！</div><?php endif; ?>


		<div class="buttons text-center">
			<a class="btn btn-danger" href="<?php echo U('index');?>">上一步</a>
			&nbsp;&nbsp;
			<?php if(($next) == "0"): ?><a class="btn btn-success" href="<?php echo U('set');?>">下一步，设置相关信息</a><?php endif; ?>
		</div>
	</content>
</body>
<script>
	$(function(){
		var obj_type=$('.radio').find("[name='type']").on('click',function(){
			var input_val=$(this).val();
			var change_url="<?php echo U('set');?>";
			$('.btn-success').attr('href',change_url+'?status='+input_val);


		});

	})
</script>
</html>