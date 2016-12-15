<?php
/**
 * 公共函数库
 * @author 韩威兵^life <1877361302@qq.com>
 * @copyright 2016 - 2016 粮易网 <jztl2012@163.com>
 * @version $Id: 2016/8/8 9:32 liangyi2.0 function.php 韩威兵^life $
 */

/**
 * 读取配置文件的信息，返回配置信息
 * @return array.
 */
function look_config_data(){
	$config_data=require_once 'Application/Admin/Conf/user_config.php';
	return $config_data;
}

