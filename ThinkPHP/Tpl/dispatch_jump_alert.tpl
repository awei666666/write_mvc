<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0"/>
	<title><?=$msgTitle?></title>
</head>
<body>
<script type="text/javascript">
	(function() {
		var status 	= <?=$status?>;
		var message	= '<?=($status ? ($message ? $message : '成功！') : ($error ? $error : '未知错误！'))?>';


		<?=$alert_before_run?>


		alert(message);


		<?=$alert_after_run?>


		top.location.href = '<?=$jumpUrl?>';
	})();

</script>
</body>
</html>