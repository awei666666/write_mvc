<?php if (!defined('THINK_PATH')) exit(); if(is_array($data)): foreach($data as $key=>$v): if(($v['rank'] == 2) ): ?><div onclick="two(this.id)" class="two" id="two-<?php echo ($v["second"]); ?>">
      <a class="menu-father-a" href="javascript:;">
        <i class="<?php echo ($v["icon"]); ?>"></i>
        <span><?php echo ($v['name']); ?></span>
        <i class="glyphicon glyphicon-chevron-up domn domn-two-<?php echo ($v["second"]); ?>"></i>
      </a>
    </div>

    <?php elseif($v['rank'] == 3): ?>

    <ul  class="three two-<?php echo ($v["second"]); ?>">
      <li class="<?php echo ($v["three_active"]); ?>">
        <a href="<?php echo ($v["href"]); ?>">
           <i class="<?php echo ($v["icon"]); ?>"></i>
           <span><?php echo ($v['name']); ?></span>
        </a>
      </li>
    </ul>

    <?php else: ?>
    其他选项，未读出，请联系管理员<?php endif; endforeach; endif; ?>