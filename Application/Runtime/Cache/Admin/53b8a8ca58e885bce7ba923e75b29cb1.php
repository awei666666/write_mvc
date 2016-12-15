<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>

  <title>后台管理系统</title>

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
  <script src="/awin_mvc/Public/js/layer/layer.js"></script>
  
  <style>
    .header_mune {
      /*background-color: #eeeeee;*/
      background: rgba(0, 0, 0, 0) -moz-linear-gradient(center top, #f9f9f9, #e0e0e0) repeat scroll 0 0;
    }
    .tr {
      border-top: #ddd 3px solid;
    }
    td {
      border-top: #ddd 2px solid;
    }
    .table {
      margin-bottom: 0;
    }
    td, th {
      text-align: center;
    }
    .panel-body {
      padding: 0;
    }
    .cloce {
      margin-left: 642px;
    }
    .hover {
      background-color: #cceeff;
      color: #333;
    }

  </style>

</head>
<body>


  <div class="panel panel-default">
    <div class="panel-body">
      <table class="table">
        <thead>
        <tr class="header_mune">
          <th>名称</th>
          <th>备份时间</th>
          <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr class="tr">
            <td class="name_<?php echo ($v["index"]); ?>"><a data="<?php echo ($v["index"]); ?>" href="javascript:;"><?php echo ($v["name"]); ?></a></td>
            <td class=""><?php echo date('Y-m-d',$v['time']);?></td>
            <td class="">
              <botton data="<?php echo ($v["index"]); ?>" class="btn btn-success select_btn"> 选择这个文件</botton>
            </td>
          </tr><?php endforeach; endif; ?>

        </tbody>

      </table>
    </div>
    <div class="panel-footer">
      <botton class="btn btn-default cloce"> 关闭</botton>
    </div>
  </div>


<script>

</script>

  <script>
    var index = parent.layer.getFrameIndex(window.name);
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
      //选择目录
      $('.select_btn').on('click', function () {
        var this_obj = this;
        layer.confirm('确认要选择这个目录做为还原目录吗？' +
            '<P class="text-danger f12">数据恢复会影响到现有的数据，且不可恢复，请谨慎操作！</p>', {
          btn : ['继续执行', '我想想'] //按钮
        }, function () {
          //确定执行
          layer.close(index);

          send_parent(this_obj);
        }, function () {
          //否则

        });

      });
      //关闭页面
      $('.cloce').on('click', function () {
        parent.layer.close(index);
      })
    });

    //给父页面传值
    function send_parent(btn_id) {
      var val_index = $(btn_id).attr('data');
      var val_name  = $('.name_' + val_index).text();

      parent.$('#install_name').val(val_name);
      parent.layer.close(index);

    }

  </script>

</body>
</html>