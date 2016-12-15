<?php
/**
 * 公共函数库
 * @author 韩威兵^life <1877361302@qq.com>
 * @copyright 2016 - 2016 粮易网 <jztl2012@163.com>
 * @version $Id: 2016/8/8 9:32 liangyi2.0 function.php 韩威兵^life $
 */

/*  1:get()     <get 数据校验>;  2：post()   <post 数据校验>;
 *  3： look_config_data()    <读取配置文件信息>;
 *  4:formatBytes()    <把字节数转变成友好的数据>;
 *  5：FF()             <快速文件数据读取和保存 针对简单类型数据 字符串、数组> ;
 *  6：delete_dir()     < 删除指定的文件夹，可以删除文件夹内容所有内容>;
 *  7: write()          <向指定的文件中写内容，如果文件夹不存在则自动创建，可多级创建文件夹>
 *  8：set_ajaxReturn()  <组装ajax返回数据,还待优化>
 *  9：count_string()     <计算字符串长度，支持中文为一个文字算一个>
 *  10:time_compare()     < 比较时间戳跟现在的时间戳，比现在的大返回1，比现在的小返回0>
 *  11:get_data_to_option() <将二位数组转换成option标签>
 *  12: get_one_arr_option() <将一维数组转换成option标签,为空则默认option>
 */
/**
 * get数据校验
 * @param $data   要校验的值
 * @param string $index   校验的规则
 * @param int $default   为空的默认值
 * @return float|int|string
 */
function get($data,$index='',$default=0){
	if($index=='intval'){
		$get_data=intval($_GET[$data])?intval($_GET[$data]):$default ;
	}elseif($index=='floatval'){
		$get_data=floatval($_GET[$data])?floatval($_GET[$data]):$default;
	}elseif($index=='strval'){
		$get_data=strval($_GET[$data])?strval($_GET[$data]):$default;
	}elseif($index=='strtolower'){
		$get_data=strtolower($_GET[$data])?strtolower($_GET[$data]):$default;
	}else{
		$get_data=$_GET[$data];
	}
	return $get_data;
}
/**
 * post数据校验
 * @param $data   要校验的值
 * @param string $index   校验的规则
 * @param int $default   为空的默认值
 * @return float|int|string
 */
function post($data,$index='intval',$default=0){
	if($index=='intval'){
		$post_data=intval($_POST[$data])?intval($_POST[$data]):$default ;
	}elseif($index=='floatval'){
		$post_data=floatval($_POST[$data])?floatval($_POST[$data]):$default;
	}elseif($index=='strval'){
		$post_data=strval($_POST[$data])?strval($_POST[$data]):$default;
	}elseif($index=='strtolower'){
		$post_data=strtolower($_POST[$data])?strtolower($_POST[$data]):$default;
	}
	return $post_data;
}
/**
 * 把字节数转变成友好的数据
 * @param $size 需要转变的字节数
 * @return string
 */
function formatBytes($size) {
	$units = array(' B', ' KB', ' MB', ' GB', ' TB');
	for ($i = 0; $size >= 1024 && $i < 4; $i++) {
		$size /= 1024;
	}
	return round($size, 2) . $units[$i];
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
/**
 * 删除指定的文件夹，可以删除文件夹内容所有内容
 * @param string $filename 要删除的文件夹路径
 * @param boolean $empty 是否保留文件夹，true为保留文件夹，false为包含文件夹一起删除
 * @return bool
 */
function delete_dir($filename, $empty = false) {
	// 首先要删除目录下的所有文件
	$handle = opendir($filename);
	while ($file = readdir($handle)) {
		if ($file === '.' || $file === '..') {
			continue;
		}
		$file_path = $filename . '/' . $file;
		// 文件
		if (!is_dir($file_path)) {
			unlink($file_path);
		} else {
			delete_dir($file_path, false);
		}
	}
	closedir($handle);
	if ($empty) {
		return true;
	}

	return rmdir($filename);
}
/**
 * 向指定的文件中写内容，如果文件夹不存在则自动创建，可多级创建文件夹
 * @param string $filename 文件名路径
 * @param string $string 要写入的内容
 * @param boolean $encode 是否转义写入的内容
 * @return boolean
 */
function write($filename, $string = '', $encode = false) {
	if ($encode) {
		$string = stripslashes($string);
	}
	// 创建文件夹
	$path_info = pathinfo($filename);
	if ($path_info['dirname'] && !is_dir($path_info['dirname'])) {
		$result = create_dir($path_info['dirname']);
		if (false === $result) {
			return false;
		}
	}
	// 写内容
	$handle = fopen($filename, "w");
	if (false === $handle) {
		return false;
	}
	$result = fwrite($handle, $string);
	if (false === $result) {
		return false;
	}
	fclose($handle);

	return chmod($filename, 0777);
}
/**
 * 组装ajax返回数据
 * @param $info %返回的重要信息
 * @param string $url 路径
 * @param int $status 状态
 * @param int $size  小值
 * @param int $totle  大值
 * todo :待优化
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
 * 计算字符串长度，支持中文为一个文字算一个
 * @param string $string 要计算的字符串
 * @return int
 */
function count_string($string = '') {
	if (!$string) {
		return 0;
	}
	if (function_exists('mb_strlen')) {
		return mb_strlen($string, 'utf-8');
	} else {
		preg_match_all("/./u", $string, $array);

		return count($array[0]);
	}
}
/**
 * 比较时间戳跟现在的时间戳，比现在的大返回1，比现在的小返回0
 * @param int $time_data 需要比较的时间戳
 * @return int
 */
function time_compare($time_data = 0) {
	if ($time_data > time()) {
		return 1;
	} else {
		return 0;
	}
}
/**
 * 将二位数组转换成option标签
 * @param $list *要显示的列表数组，必须是二位数组
 * @param string $selected_val  选中$option_val的值
 * @param string $option_val  需要显示value的二维数组的字段
 * @param string $option_text 需要显示text的二维数组的字段
 * @param string $default_text  没有选中的值的默认text值
 * @param string $default_val  没有选中的值的默认value值
 * @return string
 */
function get_data_to_option($list, $selected_val = '', $option_val = '', $option_text = '', $default_text = '请选择', $default_val = '0') {
	//header("Content-type: text/html; charset=utf-8");
	$string          = '<option value="' . $default_val . '" >' . $default_text . '</option>';
	$val             = $option_val == '' ? 'id' : $option_val;
	$text            = $option_text == '' ? 'id' : $option_text;
	$option_selected = '';
	foreach ($list as $k => $v) {
		if ($v[$val] == $selected_val) {
			$option_selected = 'selected';
		}else{
			$option_selected='';
		}
		$string .= '<option value="' . $v[$val] . '"' . $option_selected . '>' . $v[$text] . '</option>';
	}
	return $string;
}
/**
 * 将一维数组转换成option标签，为空则默认option
 * @param $array *要转换的一维数组
 * @param string $option_val 需要显示value的二维数组的字段
 * @param string $option_text 需要显示text的二维数组的字段
 * @param string $default_text 没有选中的值的默认text值
 * @param string $default_val 没有选中的值的默认value值
 * @return string
 */
function get_one_arr_option($array,$option_val='',$option_text='',$default_text = '请选择', $default_val = '0'){
	if(empty($array)){
		$string='<option value="'.$default_val.'" >'.$default_text.'</option>';
	}else{
		$val             = $option_val == '' ? 'id' : $option_val;
		$text            = $option_text == '' ? 'id' : $option_text;
		$string='<option value="' . $array[$val] . '" >' . $array[$text] . '</option>';
	}
	return $string;
}

/**
 * 动态获取数据库名称
 * @param $table_name 数据库除前缀的名称
 * @return string 返回动态数据库名称
 */
function get_table_name($table_name){
	$str=C('DB_PREFIX').$table_name;
	return $str;
}

/**
 * 获取某个值为空的时候用另外一个值代替
 * @param mixed $string 被比较的值
 * @param mixed $default 默认值
 * @return mixed
 */
function get_default_data($string, $default = '') {
	return empty($string) ? $default : $string;
}

