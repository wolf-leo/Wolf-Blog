<?php

namespace app\admin\controller;

use app\Common\Controller\AdminBaseController;

class Category extends AdminBaseController {

	protected $mod;

	public function __construct() {
		parent::__construct();
		$this->mod = new \app\admin\model\categoryModel();
		$this->assign('notes', $this->mod->notes);
	}

	public function index() {
		$page = input('page', 1);
		$pageSize = 5; //每页显示的数量
		$where = [];
		if (input('id')) {
			$where[] = ['id', '=', input('id')];
		}
		$list = $this->mod->where($where)->order('id desc')->paginate($pageSize, false);
		$show = $list->render();
		$this->assign('list', $list);
		$this->assign('pages', $show);
		return $this->adminTpl();
	}

	public function edit() {
		$id = input('id');
		$info = $this->mod->find($id);
		$this->assign('info', $info);
		if (IS_POST) { //数据操作
			$data = input('post.');
			unset($data['id']);
			if ($id) { //更新数据
				$where['id'] = $id;
				$x = $this->mod->where($where)->update($data);
			} else { //添加数据
				$data['c_time'] = date('Y-m-d H:i:s');
				$x = $this->mod->insertGetId($data);
			}
			$x and $this->success('操作成功', CONTROLLER_NAME . '/index', NULL, 1) or $this->error('操作失败');
		} else {
			return $this->adminTpl();
		}
	}

}
