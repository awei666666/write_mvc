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
		.menu-add-content {
			margin: 50px;
		}
		.icon{
			line-height: 37px;
			color: red;
		}

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
				

	<div class="menu-add-content">

		<form action="<?php echo ($url); ?>" method="post" class="form-horizontal">
			<input type="hidden" value="<?php echo ($field["id"]); ?>" name="id"/>
			<!---->
			<div class="form-group">
				<label class="col-sm-2 control-label must">栏目名称</label>

				<div class="col-sm-4">
					<input type="text" class="form-control must-input" name="name" value="<?php echo ($field["name"]); ?>"/></div>
				<div class="col-sm-6"><span class="help-block">请设置栏目名称</span></div>
			</div>
			<!---->
			<div class="form-group">
				<label class="col-sm-2 control-label must">栏目标识</label>

				<div class="col-sm-4">
					<input type="text" class="form-control must-input" name="index" value="<?php echo ($field["index"]); ?>"/>
				</div>
				<div class="col-sm-6"><span class="help-block">不能包含中文及特殊字符</span></div>
			</div>
			<!---->
			<div class="form-group">
				<label class="col-sm-2 control-label must">显示图标</label>

				<div class="col-sm-4">
					<input class="form-control must-input" type="text" name="icon" id="iconSelect" value="<?php echo ($field["icon"]); ?>"></select>
				</div>
				<?php if($field['icon']): ?><span class="icon">此菜单图标样式为：</span><i class="icon <?php echo ($field["icon"]); ?>"></i>
					<?php else: ?>
					<div class="col-sm-6"><span class="help-block">填写一个bootstrap图标来代表该栏目</span></div><?php endif; ?>

			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">所属顶级栏目</label>

				<div class="col-sm-4">
					<select class="form-control top" name="top">
						<option value="">请选择菜单</option>
						<?php if(is_array($top_data)): foreach($top_data as $key=>$v): ?><option <?php echo ($v["select"]); ?> value="<?php echo ($v["top"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
					</select>

				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label">所属上级栏目</label>

				<div class="col-sm-4">
					<select class="form-control" name="second">
						<option value="">请选择菜单</option>
						<?php if(is_array($two_data)): foreach($two_data as $key=>$vv): ?><option <?php echo ($vv["select"]); ?> value="<?php echo ($vv["second"]); ?>"><?php echo ($vv["name"]); ?></option><?php endforeach; endif; ?>
					</select>

				</div>
			</div>


			<div class="form-group">
				<label class="col-sm-2 control-label">是否显示</label>

				<div class="col-sm-4">
					<label class="radio-inline"><input name="is_show" type="radio" value="1" <?php echo ($field["show"]); ?> checked/>显示</label>
					<label class="radio-inline"><input name="is_show" type="radio" value="2" <?php echo ($field["no_show"]); ?>/>隐藏</label>
				</div>
				<div class="col-sm-6"><span class="help-block">设置<code>否</code>则不显示到左侧菜单中</span></div>
			</div>


			<div class="form-group">
				<label class="col-sm-2 control-label">排序</label>

				<div class="col-sm-4">
					<input type="text" class="form-control" name="reorder" value='<?php if($field['reorder']): echo ($field["reorder"]); else: ?>50<?php endif; ?>'/>
				</div>
				<div class="col-sm-6"><span class="help-block">数值越小，排的越前面</span></div>
			</div>

			<div class="form-group m-b-0">
				<div class="col-sm-offset-2 col-sm-10">
					<input type="submit" class="btn btn-primary" value="提交"/>
					<input type="reset" class="btn btn-default" value="刷新"/>
				</div>
			</div>
		</form>
	</div>


			</div>
		</div>

	</div>
</div>
<!--底部自定义内容-->

	<script>
		$(function () {
			$('.top').change(function () {
				var top_val = $('.top').val();
				$.ajax({
					url     : "<?php echo U('admin/developer/menu/ajax_second');?>",
					type    : 'post',
					data    : {top : top_val},
					success : function (data) {
						if (data.status == 1) {
							var option = '<option value="">菜单</option>' + data.info;
							$('.form-group').find('[name="second"]').html(option);
						}
					}
				})
			});

		});
	</script>

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