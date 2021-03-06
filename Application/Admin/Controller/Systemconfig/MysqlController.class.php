<?php
/**
 * @author 韩威兵^life <1877361302@qq.com>
 * @copyright 2016 - 2016 粮易网 <jztl2012@163.com>
 * @version $Id: 2016/8/31 11:51 ly2.0 MysqlController.class.php 韩威兵^life $
 */
namespace Admin\Controller\Systemconfig;
use Think\Controller;
use Admin\Controller\Home\IndexController;

class MysqlController extends IndexController {
	public  $dir_url = './File/backup/';
	public  $dir_name;
	private $flag    = true;


	public function _initialize() {
		parent::_initialize(); // TODO: Change the autogenerated stub
	}


	/**
	 * 数据库备份7
	 */
	public function back() {
		header("Content-type: text/html; charset=utf-8");
		$search_name = I('search_data');

		$db         = M();
		$search     = "SHOW TABLE STATUS LIKE '%" . $search_name . "%'";
		$tables_arr = $db->query($search);
		foreach ($tables_arr as $k => $v) {
			/*$name_arr=explode('_',);
			$name=$name_arr[1]*/
			$v['Name']               = str_replace(C(DB_PREFIX), '', $v['Name']);
			$new_arr[$k]['name']     = $v['Name'];
			$new_arr[$k]['size']     = formatBytes($v['Data_length'] + $v['Index_length']);
			$new_arr[$k]['type']     = $v['Engine'];
			$new_arr[$k]['charset']  = $v['Collation'];
			$new_arr[$k]['annotate'] = $v['Comment'];
			$new_arr[$k]['rows']     = $v['Rows'];
			$new_arr[$k]['patch']    = formatBytes($v['Data_free']);
		}
		$this->assign('prefix', C(DB_PREFIX));
		$this->assign('list', $new_arr);
		if ($search_name) {
			$content      = $this->fetch('back_list');
			$content_data = set_ajaxReturn($content);
			$this->ajaxReturn($content_data, 'JSON');
		} else {

			$this->display();
		}
	}


	/**
	 * 数据库还原
	 */
	public function recover() {
		$this->display();
	}


	/**
	 * 执行还原
	 */
	public function do_recover() {
		$dir_name          = I('name');
		$recover_url       = $this->dir_url . $dir_name . '/';
		$config_data       = include_once $recover_url . 'config.php';
		$table_sum_totle   = count($config_data['mysql_table_name']);
		$min_table_name    = $config_data['mysql_table_name'][0];
		$install_url_param = array(
			'table_name' => $min_table_name,
			'dir_name'   => $dir_name,
			'table_num'  => 0
		);

		$da_ajax = set_ajaxReturn('初始化成功！' . PHP_EOL . '点击确认按钮立即前往还原.', U('start_recover', $install_url_param), 1, 0, $table_sum_totle);
		$this->ajaxReturn($da_ajax, 'JSON');
	}


	/**
	 * 开始按顺序还原
	 */
	public function start_recover() {
		$information = $_GET;

		//组装路径集合
		$dir_url      = './File/backup/';
		$back_dir_url = $dir_url . $information['dir_name'] . '/';
		$table_name   = get_table_name($information['table_name']);
		$data_status  = 1;

		//获取安装配置信息
		$config_install  = include_once $back_dir_url . 'config.php';
		$table_sum_totle = count($config_install['mysql_table_name']);

		//生成安装sql，并且安装
		$file_name = $back_dir_url . $information['table_name'] . '_sql.php';
		if (is_file($file_name)) {
			$table_sql = include_once $file_name;
			M()->query($table_sql['drop']);
			M()->query($table_sql['create']);
		}


		//$table_num = $information['table_num'] + 1;


		//组装json数据
		$this_table_name                = $config_install['mysql_table_name'][$information['table_num']];
		$install_url_param              = array(
			'table_name' => $this_table_name,
			'dir_name'   => $information['dir_name'],
			'table_num'  => $information['table_num'],
			'd'          => 0
		);
		$other_patam['next_table_name'] = '正在备份' . C('DB_PREFIX') . $information['table_name'] . '表数据';
		$da_ajax                        = set_ajaxReturn(C('DB_PREFIX') . $information['table_name'] . '表结构还原完成！', U('restore_data', $install_url_param), $data_status, $information['table_num'], $table_sum_totle, $other_patam);
		$this->ajaxReturn($da_ajax, 'JSON');

		exit;
	}


	/**
	 * 还原数据
	 */
	public function restore_data() {

		$information = $_GET;
		//让程序停下来的标志
		$data_status = 1;
		//最原始路径
		$dir_url      = './File/backup/';
		$back_dir_url = $dir_url . $information['dir_name'] . '/';
		$table_name   = get_table_name($information['table_name']);
		//获取安装配置信息
		$config_install  = include_once $back_dir_url . 'config.php';
		$table_sum_totle = count($config_install['mysql_table_name']);
		//保存数据,查出分片数量
		$part_sum = $config_install['table_name_status'][$information['table_name']];
		//判断是否是分片数据
		if ($part_sum > 0) {
			//文件路径
			$data_name = $back_dir_url . $information['table_name'] . '_' . $information['d'] . '_data.php';
			if (is_file($data_name)) {
				$data_array      = include_once $data_name;
				$data_array_keys = array_keys($data_array[0]);
				$data_array_keys = implode('`,`', $data_array_keys);
				//循环数据文件里面的数据
				foreach ($data_array as $kk => $vv) {
					$data_array_value = array_values($vv);

					$data_array_value = implode("','", $data_array_value);
					//$data_array_value = iconv( "UTF-8","GBK", $data_array_value);
					$menu_sql = "insert into $table_name (`$data_array_keys`) values ('$data_array_value')";
					M()->query($menu_sql);
				}
			}
			//如果这个是分片数据最后一篇，让他调到下一个数据库，或者让程序停下来
			if ($information['d'] >= $part_sum) {
				//这个是最后一个分片数据
				//判断是否是最后一个数据库，是则让程序停住
				if (($information['table_num'] + 1) >= $table_sum_totle) {
					$data_status = 0;
					$size        = $table_sum_totle;
				} else {
					//不是最后一个数据库，执行下一个数据库
					$next_url                       = 'start_recover';
					$nex_num                        = $information['table_num'] + 1;
					$this_table_name                = $config_install['mysql_table_name'][$nex_num];
					$other_patam['next_table_name'] = '正在还原' . C('DB_PREFIX') . $this_table_name . '表结构';
					$d                              = 0;
					$size                           = $nex_num;
					$info                           = C('DB_PREFIX') . $information['table_name'] . '表数据第' . $information['d'] . '分片数据还原成功';
				}
			} else {
				$this_table_name                = $information['table_name'];
				$nex_num                        = $information['table_num'];
				$d                              = $information['d'] + 1;
				$size                           = $information['table_num'] + ($information['d'] / $table_sum_totle);
				$other_patam['next_table_name'] = '正在还原' . C('DB_PREFIX') . $this_table_name . '表的第' . $d . '分片数据';
				$info                           = C('DB_PREFIX') . $this_table_name . '表数据第' . $information['d'] . '分片数据还原成功';
			}

			//拼装数据

			$install_url_param = array(
				'table_name' => $this_table_name,
				'dir_name'   => $information['dir_name'],
				'table_num'  => $nex_num,
				'd'          => $d
			);
			$da_ajax           = set_ajaxReturn($info, U($next_url, $install_url_param), $data_status, $size, $table_sum_totle, $other_patam);
			$this->ajaxReturn($da_ajax, 'JSON');
			exit;
		} else {
			//不是分片数据
			$data_name = $back_dir_url . $information['table_name'] . '_data.php';

			if (is_file($data_name)) {
				$data_array = include_once $data_name;
				if ($data_array) {
					$data_array_keys = array_keys($data_array[0]);
					$data_array_keys = implode('`,`', $data_array_keys);
					//循环数据文件里面的数据
					foreach ($data_array as $kk => $vv) {
						$data_array_value = array_values($vv);

						$data_array_value = implode("','", $data_array_value);
						//$data_array_value = iconv("UTF-8", "GBK", $data_array_value);
						$menu_sql = "insert into $table_name (`$data_array_keys`) values ('$data_array_value')";
						M()->query($menu_sql);
					}
				}
			}

			//拼装数据
			$nex_num = $information['table_num'] + 1;
			//把超级用户信息添加到数据中
			if ($nex_num >= $table_sum_totle) {
				$data_status = 0;
			}
			$next_table_name                = $config_install['mysql_table_name'][$nex_num];
			$install_url_param              = array(
				'table_name' => $next_table_name,
				'dir_name'   => $information['dir_name'],
				'table_num'  => $nex_num
			);
			$other_patam['next_table_name'] = '正在还原' . C('DB_PREFIX') . $next_table_name . '表结构';
			$size                           = $information['table_num'] + 0.5;
			$da_ajax                        = set_ajaxReturn($table_name . '表数据还原完成！', U('start_recover', $install_url_param), $data_status, $size, $table_sum_totle, $other_patam);
			$this->ajaxReturn($da_ajax, 'JSON');
			exit;
		}
	}


	/**
	 * 管理备份目录
	 */
	public function catalog() {
		header("Content-Type:text/html;charset=utf-8");
		$search_name = I('search_name');
		$dir_url     = './File/backup';
		$dir_arr     = scandir($dir_url);
		$list_dir    = array();
		$index       = 0;
		foreach ($dir_arr as $k => $v) {
			if ($v == '.' || $v == '..') {
				continue;
			}
			$file_url = $dir_url . '/' . $v;
			//判断有该目录
			if (is_dir($file_url)) {
				$dir_name = iconv('gbk', 'utf-8', $v);
				//判断如果有搜索条件
				if ($search_name) {
					//如果满足搜索条件
					if (strpos($dir_name, $search_name) !== false) {


						$dir['name']  = $dir_name;
						$dir['time']  = filectime($file_url);
						$dir['index'] = $index;
						//备份说明
						$explain_content = file_get_contents($file_url . '/ly_backup_explain.txt');
						$max_sum         = count_string($explain_content);


						$start_str   = mb_strpos($explain_content, '备份说明：', null, 'UTF-8');
						$end_str     = mb_substr($explain_content, $start_str + 5, $max_sum, 'UTF-8');
						$time_start  = mb_strpos($explain_content, '备份时间：', null, 'UTF-8');
						$dir['time'] = mb_substr($explain_content, $time_start + 5, 19, 'UTF-8');

						$dir['content'] = $end_str;
						//备份状态
						$config_url = $dir_url . '/' . $dir_name . '/config.php';
						//如果有配置文件
						if (is_file($config_url)) {
							$config_data   = include_once $config_url;
							$dir['status'] = $config_data['status'];
						}
						$list_dir[] = $dir;
						$index++;
					}
				} else {
					$dir['name']  = $dir_name;
					$dir['time']  = filectime($file_url);
					$dir['index'] = $index;
					//备份说明
					$explain_content = file_get_contents($file_url . '/ly_backup_explain.txt');
					$max_sum         = count_string($explain_content);
					$start_str       = mb_strpos($explain_content, '备份说明：', null, 'UTF-8');
					$end_str         = mb_substr($explain_content, $start_str + 5, $max_sum, 'UTF-8');
					
					$time_start=mb_strpos($explain_content, '备份时间：', null, 'UTF-8');
					$dir['time']         = mb_substr($explain_content, $time_start + 5, 19, 'UTF-8');

					$dir['content']  = $end_str;
					//备份状态
					$config_url = $dir_url . '/' . $dir_name . '/config.php';

					//如果有配置文件
					if (is_file($config_url)) {
						$config_data   = include_once $config_url;
						$dir['status'] = $config_data['status'];
					}
					$list_dir[] = $dir;
					$index++;
				}
			}
		}
		$this->assign('search_name', $search_name);
		$this->assign('list', $list_dir);
		$this->display();
	}


	/**
	 * 删除目录
	 */
	public function delete_dir() {
		$dir_name = get('dir_name', 'strval', '');
		if ($dir_name) {
			$delete_dir_url = $this->dir_url . $dir_name;
			if (is_dir($delete_dir_url)) {
				delete_dir($delete_dir_url);
				$this->success('删除成功！');
			} else {
				$this->error('不是文件夹！');
			}
		}
		$dir_arr = I('post.dir_name');
		if (is_array($dir_arr) > 0) {
			foreach ($dir_arr as $k => $v) {
				$delete_dir_url = $this->dir_url . $v;
				if (is_dir($delete_dir_url)) {
					delete_dir($delete_dir_url);
				} else {
					$this->error('有一个目录没有找到！');
				}
			}
			$this->success('删除成功！');
		}
	}


	/**
	 * 优化数据库
	 */
	public function optimize_table() {
		$data = I();
		if ($data['mysql_table_name']) {
			foreach ($data['mysql_table_name'] as $k => $v) {
				$table_name = get_table_name($v);
				$sql        = "OPTIMIZE TABLE `$table_name`;";
				$num        = M()->query($sql);
			}
			if ($num) {
				$da = set_ajaxReturn('优化数据库成功！');
			} else {
				$da = set_ajaxReturn('优化数据库失败！', '', 0);
			}
			$this->ajaxReturn($da, 'JSON');
		}
	}


	/**
	 * 清空数据库
	 */
	public function empty_table() {
		$data = I();
		if ($data['mysql_table_name']) {
			foreach ($data['mysql_table_name'] as $k => $v) {
				$table_name = get_table_name($v);
				$sql        = "TRUNCATE TABLE `$table_name`;";
				$num        = M()->query($sql);
			}
			$da = set_ajaxReturn('清空数据库成功！');

			$this->ajaxReturn($da, 'JSON');
		}
	}


	/**
	 * 删除数据库
	 */
	public function delete_table() {
		$data = I();
		if ($data['mysql_table_name']) {
			foreach ($data['mysql_table_name'] as $k => $v) {
				$table_name = get_table_name($v);
				$sql        = "DROP TABLE IF EXISTS `$table_name`;";
				$num        = M()->query($sql);
			}
			if ($num >= 0) {
				$da = set_ajaxReturn('删除数据库成功！');
			} else {
				$da = set_ajaxReturn('删除数据库失败！', '', 0);
			}
			$this->ajaxReturn($da, 'JSON');
		}
	}


	/**
	 * 选择目录前遍历目录
	 */
	public function dir_select() {

		$dir_url  = './File/backup';
		$dir_arr  = scandir($dir_url);
		$list_dir = array();
		$index    = 0;
		foreach ($dir_arr as $k => $v) {
			if ($v == '.' || $v == '..') {
				continue;
			}
			$file_url = $dir_url . '/' . $v;
			if (is_dir($file_url)) {
				$dir['name']  = iconv('gbk', 'utf-8', $v);
				$dir['time']  = filectime($file_url);
				$dir['index'] = $index;
				$list_dir[]   = $dir;
				$index++;
			}
		}
		$this->assign('list', $list_dir);
		$this->display();
	}


	/**
	 * 选择目录前遍历目录
	 */
	public function dir_recover() {

		$dir_url  = './File/backup';
		$dir_arr  = scandir($dir_url);
		$list_dir = array();
		$index    = 0;
		foreach ($dir_arr as $k => $v) {
			if ($v == '.' || $v == '..') {
				continue;
			}
			$file_url = $dir_url . '/' . $v;
			if (is_dir($file_url) && (substr($v, 0, 4) == 'data')) {
				$dir['name']  = iconv('gbk', 'utf-8', $v);
				$dir['time']  = filectime($file_url);
				$dir['index'] = $index;
				$list_dir[]   = $dir;
				$index++;
			}
		}
		$this->assign('list', $list_dir);
		$this->display();
	}


	/**
	 * 执行备份
	 */
	public function do_back() {
		$data = I();
		//dump($data['name']);exit;
		//todo cs ：为了测试不产生更多的文件夹，因此把$data['name']换成了$data[5]
		//生成备份配置文件
		if ($data['mysql_table_name']) {
			//准备各表备份状态
			foreach ($data['mysql_table_name'] as $k => $v) {
				$data['table_name_status'][$v] = 0;
			}
			//配置的其他信息
			$data['status'] = false;
			$data['time']   = time();
			$new_back_url   = $this->dir_url . $data['name'] . '/';
			delete_dir($new_back_url);
			FF('config', $data, $new_back_url);
			// 创建备份说明
			$br     = "\r\n";
			$string = '粮易数据备份' . $br . $br;
			$string .= '备份时间：' . date('Y-m-d H:i:s', $data['time']) . $br . $br;
			$string .= '备份说明：' . $br . $br;
			$string .= get_default_data($data['explain'], '未说明');
			write($new_back_url . 'ly_backup_explain.txt', $string);
			//开始备份
			$table_name = get_table_name($data['mysql_table_name'][0]);
			$create_sql = $this->get_create_table_sql($table_name, $data['option']);
			FF($data['mysql_table_name'][0] . '_sql', $create_sql, $new_back_url);
			//开始备份表数据
			$table_data_count = $this->count_table_data($table_name);
			//如果内容大于要求备份的条数
			if ($table_data_count[0]['sum'] > $data['line']) {
				$data_part = ceil($table_data_count[0]['sum'] / $data['line']);
				for ($i = 0; $i < $data_part; $i++) {
					$table_data_array = $this->get_table_data($table_name, $i * $data['line'], $data['line']);
					//写入数据
					$res           = FF($data['mysql_table_name'][0] . '_' . $i . '_data', $table_data_array, $new_back_url);
					$str_data_part = '分片数据';
				}
			} else {
				$table_data_array = $this->get_table_data($table_name);
				$res              = FF($data['mysql_table_name'][0] . '_data', $table_data_array, $new_back_url);
				$str_data_part    = '数据';
			}
			//把分片总数加入配置文件
			if (!$data_part) {
				$data_part = 0;
			}
			$sql_config = include_once $new_back_url . 'config.php';

			$sql_config['table_name_status'][$data['mysql_table_name'][0]] = $data_part;
			FF('config', $sql_config, $new_back_url);

			//为路径配置参数
			$url_para            = array(
				'table_name'  => $data['mysql_table_name'][1],
				'option'      => $data['option'],
				'dir_name'    => $data['name'],
				'table_index' => 0
			);
			$new_next_table_name = get_table_name($data['mysql_table_name'][1]);
			$da                  = set_ajaxReturn($table_name . '表结构' . $str_data_part . '备份成功！', U('do_back', $url_para), 1, 0, count($data['mysql_table_name']), array('next_table_name' => $new_next_table_name));

			$this->ajaxReturn($da, 'JSON');
		} else {
			//备份第二个以后的数据表

			$dir_name         = $this->dir_url . I('get.dir_name');
			$option           = I('get.option');
			$table_index      = I('get.table_index') + 1;
			$small_table_name = I('get.table_name');
			$config_file      = $dir_name . '/config.php';
			//判断config文件是否存在
			if (!is_file($config_file)) {
				$da = set_ajaxReturn('配置文件不存在，备份失败！', '', 0);
				$this->ajaxReturn($da, 'JSON');
			}
			$sql_config = include_once $config_file;
			//需要备份的数据库总数
			$totle_count = count($sql_config['mysql_table_name']);
			//开始备份
			$table_name = get_table_name($small_table_name);
			$create_sql = $this->get_create_table_sql($table_name, $option);
			FF($small_table_name . '_sql', $create_sql, $dir_name . '/');
			//备份表数据
			$table_data_count = $this->count_table_data($table_name);
			//如果内容大于要求备份的条数
			if ($table_data_count[0]['sum'] > $sql_config['line']) {

				$data_part = ceil($table_data_count[0]['sum'] / $sql_config['line']);
				for ($i = 0; $i < $data_part; $i++) {
					$table_data_array = $this->get_table_data($table_name, $i * $sql_config['line'], $sql_config['line']);
					FF($small_table_name . '_' . $i . '_data', $table_data_array, $dir_name . '/');
					$str_data_part = '分片数据';
				}
			} else {
				$table_data_array = $this->get_table_data($table_name);
				FF($small_table_name . '_data', $table_data_array, $dir_name . '/');
				$str_data_part = '数据';
			}

			//把分片总数加入配置文件
			if (!$data_part) {
				$data_part = 0;
			}
			$sql_config['table_name_status'][$small_table_name] = $data_part;
			//判断是最后一条把状态改为true,把备份过的数据库状态改为1
			if ($table_index >= $totle_count) {
				$sql_config['status'] = true;
				FF('config', $sql_config, $dir_name . '/');
				$da = set_ajaxReturn('备份成功！', '', 0);
				$this->ajaxReturn($da, 'JSON');
				exit;
			}
			FF('config', $sql_config, $dir_name . '/');
			//为路径配置参数
			$url_para            = array(
				'table_name'  => $sql_config['mysql_table_name'][$table_index],
				'option'      => $option,
				'dir_name'    => I('get.dir_name'),
				'table_index' => $table_index
			);
			$new_next_table_name = get_table_name($sql_config['mysql_table_name'][$table_index]);
			$da                  = set_ajaxReturn($table_name . '表结构和' . $str_data_part . '备份成功！', U('do_back', $url_para), 1, $table_index, $totle_count, array('next_table_name' => $new_next_table_name));
			$this->ajaxReturn($da, 'JSON');
		}
	}


	/**
	 *获取数据库建表sql
	 */
	public function get_create_table_sql($table_name, $install = 0) {
		M()->execute("SET SQL_QUOTE_SHOW_CREATE=1;"); // 设置引导
		$drop   = "DROP TABLE IF EXISTS `{$table_name}`;";
		$create = M()->query("SHOW CREATE TABLE `{$table_name}`;");
		//dump($create);exit;
		$create = $create[0]['Create Table'] . ';';

		// 备份成安装数据包，需要替换表前缀
		if ($install) {
			$create = str_replace('CREATE TABLE `' . C('DB_PREFIX'), 'CREATE TABLE `{@prefix}', $create);
			$drop   = str_replace('DROP TABLE IF EXISTS `' . C('DB_PREFIX'), 'DROP TABLE IF EXISTS `{@prefix}', $drop);
		}

		// 正则获取表名称并替换
		return array(
			'drop'   => $drop,
			'create' => $create
		);
	}


	/**
	 * 获取表数据
	 * @param $table_name   表名称
	 * @param int $start 开始值
	 * @param int $length 长度
	 * @return mixed
	 */
	public function get_table_data($table_name, $start = 0, $length = 0) {
		if ($length != 0) {
			$limit = ' limit ' . $start . ' , ' . $length;
		}
		$sql  = 'select * from ' . $table_name . $limit;
		$data = M()->query($sql);

		return $data;
	}


	/**
	 * 计算表中数据总共多长
	 * @param $table_name
	 * @return mixed
	 */
	public function count_table_data($table_name) {
		$sql   = 'select count("id") as sum from ' . $table_name;
		$count = M()->query($sql);

		return $count;
	}
}