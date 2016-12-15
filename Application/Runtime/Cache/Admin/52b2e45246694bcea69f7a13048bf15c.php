<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE HTML>
<html style="min-width: 1000px; min-height: 1800px">
<head>
	<title>awin后台管理系统</title>
	<link rel="stylesheet" href="/awin_mvc/Public/css/admin_base.css">
	<!--包含头部重要信息-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0"/>
<link rel="stylesheet" href="/awin_mvc/Public/css/bootstrap.min.css">
<!--<link rel="stylesheet" href="/awin_mvc/Public/css/admin_base.css">-->

<!--[if lt IE 9]>
<script type="text/javascript" src="/awin_mvc/Public/jsrespond.min.js"></script>
<![endif]-->
<script src="/awin_mvc/Public/js/jquery.min.js"></script>
<script src="/awin_mvc/Public/js/bootstrap.min.js"></script>
<script src="/awin_mvc/Public/js/admin_base.js"></script>
	<!--头部自定义内容-->
	
	<style>
		.content-padding { padding: 20px; }
		.form-horizontal{max-width: 95%;}
		.help-block { float: left; display: block; font-size: 12px; color: #999; }
		.form-group-title {
			background-color: #ddd;
			padding: 8px 8px;
			margin-left: 30px;
			margin-bottom: 20px;
			background-image: linear-gradient(to bottom, #f5f5f5 0%, #e8e8e8 100%);
			background-repeat: repeat-x;
			border: 1px #ddd solid;
			border-radius: 3px;
			font-size: 12px;
		}
		#sizebox ,#sizebox1 { display: none; }
		.col-sm-2{padding:0}
	</style>

</head>
<style>
	#logo img{
		height: 50px;
		margin-left: 39px;
	}
</style>
<body style="min-width: 1000px;">


<!--ie9以下版本等的提示消息-->
<!--[if lt IE 9]>
<div class="alert alert-danger" style="position: absolute; z-index:999; width:100%; height: 60px;">您正在使用
	<strong>过时的</strong> 浏览器. 是时候
	<a class="btn btn-success" target="_blank" href="http://browsehappy.com/">更换一个更好的浏览器</a> 来提升用户体验。
	建议使用<a class="btn btn-success" target="_blank" href="http://rj.baidu.com/soft/detail/11843.html?ald/">火狐浏览器</a> 。
</div>
<![endif]-->


<!--头部信息-->
<div id="header">
	<div id="top-logo">
		<!--logo图片-->
		<div id="logo">
			<img src="/awin_mvc/Public/img/backgrounds/LOGO.png" alt="">
		</div>
		<!--头部右侧菜单-->
		<div class="pull-right logo-right">

			<div class="item">
				<a class="btn btn-primary" href="javascript:;">
					<i class="glyphicon glyphicon-user"></i>
					<span>用户：<?php echo ($user["user"]); ?></span>
				</a>
			</div>
			<div class="item">
				<a class="btn btn-primary" href="<?php echo U('admin/systemconfig/allocation/amendpass',array('id'=>$user['id']));?>" data-get-confirm="确认要退出登录吗？" role-loading="请稍候..." role-ajax="1">
					<i class="glyphicon glyphicon-pencil"></i>
					密码修改
				</a>
			</div>
			<div class="item">
				<a class="btn btn-primary" href="<?php echo U('admin/home/index/index');?>"><i class="glyphicon glyphicon-map-marker">
					</i><span>后台首页</span></a>
			</div>

			<div class="item">
				<a class="btn btn-primary" href="<?php echo U('home/index/index');?>" target="_blank">
					<i class="glyphicon glyphicon-home"></i>网站首页</a>
			</div>

			<div class="item">
				<a class="btn btn-primary" href="<?php echo U('admin/home/admin/out_login');?>" data-get-confirm="确认要退出登录吗？" role-loading="请稍候..." role-ajax="1">
					<i class="glyphicon glyphicon-off"></i>
					退出登录
				</a>
			</div>
			<br/>
			<!--表，时钟-->
			<div class="clock" style="position: absolute;left: 80%;top:40px;">
				<div id="Date"></div>
				<ul>
					<li id="hours"></li>
					<li id="point">:</li>
					<li id="min"></li>
					<li id="point">:</li>
					<li id="sec"></li>
				</ul>
			</div>
		</div>

	</div>
	<!--一级菜单-->
	<div id="menu-1">
		<div class="text-content logo-right">
			<div class="item">
				<a class="btn btn-primary" href="<?php echo U('admin/home/index/index');?>"><i class="glyphicon glyphicon-map-marker">
					</i><span>首页</span></a>
			</div>
			<?php if(is_array($top_menu)): foreach($top_menu as $key=>$v): ?><div class="item">
					<a class="btn btn-primary <?php if(strtolower($v['top'])==strtolower($top_active)){ echo 'active';} ?>" href="javascript:;" data-menu="/awin_mvc/index.php/admin/home/index/menu_panel?top=<?php echo ($v['top']); ?>">
						<i class="<?php echo ($v["icon"]); ?>"></i>
						<span><?php echo ($v["name"]); ?></span>
					</a>
				</div><?php endforeach; endif; ?>
		</div>
	</div>
	<div class="clearfix"></div>
</div>

<!--下面主要区域-->
<div id="wrap">
	<!--二级和三级菜单-->
	<div id="leftBox" style="overflow: auto;">
		<div class="menu-panel">
			<?php echo ($menu_panel); ?>
			
		</div>

	</div>
	<!--主要内容区域-->
	<div id="contentBox">
		<!--面包屑导航-->
		<div id="currentBar">
			<ol class="breadcrumb">
				<li class="title">
					<i class="glyphicon glyphicon-map-marker"></i>
					<span id="currentBar_span">当前位置</span>
				</li>
				<!--面包屑导航示例-->
				<li><a href="<?php echo U('admin/home/index/index');?>">首页</a></li>

				<?php if($menu_name['name']): ?><li><a href="javascript:;"><?php echo ($menu_name["name"]); ?></a></li>
					<?php else: endif; ?>

			</ol>
			<div class="clearfix"></div>
		</div>
		<!--主要内容区域主要部分-->
		<div id="rightBox">
			<div class="margin_content">
				

	<div class="form-group">
		<form class="form-horizontal" action="" method="post">
			<?php if(empty($id)): else: ?>
				<input type="hidden" name="id" value="<?php echo ($id); ?>"><?php endif; ?>
			<div class="col-sm-11" style="margin: 15px 0px;">
				<p class="bg-primary" style="padding: 8px 10px;font-size: 16px;">
					<?php if(($a) == "edit"): ?>修改
						<?php else: ?>
						添加<?php endif; ?>
					附件分类
				</p>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label"><i class="must"></i>&nbsp;&nbsp;分类名称</label>

				<div class="col-sm-4">
					<input type="text" name="name" class="form-control" placeholder="分类名称" value="<?php echo ($field["name"]); ?>">
				</div>
				<div class="col-sm-6"><span class="help-block">设置附件分类名称</span></div>
			</div>
			<div id="prep" style="width: 100%">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label"><i class="must"></i>&nbsp;&nbsp;分类标识</label>

					<div class="col-sm-4">
						<?php if(($field["is_system"]) == "1"): ?><p class="form-control-static"><?php echo ($field["enname"]); ?></p>
							<?php else: ?>
							<input type="text" name="enname" class="form-control" placeholder="分类标识" value="<?php echo ($field["enname"]); ?>"><?php endif; ?>
					</div>
					<div class="col-sm-6"><span class="help-block">字母、数字、下划线</span></div>
				</div>
			</div>
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label"><i class="must"></i>&nbsp;&nbsp;附件类型</label>

				<div class="col-sm-4">
					<?php if(($field["is_system"]) == "1"): ?><p class="form-control-static"><?php echo ($type[$field['type']]); ?></p>
						<input type="hidden" id="type" value="<?php echo ($field['type']); ?>">
						<?php else: ?>
						<select name="type" class="form-control">
							<option value="">请选择附件类型</option>
							<?php if(is_array($type)): foreach($type as $k=>$vo): ?><option value="<?php echo ($k); ?>"
								<?php if(($k) == $field['type']): ?>selected<?php endif; ?>
								><?php echo ($vo); ?></option><?php endforeach; endif; ?>
						</select><?php endif; ?>
				</div>
				<div class="col-sm-6"><span class="help-block">选择附件分类</span></div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">系统配置</label>

				<div class="col-sm-4">
					<?php if(($field["is_system"]) == "1"): ?><p class="form-control-static">系统配置</p>
						<?php else: ?>
						<label class="radio-inline"><input type="radio" value="1" name="is_system"
							<?php if(($field["is_system"]) == "1"): ?>checked<?php endif; ?>
							/>是</label>
						<label class="radio-inline"><input type="radio" value="0" name="is_system"
							<?php if(($field["is_system"]) == "0"): ?>checked<?php endif; ?>
							/>否</label><?php endif; ?>
				</div>
				<div class="col-sm-6"><span class="help-block"><?php if(($field["is_system"]) == "1"): ?>系统配置项，无法删除及修改
							<?php else: ?>
							如果设置为<code>是</code>则不能删除和修改标识以及附件类型<?php endif; ?></span></div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">排序</label>

				<div class="col-sm-4">
					<input type="text" name="showorder" class="form-control" placeholder="排序" size="5" value="<?php echo ($field["showorder"]); ?>">
				</div>
				<div class="col-sm-6"><span class="help-block">数字越小排序越靠前</span></div>
			</div>





	<div class="form-group m-b-0" id="formSubmit">
		<div class="col-sm-offset-2 col-sm-10">

			<input type="submit" class="btn btn-primary" value="<?php if(empty($id)): ?>增加<?php else: ?>修改<?php endif; ?>">
			<input type="reset" class="btn btn-default" value="重置">
		</div>
	</div>
	</form>
	</div>



			</div>
		</div>

	</div>
</div>
<!--底部自定义内容-->



</body>
<script type="text/javascript">
	$(function(){

		$(window).resize(function() {
			//后台首页框架自适应高度@韩威兵
			var look_height=$(window).height();
			//判断可是区域的高度；
			if(look_height<450){
				look_height=450;
			}
			var scr_height=look_height-175;
			var left_height=scr_height+30;
			scr_height=scr_height;
			$('#leftBox').css('height',left_height);
			$('#rightBox').css('height',scr_height);
		});
	});

	//  一级菜单点击
	$('.item a').on('click', function () {
		$('.item a').removeClass('active');
		$(this).addClass('active');
		var url = $(this).attr('data-menu');
		$.ajax({
			url     : url,
			type    : 'get',
			success : function (data) {
				if (data.status == 1) {
					$('.menu-panel').html(data.info);
				}
			}
		})
	});

	//二级菜单点击显示或隐藏
	function two(id){
		var two = $('.'+id).css('display');
		if (two == 'block') {
			$('.'+id).css('display', 'none');
			$('.domn-'+id).removeClass('glyphicon-chevron-up');
			$('.domn-'+id).addClass('glyphicon-chevron-down');
		} else {
			$('.'+id).css('display', 'block');
			$('.domn-'+id).removeClass('glyphicon-chevron-down');
			$('.domn-'+id).addClass('glyphicon-chevron-up');
		}
	}

</script>
</html>