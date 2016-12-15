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
		.panel {
			border: none;
		}
		.top-list {
			background-color: #d9edf7;
			padding: 10px;
		}
		.two-list {
			background-color: #dff0d8;
			padding: 5px;
			padding-left: 30px;
		}
		.three-list {
			padding: 0 5px 4px 51px;
			/*padding-left: 51px;*/
		}
		.checkbox {
			margin: 5px 25px 10px 5px;
			/*margin-right: 25px;*/
			/*margin-top: 5px;*/
		}
		.clear {
			clear: both;
		}
		.tab-content .help-block {
			color: #666;
			font-size: 12px;
		}
		.form-group-title {
			background-color: #e8e8e8;
			padding: 3px 8px;
			margin-bottom: 20px;
			background-image: linear-gradient(to bottom, #f5f5f5 0%, #e8e8e8 100%);
			background-repeat: repeat-x;
			border: 1px #ddd solid;
			border-radius: 3px;
			font-size: 12px;
		}
		.panel-body { border: 1px solid #ddd; border-top: none; }
		#sizebox { display: none }

		@keyframes evenflow_shake {
			0% { transform: scale(1); }

			100% { transform: scale(3);  }
		}


		#water:hover{
			animation-name: evenflow_shake;
			animation-duration:500ms;

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
				
	<div class="content-padding">
		<div class="panel-heading-tab">
			<ul class="nav nav-tabs" role="tablist">
				<li class="active">
					<a href="#base" aria-controls="base" role="tab" data-toggle="tab" aria-expanded="true">基本设置</a></li>
				<li class="">
					<a href="#watermark" aria-controls="watermark" role="tab" data-toggle="tab" aria-expanded="false">水印设置</a>
				</li>
				<li class="">
					<a href="#senior" aria-controls="senior" role="tab" data-toggle="tab" aria-expanded="false">高级设置</a>
				</li>
			</ul>
		</div>
		<div class="panel panel-default panel-tab">



			<div class="panel-body">
				<form action="" method="post" class="form-horizontal"  enctype="multipart/form-data">
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="base">
							<div class="form-group-title">基本设置</div>
							<div class="form-group">
								<label class="col-sm-2 control-label must">附件存放目录</label>

								<div class="col-sm-4">
									<input type="text" class="form-control" name="data[save_path]" value="<?php echo ($field["save_path"]); ?>"/>
								</div>
								<div class="col-sm-6"><span class="help-block">从根目录算起，如：<code>/data/file/</code>结尾需要添加反斜杠</span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">目录存放格式</label>

								<div class="col-sm-4">
									<select class="form-control" name="data[format]">
										<option value="">不设置目录</option>
										<optgroup label="日期格式">
											<option value="Ymd"
											<?php if(($field["format"]) == "Ymd"): ?>selected="selected"<?php endif; ?>
											>年月日</option>
											<option value="Y/md"
											<?php if(($field["format"]) == "Y/md"): ?>selected="selected"<?php endif; ?>
											>年/月日</option>
											<option value="Y/m/d"
											<?php if(($field["format"]) == "Y/m/d"): ?>selected="selected"<?php endif; ?>
											>年/月/日</option>
											<option value="Y/m/d/H"
											<?php if(($field["format"]) == "Y/m/d/H"): ?>selected="selected"<?php endif; ?>
											>年/月/日/时</option>
											<option value="Y/mdH"
											<?php if(($field["format"]) == "Y/mdH"): ?>selected="selected"<?php endif; ?>
											>年/月日时</option>
											<option value="YmdH"
											<?php if(($field["format"]) == "YmdH"): ?>selected="selected"<?php endif; ?>
											>年月日时</option>
										</optgroup>
									</select>
								</div>
								<div class="col-sm-6"><span class="help-block">设置目录存放格式，从附件目录算起</span></div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">后台允许上传类型</label>

								<div class="col-sm-4">
									<input type="text" class="form-control" name="data[admin_type]" value="<?php echo ($field["admin_type"]); ?>"/>
								</div>
								<div class="col-sm-6"><span class="help-block">多个请用<code>,</code>号隔开，如：jpg,png,exe，不限请留空</span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">后台允许上传大小</label>

								<div class="col-sm-4">
									<input type="text" class="form-control" name="data[admin_size]" value="<?php echo ($field["admin_size"]); ?>"/>
								</div>
								<div class="col-sm-6">
									<span class="help-block">单位<code>KB</code>，不限请填<code>0</code></span></div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">前台允许上传类型</label>

								<div class="col-sm-4">
									<input type="text" class="form-control" name="data[home_type]" value="<?php echo ($field["home_type"]); ?>"/>
								</div>
								<div class="col-sm-6"><span class="help-block">多个请用<code>,</code>号隔开，如：jpg,png,exe，不限请留空</span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">前台允许上传大小</label>

								<div class="col-sm-4">
									<input type="text" class="form-control" name="data[home_size]" value="<?php echo ($field["home_size"]); ?>"/>
								</div>
								<div class="col-sm-6">
									<span class="help-block">单位<code>KB</code>，不限请填<code>0</code></span></div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">上传密匙</label>

								<div class="col-sm-4">
									<div class="input-group">
										<input type="text" class="form-control" name="data[token]" id="token" value="<?php echo ($field["token"]); ?>"/>

										<div class="input-group-btn">
											<button class="btn btn-default" type="button" data-rand="32" role-target="#token">随机</button>
										</div>
									</div>
								</div>
								<div class="col-sm-6"><span class="help-block">16-32位随机字符串</span></div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="watermark">
							<div class="form-group-title">水印设置</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">水印文件</label>

								<div class="col-sm-4">
									<input type="text" class="form-control" name="data[watermark_file]"  value="<?php echo ($field["watermark_file"]); ?>"/>
								</div>
								<div class="col-sm-6">
									<span class="help-block"><?php if(!empty($field["watermark_file"])): ?><img id="water" src="/awin_mvc/<?php echo ($field["watermark_file"]); ?>" height="30"><?php endif; ?></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">更改水印</label>

								<div class="col-sm-4">
									<input type="file" class="form-control" name="water"  multiple="multiple"/>
								</div>

							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">水印位置</label>

								<div class="col-sm-4">
									<select class="form-control" name="data[watermark_position]">
										<option value="1"
										<?php if(($field["watermark_position"]) == "1"): ?>selected<?php endif; ?>
										>左上角</option>
										<option value="2"
										<?php if(($field["watermark_position"]) == "2"): ?>selected<?php endif; ?>
										>上中上</option>
										<option value="3"
										<?php if(($field["watermark_position"]) == "3"): ?>selected<?php endif; ?>
										>右上角</option>
										<option value="4"
										<?php if(($field["watermark_position"]) == "4"): ?>selected<?php endif; ?>
										>左中左</option>
										<option value="5"
										<?php if(($field["watermark_position"]) == "5"): ?>selected<?php endif; ?>
										>中心</option>
										<option value="6"
										<?php if(($field["watermark_position"]) == "6"): ?>selected<?php endif; ?>
										>右中右</option>
										<option value="7"
										<?php if(($field["watermark_position"]) == "7"): ?>selected<?php endif; ?>
										>左下角</option>
										<option value="8"
										<?php if(($field["watermark_position"]) == "8"): ?>selected<?php endif; ?>
										>下中下</option>
										<option value="9"
										<?php if(($field["watermark_position"]) == "9"): ?>selected<?php endif; ?>
										>右下角</option>
									</select>
								</div>
								<div class="col-sm-6"></div>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="senior">
							<?php if(is_array($file_class)): $i = 0; $__LIST__ = $file_class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r): $mod = ($i % 2 );++$i;?><input type="hidden" class="form-control" name="id[]" value="<?php echo ($r["id"]); ?>"/>
								<div class="file_class">
									<div class="form-group-title">
										<span class="label label-success pull-right"><?php echo ($r["enname"]); ?></span><?php echo ($r["name"]); ?>
										<div class="clearfix"></div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">允许上传类型</label>

										<div class="col-sm-4">
											<div class="input-group">
												<div class="input-group-addon"><?php echo ($type[$r['type']]); ?></div>
												<input type="text" class="form-control" name="class[<?php echo ($key); ?>][suffix]" value="<?php echo ($r["suffix"]); ?>"/>
											</div>
										</div>
										<div class="col-sm-6"><span class="help-block">多个请用<code>,</code>号隔开，如：jpg,exe，不限请留空，-1代表调用系统基本配置</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">mimeType</label>

										<div class="col-sm-4">
											<div class="input-group">
												<div class="input-group-addon"><?php echo ($type[$r['type']]); ?></div>
												<input type="text" class="form-control" name="class[<?php echo ($key); ?>][mimetype]" value="<?php echo ($r["mimetype"]); ?>"/>
											</div>
										</div>
										<div class="col-sm-6"><span class="help-block">多个请用<code>,</code>号隔开，如：image/jpg,image/gif，不限请留空</span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">允许上传大小</label>

										<div class="col-sm-4">
											<div class="input-group">
												<input type="text" class="form-control" name="class[<?php echo ($key); ?>][size]" id="" value="<?php echo ($r["size"]); ?>"/>

												<div class="input-group-addon">KB</div>
											</div>
										</div>
										<div class="col-sm-6"><span class="help-block">0 为不限制，-1 则调用系统基本配置</span></div>
									</div>
									<?php if(($r["type"]) == "image"): ?><div class="form-group">
											<label class="col-sm-2 control-label">缩放设置</label>

											<div class="col-sm-4">
												<label class="checkbox-inline"><input type="checkbox" class="is_thumb" name="class[<?php echo ($key); ?>][is_thumb]" value="1"
													<?php if(($r["is_thumb"]) == "1"): ?>checked<?php endif; ?>
													/>缩放图片</label>
												<label class="checkbox-inline"><input type="checkbox" name="class[<?php echo ($key); ?>][delete_source]" value="1"
													<?php if(($r["delete_source"]) == "1"): ?>checked<?php endif; ?>
													/>不保留原图</label>
												<label class="checkbox-inline"><input type="checkbox" name="class[<?php echo ($key); ?>][watermark]" value="1"
													<?php if(($r["watermark"]) == "1"): ?>checked<?php endif; ?>
													/>加水印</label>
											</div>
											<div class="col-sm-6"></div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">缩放方式</label>
											<div class="col-sm-4">
												<select class="form-control" name="class[<?php echo ($key); ?>][thumb_type]">
													<option value="1"
													<?php if(($r["thumb_type"]) == "1"): ?>selected<?php endif; ?>
													>等比例缩放</option>
													<option value="2"
													<?php if(($r["thumb_type"]) == "2"): ?>selected<?php endif; ?>
													>缩放后填充</option>
													<option value="3"
													<?php if(($r["thumb_type"]) == "3"): ?>selected<?php endif; ?>
													>居中裁剪</option>
													<option value="6"
													<?php if(($r["thumb_type"]) == "6"): ?>selected<?php endif; ?>
													>固定尺寸缩放</option>
												</select>
											</div>
											<div class="col-sm-6"></div>
										</div>
										<?php if($r["is_thumb"] == 1): ?><div class="form-group"  id="sizebox"style="display:block" >
										<?php else: ?>
											<div class="form-group"  id="sizebox" ><?php endif; ?>
											<label class="col-sm-2 control-label">图片大小及数量</label>
											<div class="col-sm-4">
												<textarea class="form-control" name="class[<?php echo ($key); ?>][pics_size]" rows="4"><?php echo ($r["pics_size"]); ?></textarea>
											</div>
											<div class="col-sm-4">
												<span class="help-block">一行一条，格式：<code>字段名==宽*高</code>，<br/>有多少行则代表生成多少种缩图</span>
											</div>
										</div><?php endif; ?>
								</div><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>
				<div class="form-group m-b-0">
					<div class="col-sm-offset-2 col-sm-10">
						<input type="submit" class="btn btn-primary" value="设置"/>
						<input type="reset" class="btn btn-default" value="重置"/>
					</div>
				</div>
			</form>
			</div>
		</div>
	</div>

			</div>
		</div>

	</div>
</div>
<!--底部自定义内容-->

	<script type="text/javascript">
		/**
		 * 自动随机字符串组件
		 */
		$.getRandString = function (line, callback) {
			$.post("<?php echo U('get_rand_string');?>", {'line' : line}, function (data) {
				callback(data);
			});
		};
		$(document).on('click.data_rand', "[data-rand]", function () {
			var $this   = $(this),
				$target = $($this.attr('role-target')),
				line    = $this.data('length') || $this.data('rand'),
				tip     = $this.data('tip') || '请稍后',
				defTip  = $this.val() || $this.text(),
				tagName = $this[0].tagName;
			if ($this.prop('disabled')) {
				return false;
			}
			$this.prop('disabled', true);
			if (tagName === 'INPUT') {
				$this.val(tip);
			} else {
				$this.html(tip);
			}
			$.getRandString(line, function (data) {
				$this.prop('disabled', false);
				if (tagName === 'INPUT') {
					$this.val(defTip);
				} else {
					$this.html(defTip);
				}
				$target.val(data);
			});
		});
		$("input[type=checkbox].is_thumb").click(function () {
			if ($(this).prop("checked")) {
				$(this).parents(".form-group").siblings("#sizebox").show()
			} else {
				$(this).parents(".form-group").siblings("#sizebox").hide()
			}
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