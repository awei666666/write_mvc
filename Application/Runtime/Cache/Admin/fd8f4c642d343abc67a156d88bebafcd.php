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
    *{
      padding: 0px;
      margin: 0px;
      list-style: none;
    }
    #a{
      text-decoration: none;
    }
    h3{
      color:#337ab7;
      display: inline-block;
      margin:0;
    }
    td{
      text-align: center;
    }
    .product_list_top{
      border-bottom: #CBE9F3 1px solid;
      padding: 15px;

    }
    .containerw{
      margin-top: 25px;
    }
    .product-list_data{
      margin-top: 25px;
    }
    .table th{
      background: #BBDDE5;
      text-align: center;
    }
    .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
      border: 1px solid #ccc;
    }
    #rightBox{
      padding:0 10px;
    }
    .product_list_bottom{
      width: 100%;
      height:50px;
      /*margin-top:10px ;*/
      float:left;
      /*background-color: red;*/
    }
    .product_list_left{
      width:150px;
      height:50px;
      float:left;
      text-align: right;
    }
    .product_list_mid{
      width:80%;
      height:50px;
      float:left;
      text-align: center;
    }
    .product_list_right{
      width:120px;
      height:50px;
      float:left;
    }
    .form-inline{
      float: right;
      margin-bottom: 10px;
    }
    #delete{
      color:red;
    }
    #usings{
      color:green;
    }
    #forbidden{
      color:red;
    }
    #check{
      margin: 0px 5px;
    }
    #checkedAll{
      margin: 0px 5px;
    }
    .addchildboard{
      color: #FFFFFF;
      line-height: 25px;
      margin-left: 10px;
      padding-left: 20px;
      background:url(/awin_mvc/Public/img/backgrounds/addchildboard.png) no-repeat;
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
				
  <div class="containerw">
    <lable><h3>城市管理</h3></lable>


    <div class="product-list_data">
      <form action="" method="post" id="form" name="form">
        <div data-example-id="striped-table" class="bs-example">

          <table class="table table-bordered table-hover">
            <thead>
            <tr class="info">
              <th><input type="checkbox" name="checkedAll" id="checkedAll">编号</th>
              <th>城市名字</th>
              <th>上级城市</th>
              <th>下级区域总数</th>
              <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr id="tr<?php echo ($v["id"]); ?>">
                <td scope="row"><input id="check" type="checkbox" name="checkboxes[]" value="<?php echo ($v["id"]); ?>"><?php echo ($v["id"]); ?></td>
                <td><?php echo ($v["name"]); ?>
                  <a class="addchildboard"
                     href="<?php echo U('adddistrict',array('id'=>$v['id']));?>"> 添加下级区域
                  </a>
                </td>
                <?php if($v["pid"] == 0): ?><td>无</td>
                  <?php else: ?>
                  <td><?php echo ($v["pname"]); ?></td><?php endif; ?>

                <td>
                  <?php if($v["ptot"] == 0): echo ($v["ptot"]); ?>
                    <?php else: ?>
                    <a href="<?php echo U('listdistricts',array('id'=>$v['id']));?>">共<?php echo ($v["ptot"]); ?>个下级</a><?php endif; ?>
                </td>
                <td align="center">
                  <a href="<?php echo U('editdistrict',array('id'=>$v['id']));?>" class="btn btn-success btn-xs glyphicon glyphicon-pencil">&nbsp修改</a>　
                  <span onclick="del(this,<?php echo ($v["id"]); ?>)"><a href="javascript:void()" class="btn btn-danger btn-xs glyphicon glyphicon-trash">&nbsp删除</a></span>
                </td>


              </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
          </table>
        </div>

      </form>



      <div class="product_list_bottom">
        <div class="product_list_left">
          <a href="javascript:history.go(-1)"><button class="btn btn-primary">返回上级</button></a>
          <button type="button" disabled="true" class="button btn btn-sm" onclick="dels()">删除</button>
        </div>
        <div class="product_list_mid"><?php echo ($show); ?></div>
        <div class="product_list_right">

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
    $(function () {
      //底部按钮可执行操作
      $("input[type='checkbox']").click(function () {

        if ($("input[type='checkbox']").is(':checked')) {
          $('.button').addClass('btn-danger');
          $('.button').attr('disabled', false);
          ;
        } else {
          $('.button').removeClass('btn-danger');
          $('.button').attr('disabled', true);
        }

      });
      //全选
      $("#checkedAll").click(function () {

        if ($(this).prop("checked")) { // 全选
          $("input[type='checkbox']").prop("checked", true);
        }
        else { // 取消全选
          $("input[type='checkbox']").prop("checked", false);
          $('.button').removeClass('btn-danger');
          $('.button').attr('disabled',true);

        }
      });

    });

    //删除
    function del(obj,id){
      layer.confirm('确认删除？', {
        btn: ['确定','取消'] //按钮
      }, function(){
        $.get('/awin_mvc/index.php/Admin/Systemconfig/district/Ajax_districtdel',{'id':id},function(data){
          if(data){
            layer.msg('删除成功', {icon: 1});
          }else{
            layer.msg('删除失败', {icon: 2});
          }

        });
        window.location.reload();
      }, function(){

      });

    }


    //底部操作-删除
    function dels(){

      layer.confirm('确认删除？', {
        btn: ['确定','取消'] //按钮
      }, function(){
        var arr=[];
        var str='';
        $('input[type=checkbox]:checked').each(function(){
          arr[arr.length]=$(this).val();
          str+=$(this).val()+',';
        });

        $.get('/awin_mvc/index.php/Admin/Systemconfig/district/Ajax_districtdelAll',{'str':str},function(data){

          if(data==arr.length){
            layer.msg('删除成功', {icon: 1});
          }else{
            layer.msg('删除失败', {icon: 2});
          }
        });
        window.location.reload();
      }, function(){

      });

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