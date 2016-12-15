<?php
namespace Admin\Model;
use Think\Model;
use Org\Util\String;
class AttachmentModel extends Model{
	/**
	 * @param $length 随机字符串的长度
	 */
	public function getRandString($length =0){


		$str = String::buildFormatRand("$",$length);


		return implode("",$str);
	}

}