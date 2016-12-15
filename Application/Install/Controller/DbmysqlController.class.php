<?php
/**
 * @author 韩威兵^life <1877361302@qq.com>
 * @copyright 2016 - 2016 粮易网 <jztl2012@163.com>
 * @version $Id: 2016/9/2 10:36 ly2.0 DbmysqlController.class.php 韩威兵^life $
 */
namespace Install\Controller;
class DbmysqlController extends \Think\Controller{
	public $config;
	public $link;
	public $error;


	/*public function __construct($config) {
			$this->config = $config;
			$this->connect();
		}*/
	/**
	 * 链接数据库
	 */
	public function connect($config) {
		$this->config = $config;
		$host = $this->config['host'] ? $this->config['host'] : 'localhost';
		$host = $this->config['port'] ? $host . ':' . $this->config['port'] : $host;
		$this->link = mysql_connect($host, $this->config['username'], $this->config['password']);
		if (!$this->link) {
			throw_exception(mysql_error());
		}
	}

	/**
	 * 执行QUERY查询
	 * @return array|boolean
	 */
	public function query($query) {
		$result = mysql_query($query);
		if (false !== $result) {
			$list = array();
			while ($r = mysql_fetch_assoc($result)) {
				$list[] = $r;
			}
			return $list;
		}
		$this->error = mysql_error();
		return false;
	}

	/**
	 * 执行QUERY查询
	 * @return boolean|resource
	 */
	public function execute($query) {
		$result = mysql_query($query);
		if (false !== $result) return $result;
		$this->error = mysql_error();
		return false;
	}

	public function close() {
		mysql_close($this->link);
	}

	/**
	 * 返回错误
	 * @return string
	 */
	public function getError() {
		return $this->error;
	}

	public function __destruct() {
		$this->close();
	}
}