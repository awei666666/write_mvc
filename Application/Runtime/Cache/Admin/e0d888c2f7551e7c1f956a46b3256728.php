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
		.content-padding{
			padding: 15px ;
		}
		.black_screen {
			width: 84%;
			height: 1500px;
			background: rgba(22, 22, 22, 0.5);
			position: absolute;
			z-index: 9999;
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
	<script src="/awin_mvc/Public/js/layer/layer.js"></script>

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

		<div class="alert alert-danger">数据恢复会影响到现有的数据，且不可恢复，请谨慎操作！</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="pull-left"><h3 class="panel-title">数据库还原</h3></div>
				<div class="clearfix"></div>
			</div>
			<div class="panel-body">
				<form action="javascript:; " method="post" class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label must">选择备份目录</label>
						<div class="col-sm-4">
							<div class="input-group">
								<input type="text" id="install_name" name="name" class="form-control" value="">
								<div class="input-group-btn">
									<button id="layer" type="button" class="btn btn-default">选择目录</button>
								</div>
							</div>
						</div>
						<div class="col-sm-6"><span class="help-block">请选择要还原的备份目录</span></div>
					</div>
					<div class="form-group m-b-0">
						<div class="col-sm-offset-2 col-sm-10">
							<input type="submit" class="btn btn-success do_recover" value="立即还原">
							<input type="reset" class="btn btn-default" value="重置">
						</div>
					</div>
				</form>
			</div>
		</div>

	</div>

	<div class="black_screen">

		<div class="col-sm-5 message-info">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">详细信息</h3>
				</div>
				<div class="panel-body">
					<div class="progress">
						<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">

						</div>
						<div>正在加载中……请耐心等待</div>
					</div>
					<div class="detail-message">
						<div class=""><i class="glyphicon glyphicon-ok info-red"></i>　尽快还款计划考核科技</div>
					</div>

				</div>
			</div>
		</div>


	</div>







			</div>
		</div>

	</div>
</div>
<!--底部自定义内容-->

	<script>
		var obj_detail_message = $('.detail-message');
		//选择目录
		$('#layer').on('click', function () {
			layer.open({
				type       : 2,
				title      : '选择目录',
				maxmin     : true,
				shadeClose : true, //点击遮罩关闭层
				area       : ['800px', '520px'],
				content    : '<?php echo U('dir_recover');?>'
			});
		});
		//执行还原
		$('.do_recover').on('click',function(){

				var input_dir_name=$('#install_name').val();
				//页面层
				$.ajax({
					url     : "<?php echo U('do_recover');?>",
					data    : {name:input_dir_name},
					async   : true,
					type    : 'post',
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
						detail_data_info('正在还原下一张表,' + da.next_table_name + '的结构', 0);
						detail_data_info('正在还原下一张表,' + da.next_table_name + '的数据', 0);

						var percent_number = (da.size / (da.totle - 1)) * 100;
						$('.progress-bar').css('width', percent_number + '%');
						$(".detail-message").scrollTop($(".detail-message")[0].scrollHeight);
						if (percent_number <= 100) {
							ajax_for(da);
						}

					}else {
						$('.progress-bar').removeClass('active');
						//询问框
						var layer_index = layer.confirm('还原成功！', {
							btn : ['确定'] //按钮
						}, function () {
							$('.black_screen').css('display', 'none');
							layer.close(layer_index);
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