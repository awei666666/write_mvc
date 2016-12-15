<?php
namespace Admin\Model;
use Think\Model;
class AttachmentclassModel extends Model{
	protected $_validate  = array(
				array('name','require','分类名称必须填写！'),
				array('enname','require','分类标识必须填写！'),
				array('enname','','分类标识已经存在！',1,'unique',1),
				array('type','require','附件类型必须选择！'),
	);
	// checkEnname是否唯一方法
	public function checkEnname($enname='',$id){
		$attachment = M("Attachmentclass");
		if(!empty($enname))
			return $this->getByEnname($enname,$id);
    }

	protected function getByEnname($enname,$id){
		$attachment = M("Attachmentclass");
		if(empty($id)) {
			$total = $attachment->where("enname = $enname")->count();
		}else{
			$total = $attachment->where("enname = '".$enname."' and id <> $id")->count();
		}

		return (int)$total>0?false:true;

	}



}