<?php
/**
 * @author 孙美芳^life <344794095@qq.com>
 * @copyright 2016 - 2016 粮易网 <jztl2012@163.com>
 * @version $Id: 2016/9/18 0018 上午 11:46 ly2.0 AttachclassController.php 孙美芳^life $
 * 附件分类
 */
namespace Admin\Controller\Systemconfig;
use Think\Controller;
use Admin\Controller\Home\IndexController;
class AttachclassController extends IndexController {
	public function _initialize() {
		parent::_initialize(); // TODO: Change the autogenerated stub
		$this->perpage = 10;
		$this->type=array('image'=>'图片','file'=>'文件','video'=>'视频');
	}
	//附件分类列表
	public function index(){
		$attachment_class = M('Attachmentclass');
		if(IS_POST){
			if(!empty($_POST['option'])) {
				$option = I('option');
				if ($option == 'delall') {
					$ids = trim(I('str'));
					$con['id'] = array("in", $ids);
				}elseif($option == 'delone'){
					$con['id'] =I('str',int) ;
				}
				$con['is_system'] = array("neq",1);
				$data = $attachment_class->where($con)->delete();
				if ($data) {
					$this->ajaxReturn(array('status'=>1,'info'=>"删除成功"));
				} else {
					$this->ajaxReturn(array('status'=>0,'info'=>"删除失败"));
				}
			}
			exit;
		}
		$where = array();

		$count = $attachment_class->where($where)->count();
		$result = $attachment_class->where($where)->order('showorder asc')->page(I('get.p'), $this->perpage)->select();
		//分页
		$Page             = new \Think\Page($count, $this->perpage);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page->lastSuffix = false;
		$show = $Page->show();// 分页显示输出
		$this->assign('type',$this->type);
		$this->assign('list', $result);
		$this->assign('total', $count);
		$this->assign('page', $show);
		$this->assign('page_size', $this->perpage);
		$this->display();
	}
	//添加附件分类
	public function add_attachclass(){
		if(IS_POST){
			$attachment_class = D('Attachmentclass');
			$data = $this->check_data();
			$add = $attachment_class->add($data);
			if (true == $add) {
				$this->success('添加成功', U('index'));
			} else {
				$this->success('添加失败', U());
			}
			exit;
		}
		$this->assign('type',$this->type);
		$this->display();
	}

	//修改附件分类
	public function edit_attachclass(){
		$id = I('id',int);
		$attachment_class = D('Attachmentclass');
		$field= $attachment_class->where("id = $id")->find();

		if(IS_POST){
				$data = $this->check_data(true);
				$edits = $attachment_class->where("id = $id")->save($data);
				if (false !== $edits || 0 !==$edits) {
					$this->success('修改成功', U('index'));
				} else {
					$this->success('修改失败', U('',array('id'=>$id)));
				}

			unset($data);
			exit;
		}

		$this->assign('a','edit');
		$this->assign('id',$id);
		$this->assign('type',$this->type);
		$this->assign('field',$field);
		$this->display('add_attachclass');
	}
	/**
	 * 验证数据
	 * @param $is_edit 是否是编辑状态
	 */
	private function check_data($is_edit=false) {
		$attachment_class = D('Attachmentclass');
		$data = I();
		$data['is_system'] = I('is_system',int);
		if(!$attachment_class->create($data))
			$this->error($attachment_class->getError());
		if($is_edit) {
			$id           = I("id", int);
			$field        = $attachment_class->where("id = $id")->find();
			if ($field['is_system'] == 1) {
				$data['enname'] = $field['enname'];
				$data['type']   = $field['type'];
				$data['is_system']   = 1;
			} else {
				$data['enname']    = I('enname');
				$data['type']      = I('type');
				$data['is_system'] = I('is_system');
			}
			if (!$attachment_class->checkEnname($data['enname'], $id)) {
				$this->error("分类标识已存在2");
			}
		}
		return $data;
	}
}