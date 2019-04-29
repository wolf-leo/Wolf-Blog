<?php

namespace app\index\controller;

use app\Common\Controller\BlogBaseController;

class Index extends BlogBaseController {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$page = input('get.page/d', 1);
		$type = input('get.type/d', 0);
		$pageSize = 5; //每页显示5条数据 可自行修改
		$mod = new \app\admin\model\articleModel();
		$where[] = ['status', '=', 1];
		$paginate_query = [];
		if ($type) {
			$where[] = ['type', '=', $type];
			$map[] = ['type', '=', $type];
			$paginate_query = ['type' => $type]; // 分页url参数
		}
		$list = $mod->where($where)->paginate($pageSize, false, [
			'query' => $paginate_query
		]);
		if (empty($list)) {
			return $this->jump404();
		}
		$show = $list->render();
		//      顶部轮播图 start
		$map[] = ['status', '=', 1];
		$map[] = ['img', '<>', ''];
		$tops = $mod->where($map)->orderRaw('id desc')->limit(5)->column('id,title,img', 'id');
		//      顶部轮播图 end

		$this->assign('page', $show);
		$this->assign('list', $list);
		$this->assign('type', $type);
		$this->assign('tops', $tops);
		return $this->blogTpl();
	}

}
