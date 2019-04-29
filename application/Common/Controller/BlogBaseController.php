<?php

namespace app\Common\Controller;

class BlogBaseController extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->blogHeadNav();
	}

//获取博客头部分类
	protected function blogHeadNav() {
		$category = new \app\admin\model\categoryModel();
		$background = new \app\admin\model\backgroundModel();
		$headernav = $category->where(['status' => 1])->order('sort asc')->column('title', 'id');
		$backimg = $background->find(1);
		$this->assign('headernav', $headernav);
		$this->assign('backimg', $backimg);
	}

	public function jump404() {
		//只有在app_debug=False时才会正常显示404页面，否则会有相应的错误警告提示
		abort(404, '页面异常');
	}

	public function blogTpl() {
		//直接引入头部和底部文件，在新建页面模版的时候省去重复引入的环节
		$contrroller = strtolower(CONTROLLER_NAME);
		$action = strtolower(ACTION_NAME);
		return $this->fetch('public:head') . $this->fetch($contrroller . '_' . $action) . $this->fetch('public:foot');
	}

	//空方法
	public function _empty() {
		return $this->jump404();
	}

}
