<?php	return array ( 'drop' => 'DROP TABLE IF EXISTS `{@prefix}auth_group`;', 'create' => 'CREATE TABLE `{@prefix}auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT \'主键\',
  `title` char(100) NOT NULL DEFAULT \'\' COMMENT \'用户组中文名称\',
  `status` tinyint(1) NOT NULL DEFAULT \'1\' COMMENT \'状态：为1正常，为0禁用\',
  `top` text NOT NULL COMMENT \'顶级菜单权限\',
  `second` text NOT NULL COMMENT \'二级菜单\',
  `three` text NOT NULL COMMENT \'三级菜单\',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT=\'用户组表\';', );?>