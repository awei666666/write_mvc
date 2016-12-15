<?php	return array ( 'drop' => 'DROP TABLE IF EXISTS `ly_admin_menu`;', 'create' => 'CREATE TABLE `ly_admin_menu` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT \'\' COMMENT \'名称\',
  `top` varchar(100) NOT NULL DEFAULT \'\' COMMENT \'顶级菜单\',
  `second` varchar(100) NOT NULL DEFAULT \'\' COMMENT \'二级菜单\',
  `three` varchar(100) NOT NULL DEFAULT \'\' COMMENT \'三级菜单\',
  `icon` varchar(255) NOT NULL DEFAULT \'\' COMMENT \'图标\',
  `reorder` int(100) NOT NULL DEFAULT \'50\' COMMENT \'排序\',
  `is_show` int(10) NOT NULL DEFAULT \'1\' COMMENT \'是否显示1：显示，2为隐藏\',
  `parent` varchar(100) NOT NULL DEFAULT \'\' COMMENT \'上级菜单\',
  `is_child` int(2) NOT NULL DEFAULT \'0\' COMMENT \'是否有孩子0：有\',
  `rank` int(2) NOT NULL DEFAULT \'1\' COMMENT \'菜单等级\',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=332 DEFAULT CHARSET=utf8 COMMENT=\'后台菜单表\';', );?>