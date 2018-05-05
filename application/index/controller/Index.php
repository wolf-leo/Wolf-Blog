<?php

namespace app\index\controller;

use app\Common\Controller\BlogBaseController;

class Index extends BlogBaseController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $page = input('get.page', 1);
        $type = input('get.type', 0);
        if (isset($type) && !isNumber($type)) {
            return $this->jump404();
        }
        $pageSize = 20;
        $mod = new \app\admin\model\articleModel();
        $where['status'] = 1;
        $type and $where['type'] = $type;
        $list = $mod->getList($where, $page, $pageSize);
        if (empty($list)) {
            return $this->jump404();
        }
        $count = $mod->getCount($where);
        $pageparam = $mod->_pageparam();
        $Page = new \think\paginator\driver\Bootstrap($list, $pageSize, $page, $count, FALSE, $pageparam);
        $show = $Page->render();
        $this->assign('page', $show);
        $this->assign('list', $list);
        $this->assign('type', $type);
        return $this->blogTpl();
    }

}
