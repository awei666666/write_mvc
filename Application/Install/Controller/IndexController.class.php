<?php

namespace Install\Controller;
use Install\Controller\DbmysqlController;

class IndexController extends DbmysqlController {
	/**
	 * 安装首页
	 */
	public function index() {
		$file_url='./Application/install/lock.php';
		if(is_file($file_url)){
			$this->error('您已经安装成功，无需再安装！',U('home/index/index'));
		}else{
			$this->display();
		}


	}


	/**
	 * 环境检查
	 */
	public function check() {
		$this->install_environment();

		$this->display();
	}


	/**
	 * 数据库账号设置
	 */
	public function set() {
		$status = get('status', 'intval', 0);
		session('status', $status);
		$this->display();
	}


	/**
	 * 数据库及账号设置
	 */
	public function install() {

		$data = $_POST;
		if (!$data['host']) {
			$data['host'] = '127.0.0.1';
		}
		if (!$data['port']) {
			$data['port'] = 3306;
		}
		if (!$data['db_name']) {
			$data['db_name'] = $data['db_prefix'] . rand(10000, 99999);
		}

		// 提交
		if ($_POST) {
			//校验input数据
			$data = $this->checked_input($data);
			//数据库配置路径
			$url_config = 'Application/Common/Conf/db_config.php';
			if (!$url_config) {
				$this->error('配置文件不存在！');
			}
			//数据库配置信息 
			$config_data_old              = include $url_config;
			$config_data_old['DB_HOST']   = $data['host'];
			$config_data_old['DB_NAME']   = $data['db_name'];
			$config_data_old['DB_USER']   = $data['db_user'];
			$config_data_old['DB_PWD']    = $data['db_pass'];
			$config_data_old['DB_PORT']   = $data['port'];
			$config_data_old['DB_PREFIX'] = $data['db_prefix'];
			//写入配置文件
			$save_data = '<?php return ' . var_export($config_data_old, true) . ';';
			if (fopen($url_config, 'w')) {
				$put_res = file_put_contents($url_config, $save_data);
				if (!$put_res) {
					$this->error('初始化配置文件失败！');
				}
			}
			//创建数据库
			$this->connect(array(
				'username' => $data['db_user'],
				'password' => $data['db_pass'],
				'host'     => $data['host'],
				'port'     => $data['port'],
				'name'     => $data['db_name']
			));
			$db_name_table = 'create database ' . $data['db_name'];
			$this->query($db_name_table);
			$this->query('use ' . $data['db_name']);
			$this->set_db_char();

			//把重要数据存入session
			session('data', $data);
			//查出安装方式 0：正常安装1：急速安装
			$type = session('status');
			if ($type == 1) {
				$this->easy_install($data);
			} else {
				//普通安装  todo cs 未完成
				$dir_url  = './File/backup/';
				$dir_arr  = scandir($dir_url);
				$list_dir = array();
				$index    = 0;
				//遍历目录，去除点点，和增加创建时间
				foreach ($dir_arr as $k => $v) {
					if ($v == '.' || $v == '..') {
						continue;
					}
					$file_url = $dir_url . '/' . $v;
					//增加创建时间
					if (is_dir($file_url)) {
						$dir['name']  = iconv('gbk', 'utf-8', $v);
						$dir['time']  = filemtime($file_url);
						$dir['index'] = $index;
						$list_dir[]   = $dir;
						$index++;
					}
				}
				//对目录进行排序，按照创建时间排序
				$desc_list_dir = array_two_sort($list_dir, 'time', 'desc');
				//遍历目录，选择目录，准备安装
				foreach ($desc_list_dir as $kk => $vv) {

					if (substr($vv['name'], 0, 4) == 'root') {
						$back_dir_url  = $dir_url . $vv['name'] . '/';
						$dir_name_name = $vv['name'];
						$config_file_url=$back_dir_url . 'config.php';
						//获取配置文件信息
						$config_install = include_once $config_file_url;
						//需要安装的数据库个数
						$table_sum_totle = count($config_install['mysql_table_name']);
						break;
					}
				}
			}
			//如果没有安装数据，默认简洁安装
			if(!$config_install){
				$this->easy_install($data);
			}

			/*$dir_name_name                      = 'dir_name_name';
			$config_install['mysql_table_name'] = array('mysql_table_name');
			$table_sum_totle                    = 10;*/
			$install_url_param = array(
				'table_name' => $config_install['mysql_table_name'][0],
				'dir_name'   => $dir_name_name,
				'table_num'  => 0
			);
			$da_ajax           = set_ajaxReturn('初始化成功！' . PHP_EOL . '点击确认按钮立即前往安装.', U('do_install', $install_url_param), 1, 0, $table_sum_totle);
			$this->ajaxReturn($da_ajax, 'JSON');


			//$this->success('初始化成功！' . PHP_EOL . '点击确认按钮立即前往安装.', U());
			exit;
		}
	}


	/**
	 * 安装数据
	 */
	public function do_install() {
		$information = $_GET;

		$data = session('data');

		//链接数据库
		$this->connect(array(
			'username' => $data['db_user'],
			'password' => $data['db_pass'],
			'host'     => $data['host'],
			'port'     => $data['port'],
			'name'     => $data['db_name']
		));
		$user_table_sql = "use {$data['db_name']}";
		$this->query($user_table_sql);
		$this->set_db_char();
		//组装路径集合
		$dir_url      = './File/backup/';
		$back_dir_url = $dir_url . $information['dir_name'] . '/';
		$table_name   = $data['db_prefix'] . $information['table_name'];
		$data_status  = 1;

		//查出下个表的数据
		$config_install  = include_once $back_dir_url . 'config.php';
		$table_sum_totle = count($config_install['mysql_table_name']);

		//生成安装sql，并且安装
		$file_name = $back_dir_url . $information['table_name'] . '_sql.php';
		if (is_file($file_name)) {
			$table_sql = include_once $file_name;
			$create    = str_replace('CREATE TABLE `{@prefix}', 'CREATE TABLE `' . $data['db_prefix'], $table_sql['create']);
			$drop      = str_replace('DROP TABLE IF EXISTS `{@prefix}', 'DROP TABLE IF EXISTS `' . $data['db_prefix'], $table_sql['drop']);

			 $this->query($drop);
			 $this->query($create);

		}

		//保存数据
		$part_sum = $config_install['table_name_status'][$information['table_name']];

		//判断是否是分片数据
		if ($part_sum > 0) {
			for ($i = 0; $i < $part_sum; $i++) {
				//文件路径
				$data_name = $back_dir_url . $information['table_name'] . '_' . $i . '_data.php';
				if (is_file($data_name)) {
					$data_array      = include_once $data_name;
					$data_array_keys = array_keys($data_array[0]);
					$data_array_keys = implode('`,`', $data_array_keys);
					//循环数据文件里面的数据
					foreach ($data_array as $kk => $vv) {
						$data_array_value = array_values($vv);

						$data_array_value = implode("','", $data_array_value);
						//$data_array_value = iconv( "UTF-8","GBK", $data_array_value);
						$menu_sql         = "insert into $table_name (`$data_array_keys`) values ('$data_array_value')";
						$res              = $this->query($menu_sql);

					}
				}
			}
		} else {

			$data_name = $back_dir_url . $information['table_name'] . '_data.php';

			if (is_file($data_name)) {
				$data_array      = include_once $data_name;
				$data_array_keys = array_keys($data_array[0]);
				$data_array_keys = implode('`,`', $data_array_keys);
				//循环数据文件里面的数据
				foreach ($data_array as $kk => $vv) {
					$data_array_value = array_values($vv);

					$data_array_value = implode("','", $data_array_value);
					//$data_array_value = iconv("UTF-8", "GBK", $data_array_value);
					$menu_sql = "insert into $table_name (`$data_array_keys`) values ('$data_array_value')";
					$res      = $this->query($menu_sql);



				}
			}
		}

		$table_num = $information['table_num'] + 1;
		//把超级用户信息添加到数据中
		if ($table_num >= $table_sum_totle) {

			$user_table_name = $data['db_prefix'] . 'admin_user';
			$user_select_sql = "select * from $user_table_name where user='{$data['username']}'";
			$user_field      = $this->query($user_select_sql);
			if ($user_field) {
				$user_sql = "update $user_table_name set password='{$data['password']}' where user='{$data['username']}'";
			} else {
				$user_sql = "insert into $user_table_name (`user`,`password`) values ('{$data['username']}','{$data['password']}')";
			}
			$this->query($user_sql);
			$data_status = 0;
		}
		//组装json数据
		$next_table_name = $config_install['mysql_table_name'][$table_num];
		$install_url_param = array(
			'table_name' => $next_table_name,
			'dir_name'   => $information['dir_name'],
			'table_num'  => $table_num
		);
		$other_patam['next_table_name']=$data['db_prefix'].$next_table_name;
		$da_ajax           = set_ajaxReturn($data['db_prefix'] . $information['table_name'] . '安装完成！', U('do_install', $install_url_param), $data_status, $table_num, $table_sum_totle,$other_patam);
		$this->ajaxReturn($da_ajax, 'JSON');

		exit;
	}

	/**
	 * 安装成功
	 */
	public function complete() {
		$url = $_SERVER['SCRIPT_NAME'];
		$data['time']=time();
		$data['type']=session('status');
		$data['status']=1;
		$dir_url     = './Application/install/';
		FF('lock',$data,$dir_url);
		session(null);
		$this->assign('url', $url);
		$this->display();
	}

	/**
	 * 简单安装、、急速安装
	 * @param $data .
	 */
	public function easy_install($data) {
		//急速安装
		$dir_url     = './Application/install/back/';
		$table_array = include_once $dir_url . 'config.php';

		foreach ($table_array as $k => $v) {
			$file_name = $dir_url . $v . '_sql.php';
			if (is_file($file_name)) {
				$table_sql = include_once $file_name;
				$create    = str_replace('CREATE TABLE `{@prefix}', 'CREATE TABLE `' . $data['db_prefix'], $table_sql['create']);
				$drop      = str_replace('DROP TABLE IF EXISTS `{@prefix}', 'DROP TABLE IF EXISTS `' . $data['db_prefix'], $table_sql['drop']);
				$this->query($drop);
				$this->query($create);
			}
			$data_name = $dir_url . $v . '_data.php';
			if (is_file($data_name)) {
				$table_name      = $data['db_prefix'] . $v;
				$data_array      = include_once $data_name;
				$data_array_keys = array_keys($data_array[0]);
				$data_array_keys = implode(',', $data_array_keys);
				foreach ($data_array as $kk => $vv) {
					$data_array_value = array_values($vv);

					$data_array_value = implode("','", $data_array_value);
					//$data_array_value = iconv("UTF-8", "GBK", $data_array_value);
					$menu_sql         = "insert into $table_name ($data_array_keys) values ('$data_array_value')";

					$res = $this->query($menu_sql);
				}
			}
		}
		session('status', 1);
	}

	/**
	 * 设置数据库编码
	 * @param string $char
	 * @return void
	 */
	private function set_db_char($char = 'utf8') {
		$this->query("set character_set_connection={$char},character_set_results={$char},character_set_client=binary;");
	}


	/**数据简单校验
	 * @param $data
	 * @return mixed
	 */
	public function checked_input($data) {
		if (!$data['db_user']) {
			$this->error('数据库帐号不能为空！', 'db_user');
		}
		if (!$data['db_name']) {
			$this->error('数据库名称不能为空！', 'db_name');
		}
		if (!$data['username']) {
			$this->error('超级管理员帐号不能为空！', 'username');
		}
		if (!$_POST['password']) {
			$this->error('超级管理员密码不能为空！', 'password');
		}
		if (strlen($_POST['password']) < 5) {
			$this->error('密码至少需要5位字符！', 'password');
		}
		if (strlen($_POST['password']) > 20) {
			$this->error('密码最多能设置20位字符！', 'password');
		}
		if (!$_POST['repassword']) {
			$this->error('确认密码不能为空！', 'repassword');
		}
		if ($_POST['password'] != $_POST['repassword']) {
			$this->error('两次输入的密码不一致！', 'repassword');
		}
		$data['password'] = md5($_POST['password']);
		unset($data['repassword']);

		return $data;
	}




	/**
	 * 验证目录权限
	 * @param $path
	 * @return bool
	 */
	static public function writable_check($path) {
		$is_writable = true;
		if (!is_dir($path)) {
			return false;
		}
		$dir = opendir($path);
		while (($file = readdir($dir)) !== false) {
			if ($file != '.' && $file != '..') {
				if (is_file($path . '/' . $file)) {
					//是文件判断是否可写，不可写直接返回0，不向下继续
					if (!is_writable($path . '/' . $file)) {
						return false;
					}
				} else {
					//目录，循环此函数,先判断此目录是否可写，不可写直接返回0 ，可写再判断子目录是否可写
					$dir_wrt = self::dir_writeable($path . '/' . $file);
					if (false === $dir_wrt) {
						return false;
					}
					$is_writable = self::writable_check($path . '/' . $file);
				}
			}
		}

		return $is_writable;
	}


	/**
	 * 验证目录是否可写
	 * @param $dir
	 * @return bool
	 */
	static public function dir_writeable($dir) {
		$writeable = false;
		if (is_dir($dir)) {
			if ($fp = @fopen("$dir/chkdir.test", 'w')) {
				@fclose($fp);
				@unlink("$dir/chkdir.test");
				$writeable = true;
			} else {
				$writeable = false;
			}
		}

		return $writeable;
	}


	/**
	 * 把用户信息存入session
	 * 估计要废弃
	 */
	public function write_session($data) {
		$admin_user['user']     = $data['username'];
		$admin_user['password'] = $data['password'];
		session('install_admin_user', $admin_user);
	}


	/**
	 * 检测安装环境
	 */
	public function install_environment() {

		//环境极限检查
		$list = array();
		// 操作系统
		$condition = php_uname();
		$status    = false !== stripos($condition, 'windows') || false !== stripos($condition, 'linux') ? true : false;
		$list[]    = array(
			'name'      => '操作系统',
			'condition' => $condition,
			'need'      => 'Windows_NT / Linux',
			'status'    => $status
		);
		// WEB 服务器
		$condition = $_SERVER['SERVER_SOFTWARE'];
		$status    = false !== stripos($condition, 'apache') || false !== stripos($condition, 'nginx') || false !== stripos($condition, 'iis') ? true : false;
		$list[]    = array(
			'name'      => 'WEB 服务器',
			'condition' => $condition,
			'need'      => 'Apache / Nginx / IIS',
			'status'    => $status
		);
		// PHP 版本
		$condition = phpversion();
		$status    = $condition >= 5.2 ? true : false;
		$list[]    = array(
			'name'      => 'PHP 版本',
			'condition' => $condition,
			'need'      => '必须5.2+',
			'status'    => $status
		);
		// MYSQL 扩展
		$condition = extension_loaded('mysql');
		$status    = $condition ? true : false;
		$condition = $condition ? '已安装' : '未安装';
		$list[]    = array(
			'name'      => 'MYSQL 扩展',
			'condition' => $condition,
			'need'      => '必须安装',
			'status'    => $status
		);
		// ICONV/MB_STRING 扩展
		$condition = extension_loaded('iconv') || extension_loaded('mbstring') ? true : false;
		$status    = $condition ? true : false;
		$condition = $condition ? '已开启' : '已开启';
		$list[]    = array(
			'name'      => 'ICONV/MB_STRING 扩展',
			'condition' => $condition,
			'need'      => '必须开启',
			'status'    => $status
		);
		// JSON扩展
		$condition = extension_loaded('json');
		if ($condition) {
			$condition = function_exists('json_decode') && function_exists('json_encode') ? true : false;
		}
		$status    = $condition ? true : false;
		$condition = $condition ? '已开启' : '未开启';
		$list[]    = array(
			'name'      => 'JSON扩展',
			'condition' => $condition,
			'need'      => '必须开启',
			'status'    => $status
		);
		// GD 扩展
		$condition = extension_loaded('gd');
		$status    = $condition ? true : false;
		if ($condition) {
			$condition = '已开启，支持：';
			if (function_exists('imagepng')) {
				$condition .= 'png';
			}
			if (function_exists('imagejpeg')) {
				$condition .= ' jpg';
			}
			if (function_exists('imagegif')) {
				$condition .= ' gif';
			}
		}
		$list[] = array(
			'name'      => 'GD 扩展',
			'condition' => $condition,
			'need'      => '建议开启',
			'status'    => $status
		);
		$next   = 0;
		foreach ($list as $i => $r) {
			if (!$r['status'] && $r['name'] != 'GD 扩展') {
				$next++;
			}
		}
		// 目录
		$file   = array(
			'Application\Common\Conf',
			'File/tmp/',
			'File/backup/',
		);
		$floder = array();
		foreach ($file as $filepath) {
			$status   = self::writable_check($filepath);
			$floder[] = array(
				'name'   => '/' . str_replace(BUSYPHP_PATH, '', $filepath),
				'status' => $status
			);
			if (!$status) {
				$next++;
			}
		}
		$this->assign('list', $list);
		$this->assign('next', $next);
		$this->assign('floder', $floder);
	}

}


