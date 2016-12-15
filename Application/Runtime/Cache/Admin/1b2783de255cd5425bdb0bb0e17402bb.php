<?php if (!defined('THINK_PATH')) exit();?><div onclick="two(this.id)" class="two" id="index-manage">
  <a class="menu-father-a" href="javascript:;">
    <i class="glyphicon glyphicon-briefcase"></i>
    <span>待审核信息</span>
    <i class="glyphicon glyphicon-chevron-up domn domn-index-manage"></i>
  </a>
</div>

<ul  class="three index-manage">
  <li class="index-manage">
    <a href="<?php echo U('admin/home/verify/shop');?>">
      <i class="glyphicon glyphicon-calendar"></i>
      <span>待审核店铺</span>&nbsp;&nbsp;&nbsp;
      <span class="badge"><?php echo ($menu['shop_num']); ?></span>

    </a>
  </li>
</ul>
<ul  class="three index-manage">
  <li class="index-manage">
    <a href="<?php echo U('admin/home/verify/member');?>"">
      <i class="glyphicon glyphicon-user"></i>
      <span>待审核会员</span>&nbsp;&nbsp;&nbsp;
      <span class="badge"><?php echo ($menu['member_num']); ?></span>

    </a>
  </li>
</ul>
<ul  class="three index-manage">
  <li class="index-manage">
    <a href="<?php echo U('admin/home/verify/product');?>">
      <i class="glyphicon glyphicon-inbox"></i>
      <span>待审核产品</span>&nbsp;&nbsp;&nbsp;
      <span class="badge"><?php echo ($menu['product_num']); ?></span>
    </a>
  </li>
</ul>

<!--二级目录-->
<div onclick="two(this.id)" class="two" id="index-info">
  <a class="menu-father-a" href="javascript:;">
    <i class="glyphicon glyphicon-comment"></i>
    <span>其他信息</span>
    <i class="glyphicon glyphicon-chevron-up domn domn-index-manage"></i>
  </a>
</div>

<ul  class="three index-info">
  <li class="index-info">
    <a href="<?php echo U('admin/home/Message/index');?>">
      <i class="glyphicon glyphicon-bell"></i>
      <span>事件提醒</span>&nbsp;&nbsp;&nbsp;
      <span class="badge"><?php echo ($menu['message_num']); ?></span>

    </a>
  </li>
</ul>
<ul  class="three index-info">
  <li class="index-info">
    <a href="javascript:;">
      <i class="glyphicon glyphicon-bullhorn"></i>
      <span>特殊通知</span>&nbsp;&nbsp;&nbsp;
      <span class="badge">4</span>
    </a>
  </li>
</ul>