<?php
/**
 * @author 孙美芳^life <344794095@qq.com>
 * @copyright 2016 - 2016 粮易网 <jztl2012@163.com>
 * @version $Id: 2016/9/21 0021 上午 8:19 ly2.0 Upload.php 孙美芳^life $
 */

namespace Think;
use Think\Upload;
use Think\Image;
/**
 * Class Uploadfile 附件上传类
 * @category Think
 */
class Uploadfile extends Upload{
	private $uid;//用户id
	private $error;
	private $attach_class;//附件分类模型
	private $attach = array();//附件分类信息
	private $rootPath;//自定义的上传目录
	private $subName;//目录配置
	/**
	 * 构造器
	 * @param bool $check_token 是否验证密钥
	 */
	public function __construct($check_token = true) {
		$this->attach_class =  M("attachmentclass");
		//todo   判断登录 ----会员未做
		if(!empty($_SESSION['admin_user'])){
			$user =session('admin_user');
			$this->uid =$user['userid'];
		}else{
			//$this->error("请登录");
			return false;
		}
		$attach_config = M("attachment_config")->where("name='附件设置'")->field('value')->find();
		$this->upconfig = json_decode($attach_config['value'], true);




		$this->subName =array('date',$this->upconfig['format'] );

	}
	public function __set($property_name, $value)
	{
		//echo "在直接设置私有属性值的时候，自动调用了这个 __set() 方法为私有属性赋值<br />";
		$this->$property_name = $value;
	}
	function __get($property_name) {
		//echo "在直接获取私有属性值的时候，自动调用了这个 __get() 方法<br />";
		return isset($this->$property_name) ? $this->$property_name : null;
	}

	/**
	 * @param $name 上传的附件的分类标识
	 * @param $file 上传的附件的路径
	 * 分类标识可以从后台--设置--附件分类中设置、查找
	 */
	public function uploading($file='',$name='other'){
		$this->rootPath=empty($this->rootPath)?$this->upconfig['save_path']:$this->upconfig['save_path'].$this->rootPath;
		if(!is_dir($this->rootPath)){
			@mkdir($this->rootPath, 0700);
		}
		if('' === $file){
			$file  =   $_FILES;
		}
		if(empty($_FILES)){
			$this->error="没有文件上传";
			return false;
		}

		$this->attach= $this->get_attach_class($name);
		if(false === $this->attach){
			$this->error="没有".$name."为上传类型分类";
			return false;
		}
		if($this->attach['type']=='image'){
			$data = $this->deal_pic($file);
		}else{
			$data = $this->deal_others($file);
		}
		return $data;
	}


	/** 处理图片
	 * @param $file 附件
	 */
	private function deal_pic($file_source){
		$files = $this->make_pic($file_source);
		$this->record($files);
		return $files;
	}
	/** 处理视频、文件等其他
	 * @param $file 附件
	 */
	private function deal_others($tmp_file){

		$count =$this->getmaxdim($tmp_file);//得到是数组维数
		if($count ==1) $file[] = $tmp_file;
		else $file = $tmp_file;
		$i=0;
		foreach($file as $f) {
			$f['ext'] = pathinfo($f['name'], PATHINFO_EXTENSION);
			if (false === $this->check($f)) {
				return false;
			}
			$Upload           = new Upload();
			$Upload->rootPath = $this->rootPath;
			$Upload->subName  = $this->subName;
			//上传文件
			$info = $Upload->uploadOne($f);
			if ($Upload->getError()) {
				$this->error = $Upload->getError();
				return false;
			}
			unset($f);
			$info_file[$i] = $info;
			unset($info);
			$i++;
		}
		$this->record($info_file);
		return count($info_file)==1?$info_file[0]:$info_file;
	}

	/**
	 * 加入附件列表
	 * @param $files 文件数组
	 * @return bool
	 */
	private function record($files){
		if(empty($files)) return false;

		foreach($files as $file) {
			if($this->attach['delete_source']==0) {
				$data['uptime']       = NOW_TIME;
				$data['userid']       = $this->uid;
				$data['path']         = $this->rootPath . $file['savepath'];
				$data['name']         = $file['savename'];
				$data['source_name']  = $file['name'];
				$data['suffix']       = $file['ext'];
				$data['size']         = $file['size'];
				$data['attach_class'] = $this->attach['enname'];
				$data['type']         = $this->attach['type'];
				$attach               = M("attachment");
				$id                   = $attach->add($data);
				unset($data);
			}
			//存缩略图
			if(!empty($file['thumb'])){
				foreach($file['thumb'] as $f)
				$id  = $attach->add($f);
			}
		}
		return true;
	}


	/** 处理图片 ---裁剪 加水印等
	 * @param $tmp_file
	 * @return mixed
	 */
	private function make_pic($tmp_file){
		$count =$this->getmaxdim($tmp_file);//判断数组维数
		if($count ==1) $file[] = $tmp_file;
		else $file = $tmp_file;
		$i=0;
		foreach($file as $f){
			$f['ext']= pathinfo($f['name'], PATHINFO_EXTENSION);//得到文件后缀
			if(false===$this->check($f)){return false;}
			//开始上传
			$Upload = new Upload();
			$Upload->rootPath = $this->rootPath;//设置根目录
			$Upload->subName = $this->subName;//设置目录存放格式
			$info = $Upload->uploadOne($f);//上传图片
			if($Upload->getError()){$this->error =$Upload->getError();return false; }
			$imgname = $this->rootPath.$info['savepath'].$info['savename'];//图片上传位置
			$img = new Image(Image::IMAGE_GD,$imgname);//打开图片
			//判断是否加水印
			if($this->attach['watermark']==1){
				$img->water($this->upconfig['watermark_file'],$this->upconfig['watermark_position'],50)->save($imgname);
			}
			//判断是否缩放、裁剪
			if($this->attach['is_thumb']==1){
				if(!empty($this->attach['pics_size'])) {
					$pic_size = $this->attach['pics_size'];//得到裁剪的大小 字段名==长*宽
					foreach($pic_size as $key=>$si){ //遍历裁剪大小
						$img->open($imgname); //打开图片
						//thumb() 为裁剪函数 此处应该再次进行判断
						$thumb = $img ->thumb($si['width'],$si['height'],$this->attach['thumb_type'])->save($this->rootPath.$info['savepath'].$key."_".$info['savename']);
						//存入缩略图信息
						$thumb_img['size'] =filesize($this->rootPath.$info['savepath'].$key."_".$info['savename']);
						$thumb_img['uptime'] = NOW_TIME;
						$thumb_img['userid'] = $this->uid;//上传附件的用户的id
						$thumb_img['path'] = $this->rootPath.$info['savepath'];
						$thumb_img['name'] = $key."_".$info['savename']; //图片名规则定为： 字段名 + "_"+上传的图片名
						$thumb_img['type'] = $this->attach['type']; //附件分类类型
						$thumb_img['source_name']  = $f['name'];
						$thumb_img['suffix']       = $f['ext'];
						$thumb_img['attach_class'] =$this->attach['enname'];//附件分类标识
						$temp_thumb[] = $thumb_img;
						unset($thumb_img);
					}
				}
			}
			//不保留原图操作
			if($this->attach['delete_source']==1){
				unlink($imgname);
			}
			unset($f);
			$info_img[$i] = $info;
			$info_img[$i]['thumb'] = $temp_thumb;
			unset($temp_thumb);
			unset($info);
			$i++;
		}
		return $info_img;

	}
	/**
	 * 获取错误代码信息
	 * @param string $errorNo  错误号
	 */
	private function error($errorNo) {
		switch ($errorNo) {
			case 1:
				$this->error = '上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值！';
			break;
			case 2:
				$this->error = '上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值！';
			break;
			case 3:
				$this->error = '文件只有部分被上传！';
			break;
			case 4:
				$this->error = '没有文件被上传！';
			break;
			case 6:
				$this->error = '找不到临时文件夹！';
			break;
			case 7:
				$this->error = '文件写入失败！';
			break;
			default:
				$this->error = '未知上传错误！';
		}
	}
	/**
	 * 检查上传的文件 是否符合在附件分类中设置的条件
	 * @param array $file 文件信息
	 */
	private function check($file) {
		/* 文件上传失败，捕获错误代码 */
		if ($file['error']) {
			$this->error($file['error']);
			return false;
		}
		/* 无效上传 */
		if (empty($file['name'])){
			$this->error = '未知上传错误！';
		}
		/* 检查是否合法上传 */
		if (!is_uploaded_file($file['tmp_name'])) {
			$this->error = '非法上传文件！';
			return false;
		}
		/* 检查文件大小 */
		if (!$this->checkSize($file['size'])) {
			$this->error = '上传文件大小在附件分类中不符！';
			return false;
		}

		/* 检查文件Mime类型 */
		if (!$this->checkMime($file['type'])) {
			$this->error = '上传文件MIME类型在附件分类中不允许！';
			return false;
		}
		/* 检查文件后缀 */
		if (!$this->checkExt($file['ext'])) {
			$this->error = '上传文件后缀在附件分类中不允许';
			return false;
		}
		/* 通过检测 */
		return true;
	}


	/**
	 * 检测大小是否符合附件分类中定义的
	 * @param int $size
	 * @return bool
	 */
	private function checkSize($size){
		$size = $size/1000;
		$maxSize = $this->attach['size']==-1 ? $this->upconfig['home_size']:$this->attach['size'];

		if(($size>$maxSize) && ($maxSize !=0))
			return false;
		else
			return true;

	}
	/**
	 * 检测mime是否符合附件分类中定义的
	 * @param int $mime
	 * @return bool
	 */
	private function checkMime($mime){
		return empty($this->attach['mimetype']) ? true : in_array(strtolower($mime), explode(",",$this->attach['mimetype']));
	}
	/**
	 * 检测ext（后缀）是否符合附件分类中定义的
	 * @param int $mime
	 * @return bool
	 */
	private function checkExt($ext){
		if($this->attach['suffix'] ==-1){
			$this->attach['suffix'] = $this->upconfig['home_type'];
		}
		return empty($this->attach['suffix']) ? true : in_array(strtolower($ext), explode(",",$this->attach['suffix']));
	}
	/**得到该附件分类的配置信息
	 * @param $name 分类标识
	 */
	private function get_attach_class($name){
		$attach = $this->attach_class->where("enname ='".$name."'")->find();

		if(empty($attach)) return false;
		if(!empty($attach['pics_size'])){
			$attach['pics_size'] = json_decode($attach['pics_size'],true);
		}
		return $attach;
	}


	/**
	 * @return mixed 返回错误
	 */
	public function get_error(){
		return $this->error;
	}

	/** 得到数组维数
	 * @param $arr
	 * @return int
	 */
	public function getmaxdim($arr){
		if(!is_array($arr)){
			return 0;
		}else{
			$dimension = 0;
			foreach($arr as $item1) {
				$t1=$this->getmaxdim($item1);
				if($t1>$dimension){$dimension = $t1;}
			}
			return $dimension+1;
		}
	}
	/**
	 * @return mixed  得到附件存放目录
	 */
	public function getRootPath(){
		return $this->rootPath;
	}
}