<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="__CSS__/bootstrap.min.css">
<title>跳转提示</title>
<style type="text/css">
*{ padding: 0; margin: 0; }
body{ background: #fff; font-family: '微软雅黑'; color: #333; font-size: 16px; }
.system-message{ text-align:center; }
.system-message h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; }
.system-message .jump{ padding-top: 10px}
.system-message .jump a{ color: #333;}
.system-message .success,.system-message .error{font-size: 36px ; color:#fff}
.error{background:#d9534f;height:250px; padding-top:50px; }
.success{background:#5CB85C;height:250px; padding-top:50px;}
.system-message .detail{ font-size: 12px; line-height: 20px; display:none}
.link_a{font-size:14px; color:#67A8D7; text-decoration:none; padding:5px 10px; background:#fff; -moz-border-radius: 5px;
-webkit-border-radius: 5px;border-radius: 5px; color:#000;}
.glyphicon{ color:#fff; margin:0px;}
.message_div{font-size:30px; font-weight: bold;color: #fff;}
</style>
</head>
<body>
<div class="system-message" >
<present name="message">
<div class="success"><h1  class="glyphicon glyphicon-ok-circle" style="font-size:50px;"></h1><div class="message_div"><?php echo($message); ?></div>
<a class="link_a" href="<?php echo($jumpUrl); ?>">返回重试</a>
<a class="link_a" href=<?php echo U('admin/home/index/index'); ?>>回到首页</a>
</div>
<else/>

<div class="error"><h1  class="glyphicon glyphicon-info-sign" style="font-size:50px; "></h1><div class="message_div"><?php echo($error); ?></div>
<a class="link_a" href="<?php echo($jumpUrl); ?>">返回重试</a>
<a class="link_a" href=<?php echo U('admin/home/index/index'); ?>>回到首页</a>
</div>
</present>
<p class="detail"></p>

</div>
<div style="text-align:center; font-size:24px; margin-top:25px;">
<p class="jump">
页面即将在 <a id="href" href="<?php echo($jumpUrl); ?>"></a><b id="wait"><?php echo($waitSecond); ?></b>跳转
</p>
<p style=" margin-top:10px;"> <a style="font-size:14px; color:#67A8D7; text-decoration:none" href="<?php echo($jumpUrl); ?>">如果您的浏览器没有跳转，您可以点击这里手动跳转</a> </p>
</div>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time == 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
</body>
</html>