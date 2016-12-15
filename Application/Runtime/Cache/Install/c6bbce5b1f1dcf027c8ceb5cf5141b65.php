<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>粮易网后台管理系统安装程序</title>
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
	body {
		margin: 0;
		padding: 0;
	}
	#head h1 {
		margin: 44px 0 0 -21px;
		padding: 0;
		display: inline;
		color: #fff;
		float: left;
	}
	#head {
		background: #428bca url("/awin_mvc/Public/img/install_img/index_back.png") repeat scroll center center;
		height: 140px;
		margin-bottom: 30px;
	}
	#head img {
		float: left;
		display: inline;
		margin: 31px 24px 0 126px;
	}
	.panel-body {
		width: 70%;
		margin: 0px auto;
	}
	.content {
		line-height: 20px;
	}
	p {
		margin: 10px 0;
	}
	.panel-title { text-align: center; font-size: 24px; }
</style>
<body style="overflow: auto; min-height: 870px;">
<header id="header">
	<div id="head"><img src="/awin_mvc/Public/img/install_img/LOGO.png" alt="">
		<h1>粮易网后台管理系统安装程序</h1></div>
</header>
<content id="content">
	<div class="panel panel-default ">
		<div class="panel-heading ">
			<h3 class="panel-title text-center">安装许可协议</h3>
		</div>
		<div class="panel-body">
			<h4 class="content agreement">
				<p>本授权协议适用且仅适用于 粮易后台管理系统2.0 版本，官方拥有对本授权协议的最终解释权。</p>

				<p>协议许可的权利</p>

				<p>您拥有使用本软件构建的网站中全部会员资料、文章及相关信息的所有权，并独立承担与文章内容的相关法律义务。</p>
				<p>获得商业授权之后，您可以将本软件应用于商业用途，同时依据所购买的授权类型中确定的技术支持期限、技术支持方式和技术支持内容，
					自购买时刻起，在技术支持期限内拥有通过指定的方式获得指定范围内的技术支持服务。商业授权用户享有反映和提出意见的权力，
					相关意见将被作为首要考虑，但没有一定被采纳的承诺或保证。</p>

				<p>协议规定的约束和限制</p>

				<p>未获商业授权之前，不得将本软件用于商业用途（包括但不限于企业网站、经营性网站、以营利为目或实现盈利的网站）。</p>

				<p> 不得对本软件或与之关联的商业授权进行出租、出售、抵押或发放子许可证。</p>

				<p>禁止在 粮易后台管理系统2.0 版本 的整体或任何部分基础上以发展任何派生版本、修改版本或第三方版本用于重新分发。</p>

				<p>如果您未能遵守本协议的条款，您的授权将被终止，所被许可的权利将被收回，并承担相应法律责任。</p>

				<p>有限担保和免责声明</p>

				<p>本软件及所附带的文件是作为不提供任何明确的或隐含的赔偿或担保的形式提供的。</p>

				<p> 用户出于自愿而使用本软件，您必须了解使用本软件的风险，在尚未购买产品技术服务之前，我们不承诺提供任何形式的技术支持、使用担保，
					也不承担任何因使用本软件而产生问题的相关责任。</p>

				<p>有关 粮易后台管理系统2.0 版本 最终用户授权协议、商业授权与技术服务的详细内容，均由 粮易天下 官方独家提供。
					官方拥有在不事先通知的情况下，修改授权协议和服务价目表的权力，修改后的协议或价目表对自改变之日起的新授权用户生效。</p>

				<p>电子文本形式的授权协议如同双方书面签署的协议一样，具有完全的和等同的法律效力。您一旦开始安装 粮易后台管理系统2.0 版本，
					即被视为完全理解并接受本协议的各项条款，在享有上述条款授予的权力的同时，受到相关的约束和限制。协议许可范围以外的行为，
					将直接违反本授权协议并构成侵权，我们有权随时终止授权，责令停止损害，并保留追究相关责任的权力。</p>
			</h4>
		</div>
	</div>

	<div style="text-align: center">
		<button class="btn btn-primary btn btn-success" data-toggle="modal" data-target="#myModal">我同意此协议</button>
		&nbsp;&nbsp;
	</div>
	<div class="modal fade" id="myModal">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">消息提示</h4>
				</div>
				<div class="modal-body">
					<p><b>确认要进入下一步吗？</b></p>
					<p class="f12 text-danger">确认后代表您已经同意了该协议！</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					<button type="button" class="btn btn-primary" onclick="self.location.href='<?php echo U('check');?>'">确认</button>
				</div>
			</div>
		</div>
	</div>
</content>
</body>
<script>
	function custom_close() {

			window.top.opener = null; window.close();


	}
</script>
</html>