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
	
	<script src="/awin_mvc/Public/js/layer/layer.js"></script>
	<style>
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
		.checkbox { margin-left: 10px; margin-right: 10px; }
		.table_name {
			margin-left: 10px;
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
			<!--<img src="/awin_mvc/Public/img/backgrounds/LOGO.png" alt="">-->
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
				
	<form class="form" method="post" action="javascript:;">
		<div class="form-inline" id="btn-family-left">
			<div style="float: left">
				<button type="button" disabled="disabled" data-url="<?php echo U('do_back');?>" class="btn btn-primary btn_back btn_back_backup">
					<i class="glyphicon glyphicon-play-circle"></i>&nbsp;开始备份
				</button>

			</div>
			<div style="float: left">
				<!--<input type="hidden" name="g" value="system">
				<input type="hidden" name="m" value="db">
				<input type="hidden" name="a" value="index">-->
				<div class="form-group table_name">
					<div class="input-group">
						<div class="input-group-addon">表名称</div>
						<input class="form-control search_name" type="text" placeholder="请输入关键字">
					</div>
				</div>

				<label class="checkbox">
					<input type="checkbox"  name="accurate" value="1">&nbsp;精确搜索
				</label>
				<button class="btn btn-info search_btn" data-url="<?php echo U('back');?>" type="submit">搜索</button>
				&nbsp;
				<a class="btn btn-default"  data-url="<?php echo U('back');?>" href="">显示全部</a>

			</div>
		</div>
		<div id="btn-family-right">
			<button class="btn btn-warning" id="backup"><i class="glyphicon glyphicon-cog"></i>备份设置</button>
		</div>

		<div class="clear"></div>
		<div style="margin: 20px" class="panel panel-primary">

			<div class="panel-heading"><?php echo ($menu_name["name"]); ?></div>
			<div class="option-menu" id="backup-settings" style="display: none; margin-top: 15px; border-bottom: solid 1px #337AB7">
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label">每组备份</label>
						<div class="col-sm-4">
							<div class="input-group">
								<input type="text" name="line" class="form-control" value="500">
								<div class="input-group-addon">条记录</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">备份选项</label>
						<div class="col-sm-4">
							<label class="radio-inline"><input type="radio" name="option" value="0" checked="" id="common_radio">普通备份</label>
							<label class="radio-inline"><input type="radio" name="option" value="1" id="install_radio">生成安装数据</label>
						</div>
						<div class="col-sm-6"><p class="help-block"></p></div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">备份名称</label>
						<div class="col-sm-4">
							<div class="input-group">
								<input type="text" name="name" id="install_name" class="form-control" value="data_<?php echo date('Ymd_His');?>">
								<div class="input-group-btn">
									<a href="javascript:;" id="layer" class="btn btn-default">选择目录</a></div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">备份说明</label>
						<div class="col-sm-6">
							<textarea name="explain" class="form-control"></textarea>
						</div>
						<div class="col-sm-4"><p class="help-block">系统会生成一个README.txt</p></div>
					</div>
					<!--<div class="form-group">
						<label class="col-sm-2 control-label">不备份的字段</label>
						<div class="col-sm-6">
							<textarea class="form-control" rows="5" name="delete_fields"></textarea>
						</div>
						<div class="col-sm-4"><p class="help-block">格式：<code>表名.字段名</code>，多个请用回车格开，一般不需要设置</p></div>
					</div>-->
				</div>
			</div>
			<table class="table">
				<thead>
				<tr class="header_mune">
					<th width="80"><input id="all" type="checkbox"></th>
					<th>序列</th>
					<th>表名称</th>
					<th>大小</th>
					<th>记录数</th>
					<th>编码</th>
					<th>类型</th>
					<th>碎片</th>
					<th>表备注</th>
				</tr>
				</thead>
				<tbody id="content_table">
				<?php if(is_array($list)): foreach($list as $k=>$v): ?><tr>
						<td><input class="other_input" name="mysql_table_name[]" type="checkbox" value="<?php echo ($v["name"]); ?>">
						</td>
						<td class="left_name_data"><?php echo ($k); ?></td>
						<td class="left_name_data"><?php echo ($prefix); echo ($v["name"]); ?></td>
						<td class="left_name_data"><?php echo ($v["size"]); ?></td>
						<td class="left_name_data"><?php echo ($v["rows"]); ?></td>
						<td class="left_name_data"><?php echo ($v["charset"]); ?></td>
						<td class="left_name_data"><?php echo ($v["type"]); ?></td>
						<td class="left_name_data"><?php echo ($v["patch"]); ?></td>
						<td class="left_name_data"><?php echo ($v["annotate"]); ?></td>

					</tr><?php endforeach; endif; ?>

				</tbody>

			</table>
			<div class="panel-footer">
				<button type="button" data-url="<?php echo U('empty_table');?>" disabled="disabled" class="btn btn-warning btn_back">
					<i class="glyphicon glyphicon-ban-circle"></i> &nbsp;清空数据表
				</button>
				<button type="button" disabled="disabled" data-url="<?php echo U('delete_table');?>" class="btn btn-danger btn_back">
					<i class="glyphicon glyphicon-trash"></i> &nbsp;删除数据表
				</button>
				<button type="button" disabled="disabled" data-url="<?php echo U('optimize_table');?>" class="btn btn-success btn_back">
					<i class="glyphicon glyphicon-th"></i>&nbsp;优化数据表
				</button>
			</div>
		</div>


	</form>
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
		//搜索
		$('.search_btn').on('click',function(){

			var name=$('.search_name').val();
			var search_url=$(this).attr('data-url');
			$.ajax({
				url     : search_url,
				data    : {search_data:name},
				type    : 'post',
				success : function (data) {
					$('#content_table').html(data.info);
				}
			});

		});
		//删除，优化，清空数据库
		$('.btn_back').on('click', function () {
			var url = $(this).attr('data-url');

			var operate_name = $(this).text();
			var from_data    = $('.form').serialize();
			var index        = layer.confirm('确认' + operate_name + '吗？', {
				btn : ['确定', '我想想'] //按钮
			}, function () {
				//确定执行
				layer.close(index);
				//页面层
				$.ajax({
					url     : url,
					data    : from_data,
					async   : true,
					type    : 'post',
					success : function (data) {
						if (data.status == 1) {
							layer.alert(data.info, {icon : 1}, function () {
								location = location;
							});

						} else {
							layer.alert(data.info, {icon : 2});
						}
					}
				});
			}, function () {
			});
		});

		//执行备份
		$('.btn_back_backup').on('click', function () {
			var url   = $(this).attr('data-url');
			var data  = $('.form').serialize();
			var index = layer.confirm('确认备份吗？', {
				btn : ['备份', '我想想'] //按钮
			}, function () {
				//确定执行
				layer.close(index);
				//页面层
				$.ajax({
					url     : url,
					data    : data,
					async   : true,
					type    : 'post',
					success : function (data) {
						$('.black_screen').css('display', 'block');
						detail_data_info(data.info, 1);
						detail_data_info('正在备份下一张表,' + data.next_table_name + '的结构', 0);
						detail_data_info('正在备份下一张表,' + data.next_table_name + '的数据', 0);

						var percent_number = (data.size / (data.totle - 1)) * 100;
						$('.progress-bar').css('width', percent_number + '%');
						ajax_for(data);
					}
				});
			}, function () {
			});
		});
		//只有选中表名称按钮才能有效，否则无效
		$('.other_input').on('change', function () {
			var is_checked = $('.other_input').is(':checked');
			if (is_checked) {
				btn_disabled(0);
			} else {
				btn_disabled(1);
			}
		});

		//备份设置，修改备份目录名称，普通备份事件
		$('#common_radio').click(function () {
			var value  = $('#install_name').val();
			var value2 = 'data' + value.substring(4, 20);
			$('#install_name').val(value2);
		});

		//备份设置，修改备份目录名称，生成安装数据备份
		$('#install_radio').click(function () {
			var value  = $('#install_name').val();
			var value2 = 'root' + value.substring(4, 20);
			$('#install_name').val(value2);
		});

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

			var flip = 0;
			$("#backup").click(function () {
				$("#backup-settings").toggle(flip++ % 2 == 0);
			});

			//全选
			$('#all').on('click', function () {
				var ischeck = $(this).is(':checked');
				if (ischeck) {
					$('.other_input').prop('checked', true);
					btn_disabled(0);
				} else {
					$('.other_input').prop('checked', false);
					btn_disabled(1);
				}
			});
			//选择目录
			$('#layer').on('click', function () {
				layer.open({
					type       : 2,
					title      : '选择目录',
					maxmin     : true,
					shadeClose : true, //点击遮罩关闭层
					area       : ['800px', '520px'],
					content    : '<?php echo U('dir_select');?>'
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

						detail_data_info(da.info, 1);
						detail_data_info('正在备份下一张表,' + da.next_table_name + '的结构', 0);
						detail_data_info('正在备份下一张表,' + da.next_table_name + '的数据', 0);

						var percent_number = (da.size / (da.totle - 1)) * 100;
						$('.progress-bar').css('width', percent_number + '%');
						$(".detail-message").scrollTop($(".detail-message")[0].scrollHeight);
						if (percent_number <= 100) {
							ajax_for(da);
						}

					} else {
						$('.progress-bar').removeClass('active');
						//询问框
						var layer_index = layer.confirm('备份完成！', {
							btn : ['确定'] //按钮
						}, function () {
							$('.black_screen').css('display', 'none');
							layer.close(layer_index);
						}, function () {

						});
					}

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
		/**
		 * 按钮失效或启用
		 */
		function btn_disabled(is_disabled) {
			if (is_disabled == 1) {
				$('.btn_back').attr('disabled', 'disabled');
			} else {
				$('.btn_back').removeAttr('disabled');
			}
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