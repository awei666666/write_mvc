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
    .margin_content{padding:10px;}
    .product_list_right {
      width: 800px;
      float: right;
      text-align: right;
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
				
  <div class="margin_content">
    <div class="containerw">
      <lable><h3>附件列表</h3></lable>
      <div class="product-list_data">
        <form action="" method="post" id="form" name="form">
          <div data-example-id="striped-table" class="bs-example">
            <table class="table table-bordered table-hover">
              <thead>
              <tr class= "info">
                <th style="text-align: center;"><input type="checkbox" name="checkedAll" id="checkedAll"></th>
                <th>ID</th>
                <th>文件</th>
                <th>存储目录</th>
                <th>附件名</th>
                <th>分类大小</th>
                <th>附件类型</th>
                <th>上传时间</th>
                <th align="left">操作</th>
              </tr>
              </thead>
              <tbody>
              <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                  <td scope="row" align="center"><input id="check" type="checkbox" name="checkboxes[]" value="<?php echo ($vo["id"]); ?>"></td>
                  <td><?php echo ($vo["id"]); ?></td>
                  <td><?php if(($vo["type"]) == "image"): ?><img src="/awin_mvc/<?php echo ($vo["path"]); echo ($vo["name"]); ?>" width="50" height="50"><?php endif; ?></td>
                  <td><?php echo ($vo["path"]); ?></td>
                  <td><?php echo ($vo["name"]); ?></td>
                  <td><?php echo (formatbytes($vo["size"])); ?></td>
                  <td><?php echo ($vo["type"]); ?></td>
                  <td><?php echo (date("y-m-d",$vo["uptime"])); ?></td>
                  <td align="left">
                      <span id="del"><a href="javascript:void()" class="btn btn-danger btn-xs glyphicon glyphicon-trash">&nbsp;删除</a></span>
                  </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>

              </tbody>
            </table>

            <div class="product_list_bottom">
              <div class="product_list_left"style="width:20%;float:left;">
                <button type="button" disabled="true" class="button btn btn-sm" onclick="del_button()">删除</button>
              </div>
              <div class="product_list_right"><?php echo ($page); ?></div>
            </div>
            </tr>
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

  <script src="/awin_mvc/Public/js/layer/layer.js"></script>
  <script type="text/javascript">

    //全选全不选
    $("#checkedAll").click(function () {

      if ($(this).prop("checked")) { // 全选
        $(".product-list_data input[type='checkbox']").prop("checked", true);
      }
      else { // 取消全选
        $(".product-list_data input[type='checkbox']").prop("checked", false);
      }
      $(".btn-sm").addClass("btn-primary").prop("disabled",false)
    });



    //底部操作-删除
    function del_button() {

      layer.confirm('确认删除？', {
        btn : ['确定', '取消'] //按钮
      }, function () {
        var arr = [];
        var str = '';
        $('input[type=checkbox]:checked').each(function () {

          if($(this).val()!='on') {

            arr[arr.length] = $(this).val();
            str += $(this).val() + ',';
          }
        });


        $.post('<?php echo U("attach_list");?>', {'option':'delall','str' : str}, function (data) {

          if(data.status==1){
            layer.msg(data.info, {icon : 1});
          }else {
            layer.msg(data.info, {icon : 2});
          }
          location=location;
        });

      }, function () {

      });

    }

    $(document).on('click', '#del', function () {
      var e = $(this);
      layer.confirm('确认删除？', {
        btn : ['确定', '取消'] //按钮
      }, function () {
        var tr  = e.parent().parent();
        var id  = tr.children(':eq(0)');
        var idz = id.children("input[type='checkbox']").val();
        $.post('<?php echo U("attach_list");?>', {'option':'delone','str':idz}, function (data) {
          console.log(data);

          if(data.status==1){
            layer.msg(data.info, {icon : 1});
            e.parent().parent().remove();
          }else {
            layer.msg(data.info, {icon : 2});
          }

        });

      },function(){});
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