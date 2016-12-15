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
		.hover {
			background-color: #ccc;
			color: #333;
		}
		table {
			border-collapse: separate;
			border-spacing: 0;
		}
		table th, table td {
			border-right: #888 1px dashed;
			text-align: center;
			font-size: 14px;
			font-weight: 500;
		}
		.left_name_data {
			padding-left: 30px;
			text-align: left;
		}
		.header_mune {
			/*background-color: #eeeeee;*/
			background: rgba(0, 0, 0, 0) -moz-linear-gradient(center top, #f9f9f9, #e0e0e0) repeat scroll 0 0;
		}
		.mune-top-tr {
			background-color: #d9edf7;
		}
		.mune-two-tr {
			background-color: #dff0d8;
		}
		.mune_two_name {
			background: url(/awin_mvc/Public/img/backgrounds/board.png) no-repeat -55px 3px;
			padding-left: 55px;
		}
		.mune_three_name {
			background: url(/awin_mvc/Public/img/backgrounds/board.png) no-repeat 0 3px;
			padding-left: 110px;
		}
		.mune_three_last {
			background: url(/awin_mvc/Public/img/backgrounds/mune_three_last.png) no-repeat 0 3px;
			padding-left: 110px;
		}
		.on {
			background-color: #00A2D4;
		}
		.red {
			color: #d43f3a;
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
				

	<div style="margin: 20px" class="panel panel-primary">

		<div class="panel-heading"><?php echo ($menu_name["name"]); ?></div>
		<form action="<?php echo U('delete');?>" method="post">
			<table class="table">
				<thead>
				<tr class="header_mune">
					<th width="80"><input id="all_id" type="checkbox"></th>
					<th width="80">id</th>
					<th width="100">排序</th>
					<th>栏目名称和图标</th>
					<th width="170">栏目标识</th>
					<th width="100">是否显示</th>
					<th width="80">等级</th>
					<th width="190">操作</th>
				</tr>
				</thead>
				<tbody>

				<?php if(is_array($list)): foreach($list as $key=>$v): if ($v['rank'] == 1) { $class = 'mune-top-tr'; } elseif ($v['rank'] == 2) { $class = 'mune-two-tr'; } else { $class = ''; } if ($v['is_show'] == 2) { $show = 'red'; } else { $show = ''; } $str_show = '<tr class="' . $class . '  ' . $show . '"">'; echo $str_show; ?>
					<td>
						<input class="other_id <?php echo ($v["top"]); ?>-<?php echo ($v["rank"]); ?> <?php echo ($v["top"]); ?>-<?php echo ($v["second"]); ?>-<?php echo ($v["rank"]); ?>" data-rank="<?php echo ($v["rank"]); ?>" data-index="<?php echo ($v["top"]); ?>-<?php echo ($v["second"]); ?>-<?php echo ($v["three"]); ?>" type="checkbox" name="id[]" value="<?php echo ($v["id"]); ?>">
					</td>
					<td><?php echo ($v["id"]); ?></td>
					<td><?php echo ($v["reorder"]); ?></td>
					<?php if($v['rank'] == 1): ?><td class="left_name_data"><?php echo ($v["name"]); ?></td>
						<?php elseif($v['rank'] == 2): ?>
						<td class="left_name_data ">
							<div class="mune_two_name"><?php echo ($v["name"]); ?></div>
						</td>
						<?php elseif(($v['rank'] == 3) and ($v['last'] == 0)): ?>
						<td class="left_name_data ">
							<div class="mune_three_name"><?php echo ($v["name"]); ?></div>
						</td>
						<?php elseif(($v['rank'] == 3) and ($v['last'] == 1)): ?>
						<td class="left_name_data ">
							<div class="mune_three_last"><?php echo ($v["name"]); ?></div>
						</td>
						<?php else: endif; ?>
					<?php if($v['rank'] == 1): ?><td><?php echo ($v["top"]); ?></td>
						<?php elseif($v['rank'] == 2): ?>
						<td><?php echo ($v["second"]); ?></td>
						<?php elseif(($v['rank'] == 3)): ?>
						<td><?php echo ($v["three"]); ?></td>
						<?php else: endif; ?>
					<?php if($v['is_show'] == 1): ?><td>显示</td>
						<?php elseif($v['is_show'] == 2): ?>
						<td class="red">隐藏</td>
						<?php else: endif; ?>
					<td><?php echo ($v["rank"]); ?></td>
					<td>
						<a href="<?php echo U('edit',array('id'=>$v['id']));?>" class="btn btn-success btn-xs glyphicon glyphicon-pencil"> 修改</a>　
						<a href="<?php echo U('data_delete',array('id'=>$v['id']));?>" class="btn btn-danger btn-xs glyphicon glyphicon-trash"> 删除</a>
					</td>
					</tr><?php endforeach; endif; ?>


				</tbody>

			</table>
			<div class="panel-footer">
				<button id="btu_del" type="submit" class="btn btn-default" disabled="disabled">&nbsp;&nbsp;删除</button>
			</div>
		</form>
	</div>


			</div>
		</div>

	</div>
</div>
<!--底部自定义内容-->

	<script>
		//鼠标滑动事件
		$(function () {
			$('table tr').hover(
				function () {
					$(this).addClass("hover");
				},
				function () {
					$(this).removeClass("hover");
				}
			);
			//全部选择事件
			$('#all_id').on('change', function () {
				if ($('#all_id').is(':checked')) {
					$('.other_id').prop('checked', true);
				} else {
					$('.other_id').prop('checked', false);
				}
			});
			//除了全选之外的选择
			$('.other_id').on('change', function () {
				var data     = $(this).attr('data-rank');
				var index    = $(this).attr('data-index').split('-');
				var is_check = $(this).is(':checked');

				if (data == 1) {
					if (is_check) {
						$('.' + index[0] + '-2').prop('checked', true);
						$('.' + index[0] + '-3').prop('checked', true);
					} else {
						$('.' + index[0] + '-2').prop('checked', false);
						$('.' + index[0] + '-3').prop('checked', false);
					}
				} else if (data == 2) {
					if (is_check) {
						$('.' + index[0] + '-' + index[1] + '-3').prop('checked', true);
					} else {
						$('.' + index[0] + '-' + index[1] + '-3').prop('checked', false);
					}
				}
				//选择下级菜单的所有选框
				var is_checked = $('.other_id').is(':checked');
				if(is_checked){
					$('#btu_del').removeAttr('disabled');
					$('#btu_del').removeClass('btn-default');
					$('#btu_del').addClass('btn-danger');
				}else {
					$('#btu_del').attr('disabled','disabled');
					$('#btu_del').removeClass('btn-danger');
					$('#btu_del').addClass('btn-default');
				}

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