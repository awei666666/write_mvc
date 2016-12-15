<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE HTML>
<html style="min-width: 1000px; min-height: 1800px">
<head>
	<title>粮易网后台管理系统</title>
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
		.content-padding {
			padding-top: 15px;
		}
		.hover {
			background-color: #cceeff;
			color: #333;
		}
		table {
			border-collapse: separate;
			border-spacing: 0;
		}
		table th, table td {
			border-right: #888 1px dashed;
			text-align: center;
		}
		.header_mune {
			/*background-color: #eeeeee;*/
			background: rgba(0, 0, 0, 0) -moz-linear-gradient(center top, #f9f9f9, #e0e0e0) repeat scroll 0 0;
		}
		.on {
			background-color: #00A2D4;
		}
		.red {
			color: #d43f3a;
		}
		#btn-family-left {
			margin: 10px 0 -10px 20px;
			float: left;
		}
		#btn-family-right {
			margin: 10px 30px -10px 20px;
			float: right;
		}
		.clear {
			clear: both;
		}
		.button-footer { margin: 20px; }
		.input-left { float: left; width: 150px; margin-left: 10px; }
		.input-left2 { float: left; width: 50px; margin-left: 10px; }
		.checkbox { float: left; margin-left: 15px; }

	</style>

</head>
<style>

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
				
	<div class="content-padding">

		<div id="btn-family-left">

			<div style="float: left">
				<input type="hidden" name="g" value="system">
				<input type="hidden" name="m" value="db">
				<input type="hidden" name="a" value="index">
				<form style="display: inline;" method="post" action="<?php echo U('catalog');?>">
					<select class="form-control input-left" name="field">
						<option value="table">表名称</option>
					</select>

					<input class="form-control input-left search_name" name="search_name" value="<?php echo ($search_name); ?>" placeholder="请输入关键字">
					<button class="btn btn-info  input-left2" type="submit">搜索</button>

					&nbsp;
					<a class="btn btn-default " href="">显示全部</a>
				</form>
			</div>

		</div>


		<div class="clear"></div>
		<div style="margin: 20px" class="panel panel-primary">
			<div class="panel-heading"><?php echo ($menu_name["name"]); ?></div>
			<table class="table">
				<thead>
				<tr class="header_mune">
					<th width="80"><input id="all" type="checkbox"></th>
					<th width="500">备份说明</th>
					<th>目录名称</th>
					<th>备份时间</th>
					<th>状态</th>
					<th>操作</th>
				</tr>
				</thead>
				<tbody>
				<form method="post" action="<?php echo U('delete_dir');?>">
					<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
							<td><input class="other_input" name="dir_name[]" type="checkbox" value="<?php echo ($v["name"]); ?>"></td>
							<td class="left_name_data"><?php echo ($v["content"]); ?></td>
							<td class="left_name_data"><?php echo ($v["name"]); ?></td>
							<td class="left_name_data"><?php echo date('Y-m-d H:i:s',$v['time']);?></td>

							<?php if($v['status'] == true ): ?><td class="left_name_data"><span class="label label-success f12">正常</span></td>
								<?php elseif($v['status'] == false): ?>
								<td class="left_name_data"><span class="label label-danger f12">失效</span></td>
								<?php else: ?>
								<td>异常</td><?php endif; ?>
							<td class="left_name_data">
								&nbsp;
								<a href="<?php echo U('delete_dir',array('dir_name'=>$v['name']));?>" title="删除备份" type="button" class="btn btn-danger btn-xs">
									<span class="glyphicon glyphicon-trash" aria-hidden="true">  删除备份</span>
								</a>
							</td>
						</tr><?php endforeach; endif; ?>


				</tbody>

			</table>

		</div>
		<div class="button-footer">
			<button class="btn btn-danger btn-sm" type="submit">删除目录</button>
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
			//表格鼠标划过效果
			$('table tr').hover(
				function () {
					$(this).addClass("hover");
				},
				function () {
					$(this).removeClass("hover");
				}
			);
			//点击显示全部
			$('.creal_search').on('click', function () {
				$('.search_name').val('');
				//href
			});

			//全选
			$('#all').on('click', function () {
				var ischeck = $(this).is(':checked');
				if (ischeck) {
					$('.other_input').prop('checked', true);
				} else {
					$('.other_input').prop('checked', false);
				}
			});
			//todo ly :按钮未选中不能点击
		/*	/!**
			 * 验证是否可以点击删除目录
			 *!/
			$('.other_input').on('change',function(){
				$('.other_input').is(':');
			});*/


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