<?php

namespace app\admin\model;

use app\Common\Model\CommonModel;

class articleModel extends CommonModel {

	// 设置当前模型对应的完整数据表名称
	protected $table = 'article';
	protected $pk = 'id'; //主键

	public function __construct($data = []) {
		parent::__construct($data);
	}

	public $notes = array(//数值注释
		'status' => array(1 => '正常', 2 => '禁用'),
	);

}
