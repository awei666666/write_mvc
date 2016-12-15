<?php
/**
 * @author 韩威兵^life <1877361302@qq.com>
 * @copyright 2016 - 2016 粮易网 <jztl2012@163.com>
 * @version $Id: 2016/8/2 10:44 liangyi2.0 AdminController.class.php 韩威兵^life $
 */
namespace Admin\Controller\Home;
use Think\Controller;

class AdminController extends Controller{
	/**
	 * 验证码显示
	 */
	public function code(){
		$config =    array(
			'fontSize'    =>    14,
			// 验证码字体大小
			'length'      =>    4,
			// 验证码位数
			'useNoise'    =>    false,
			// 关闭验证码杂点
		);
		$Verify =     new \Think\Verify($config);
		$Verify->entry();
	}
	/**
	 * 登陆操作
	 */
	public function login(){
		$user=I('username');
		$passwored=I('password');

		$code=I('code');
		$code_res=$this->checked_code($code);
		if(!$code_res){
			$this->error('验证码输入错误！');
		}
		$model_admin=M('admin_user');
		$data['user']=$user;
		$res=$model_admin->where($data)->find();

		if(!$res){
			$this->error('用户密码错误','user');
		}
		$pass=md5($passwored);
		if($pass!=$res['password']){
			$this->error('用户密码错误','pass');
		}
		if ($res['status'] == 0) {
			$this->error('该账号已被禁用，如有疑问请联系管理员！', 'status');
		}
		session('uid',$res['id']);	//管理员ID
		session('user',$res['user']);	//管理员用户

		//登陆成功，存入登陆ip和时间，存入session
		$ip = get_client_ip();
		$data_save['login_ip']=$ip;
		$data_save['last_login_time']=time();
		$data_save['login_nums']=$res['login_nums']+1;
		$ress=$model_admin->where('id='.$res['id'])->save($data_save);
		//$res['login_ip']=$ip;
		//$res['last_login_time']=$data_save['last_login_time'];
		//$res['login_nums']=$data_save['login_nums'];
		//因为首页需要上次登陆信息，所以这里不能存入最新的信息
		if($ress){
			session('last_time',time());
			session('admin_user',$res);

			$this->success('登陆成功！',U('admin/home/index/index'));
		}else{
			$this->error('登陆失败，请联系管理员！');
		}

	}

	/**
	 * 验证验证码
	 */
	public function checked_code($code,$id=''){
		$verify = new \Think\Verify();
		return $verify->check($code, $id);
	}

	/**
	 * 退出登陆
	 */
	public function out_login(){
		$login=$this->login_home();

		session('admin_user',null);
		$this->success('成功退出！',$login);
	}
	/**
	 * 返回登陆首页
	 */
	public function login_home(){
		return  __APP__ . '/admin';
	}
	/**
	 *比较session时间是否过期，如果没有过期，则给session一个新的时间
	 */
	public function session_compare(){
		$last_time=$_SESSION['last_time'];
		$config_data=look_config_data();
		$new_time=$last_time+$config_data['session_expire_time'];
		$res=time_compare($new_time);
		if($res){
			session('last_time',time());
		}else{
			session('admin_user',null);
			$this->error('您的登录超时，请重新登录！',$this->login_home());
		}
	}

	/**
	 * 封装删除方法，方便以后调用
	 * @param $model  要操作的表
	 * @param string $id 要接收的name属性
	 */
	public function paner_delete($model, $id_index = 'id') {
		$id = get($id_index, 'intval', 0);

		if ($id) {
			$res = $model->delete($id);
			if ($res) {
				$this->success('删除成功！');
			} else {
				$this->error('删除失败！');
			}
		} else {
			$ids  = I($id_index);
			$ids  = implode(',', $ids);
			$ress = $model->delete($ids);
			if ($ress) {
				$this->success('删除成功！');
			} else {
				$this->error('删除失败！');
			}
		}
	}

}