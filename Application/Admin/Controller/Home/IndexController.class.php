<?php
/**
 * 基础类
 * @author 韩威兵^life <1877361302@qq.com>
 * @copyright 2016 - 2016 粮易网 <jztl2012@163.com>
 * @version $Id: 2016/8/2 8:08 liangyi2.0 IndexController.class.php 韩威兵^life $
 */
namespace Admin\Controller\Home;
use Think\Controller;
use Admin\Controller\Home\AdminController;

class IndexController extends AdminController {
	public function _initialize() {
		//验证登录
		$this->checked_login();
		//判断session是否过期
		$this->session_compare();

		//后台用户session
		$user = $_SESSION['admin_user'];
		$this->assign('user', $user);

		//为每次执行的时候出现左侧栏目
		$action = explode('/', __ACTION__);

		$index = count($action);
		for ($i = $index - 4; $i < $index; $i++) {
			$action_url[] = $action[$i];
		}
		$active = $action_url[1] . '/' . $action_url[2] . '/' . $action_url[3];

		$content = $this->return_menu_panel_two($action_url[1], $active);
		$this->assign('menu_panel', $content);

		//todo ly:二级菜单遍历还没有坐上
		//头部一级菜单显示
		$model_auth = M('auth_group');
		//根据权限组查找一级菜单
		$field      = $model_auth->where('id=' . $user['group_id'])->find();
		$auth_top   = explode(',', $field['top']);
		$auth_three = explode(',', $field['three']);
		//验证权限是否能访问该方法
		$this->is_auth($action_url, $auth_top, $auth_three);

		$model_admin_menu = M('admin_menu');
		//超超级管理员不需要权限。todo ly:这可能是一个隐患，后期删掉
		if ($user['group_id'] != 0) {
			$where['top'] = array('in', $field['top']);
		}

		$where['rank']    = 1;
		$where['is_show'] = 1;
		$top_menu         = $model_admin_menu->where($where)->order('reorder asc')->select();
		$this->assign('top_menu', $top_menu);
		$this->assign('top_active', $action_url[1]);

		//面包屑导航
		$where_m['top']    = $action_url[1];
		$where_m['second'] = $action_url[2];
		$where_m['three']  = $action_url[3];
		$menu_name         = $model_admin_menu->where($where_m)->find();

		$this->assign('menu_name', $menu_name);
		//定义方便路径
		$url = __ACTION__;
		$this->assign('url', $url);
	}


	/**
	 * 判断权限
	 */
	public function is_auth($url_array, $auth_top, $auth_three) {

		$user = $_SESSION['admin_user'];
		//判断是否是开发者权限
		if ($user['group_id'] != 0) {
			unset($url_array[0]);
			//三级目录字符串
			$url = strtolower(implode('/', $url_array));
			//两级目录字符串
			$controller_url = strtolower($url_array[1] . '/' . $url_array[2]);
			//判断不是首页则需要判断权限
			if ($controller_url != 'home/index') {
				//判断顶级菜单是否拥有权限
				if (!in_array(strtolower($url_array[1]), $auth_top)) {
					$this->error('您的权限不够，请联系管理员');
				}
				//判断三级目录是否拥有权限
				if (!in_array($url, $auth_three)) {
					$this->error('您的权限不够，请联系管理员');
				}
			}
		}
	}


	/**
	 * 后台首页
	 */
	public function index() {

		$url     = './Application/Admin/View/index_menu.html';
		$content = $this->fetch($url);
		$this->assign('menu', $content);
		$this->assign('user', $_SESSION['admin_user']);

		$this->display();
	}


	/**
	 * AJAX 获取左侧栏目导航
	 */
	public function menu_panel() {
		$top     = I('top');
		$content = $this->return_menu_panel_two($top);
		$this->success($content);
	}


	/**
	 * 根据顶级栏目选择二级和三级菜单
	 * @param $top
	 * @return mixed
	 */
	public function return_menu_panel_two($top, $active = '') {

		$active = strtolower($active);

		$model_auth  = M('auth_group');
		$user        = $_SESSION['admin_user'];
		$auth_field  = $model_auth->where('id=' . $user['group_id'])->find();
		$auth_three  = explode(',', $auth_field['three']);
		$auth_second = explode(',', $auth_field['second']);

		$model_menu       = M('admin_menu');
		$where['top']     = $top;
		$where['rank']    = array('neq', 1);
		$where['is_show'] = 1;
		$data_list_old    = $model_menu->where($where)->order('reorder asc')->select();

		//判断权限，是否是超超级用户
		if ($user['group_id'] == 0) {
			$data = $data_list_old;
		} else {
			$data = $this->checked_auth_mune_data($data_list_old, $auth_second, $auth_three);
		}
		//校验权限，并列出菜单

		$new_data = array();

		//整理菜单列表
		foreach ($data as $kk => $vv) {

			//判断二级菜单给新的数组
			if ($vv['rank'] == 2) {

				$new_data[] = $vv;

				foreach ($data as $kkk => $vvv) {
					//判断三级菜单给新的数组
					if ($vvv['rank'] == 3 && $vvv['second'] == $vv['second']) {
						if ($vvv['is_show'] == 1) {
							$new_data[] = $vvv;
						}
					}
				}
			}
		}
		foreach ($new_data as $k => $v) {
			$action_url           = $v['top'] . '/' . $v['second'] . '/' . $v['three'];
			$new_data[$k]['href'] = __APP__ . '/admin/' . $action_url;

			if ($action_url == $active) {
				$new_data[$k]['three_active'] = 'active';
			}
		}

		$this->assign('data', $new_data);
		$url     = './Application/Admin/View/menu-panel.html';
		$content = $this->fetch($url);

		return $content;
	}

	/**
	 * 需要校验的数据  	 * 权限操作
	 * @param $data_list_old
	 * @param $auth_second
	 * @param $auth_three
	 * @return array
	 */
	public function checked_auth_mune_data($data_list_old, $auth_second, $auth_three) {
		foreach ($data_list_old as $kv => $vk) {
			$str_second = $vk['top'] . '/' . $vk['second'];
			$str_three  = $vk['top'] . '/' . $vk['second'] . '/' . $vk['three'];
			if ($vk['rank'] == 2) {
				if (in_array($str_second, $auth_second)) {
					$data[] = $data_list_old[$kv];
				}
			}
			if (in_array($str_three, $auth_three)) {
				$data[] = $data_list_old[$kv];
			}
		}

		return $data;
	}


	/**
	 * 验证登陆
	 */
	public function checked_login() {
		$logo    = $this->login_home();
		$session = $_SESSION['admin_user'];
		if (!$session) {
			$this->error('请登陆后操作', $logo);
		}
	}


	/**
	 * 返回登陆首页
	 */
	public function login_home() {
		return __APP__ . '/admin';
	}

}