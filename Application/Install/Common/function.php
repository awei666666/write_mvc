<?php
/**
 * 公共函数库
 * @author 韩威兵^life <1877361302@qq.com>
 * @copyright 2016 - 2016 粮易网 <jztl2012@163.com>
 * @version $Id: 2016/8/8 9:32 liangyi2.0 function.php 韩威兵^life $
 */

/**
 * 动态获取数据库名称
 * @param $table_name 数据库除前缀的名称
 * @return string 返回动态数据库名称
 */
function get_table_name($table_name) {
	$str = C('DB_PREFIX') . $table_name;

	return $str;
}

/**
 * get数据校验
 * @param $data   要校验的值
 * @param string $index 校验的规则
 * @param int $default 为空的默认值
 * @return float|int|string
 */
function get($data, $index = '', $default = 0) {
	if ($index == 'intval') {
		$get_data = intval($_GET[$data]) ? intval($_GET[$data]) : $default;
	} elseif ($index == 'floatval') {
		$get_data = floatval($_GET[$data]) ? floatval($_GET[$data]) : $default;
	} elseif ($index == 'strval') {
		$get_data = strval($_GET[$data]) ? strval($_GET[$data]) : $default;
	} elseif ($index == 'strtolower') {
		$get_data = strtolower($_GET[$data]) ? strtolower($_GET[$data]) : $default;
	} else {
		$get_data = $_GET[$data];
	}

	return $get_data;
}

/**
 * 对二维数组进行某个字段排序
 * @param array $array  *要排序的数组
 * @param string $field  要排序的字段名称
 * @param string $sort   排序方式 desc 或asc
 * @return array|bool
 */
function array_two_sort($array = array(), $field = '', $sort = 'desc') {
	$list = $array;

	if ($sort == 'asc') {
		for ($i=0;$i<count($array);$i++) {
			for($j=$i;$j<count($array);$j++) {
				if ($array[$i][$field] > $array[$j][$field]) {

					$list[$i]  = $array[$j];
					$list[$j] = $array[$i];
				}
			}
		}
	} elseif ($sort == 'desc') {
		for ($i=0;$i<count($array);$i++) {
			for($j=$i;$j<count($array);$j++) {
				if ($array[$i][$field] < $array[$j][$field]) {
					$list[$i]  = $array[$j];
					$list[$j] = $array[$i];
				}
			}
		}
	}else{
		return false;
	}
	return $list;
}

/**
 * 组装ajax返回数据
 * @param $info %返回的重要信息
 * @param string $url 路径
 * @param int $status 状态
 * @param int $size  小值
 * @param int $totle  大值
 *
 */
function set_ajaxReturn($info,$url='',$status=1,$size=0,$totle=0,$array=array()) {

	$data['status'] =$status;
	$data['info'] = $info;
	$data['size'] = $size;
	$data['url'] = $url;
	$data['totle']=$totle;

	if(!empty($array)){
		$key=array_keys($array);

		foreach($key as $k=>$v){
			$data[$v]=$array[$v];
		}
	}
	return $data;
}

/**
 * 快速文件数据读取和保存 针对简单类型数据 字符串、数组
 * @param string $name 缓存名称
 * @param mixed $value 缓存值
 * @param string $path 缓存路径
 * @return mixed
 */
function FF($name, $value='', $path='') {
	static $_cache  = array();
	$filename       = $path . $name . '.php';
	if ('' !== $value) {
		if (is_null($value)) {
			// 删除缓存
			return false !== strpos($name,'*')?array_map("unlink", glob($filename)):unlink($filename);
		} else {
			// 缓存数据
			$dir            =   dirname($filename);
			// 目录不存在则创建
			if (!is_dir($dir))
				mkdir($dir,0755,true);
			$_cache[$name]  =   $value;
			return file_put_contents($filename, strip_whitespace("<?php\treturn " . var_export($value, true) . ";?>"));
		}
	}
	if (isset($_cache[$name]))
		return $_cache[$name];
	// 获取缓存数据
	if (is_file($filename)) {
		$value          =   include $filename;
		$_cache[$name]  =   $value;
	} else {
		$value          =   false;
	}
	return $value;
}


