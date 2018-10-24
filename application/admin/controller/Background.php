<?php

namespace app\admin\controller;

use app\Common\Controller\AdminBaseController;

class Background extends AdminBaseController {

    protected $mod;

    public function __construct() {
        parent::__construct();
        $this->mod = new \app\admin\model\backgroundModel();
        $this->assign('notes', $this->mod->notes);
    }

    public function index() {
        $page = input('page', 1);
        $pageSize = 5; //每页显示的数量
        $where = [];
        if (input('id')) {
            $where[] = ['id', '=', input('id')];
        }
        $list = $this->mod->getList($where, $page, $pageSize);
        $count = $this->mod->getCount($where);
        $pageparam = $this->mod->_pageparam();
        $Page = new \think\paginator\driver\Bootstrap($list, $pageSize, $page, $count, FALSE, $pageparam);
        $show = $Page->render();
        $this->assign('list', $list);
        $this->assign('pages', $show);
        return $this->adminTpl();
    }

    public function edit() {
        $id = input('id');
        $info = $this->mod->getOne($id);
        $this->assign('info', $info);
        if (IS_POST) { //数据操作
            $data = input('post.');
            unset($data['id']);
            $file = $file2 = '';
            if (!empty($_FILES['head_back_img']['tmp_name'])) {
                $file = request()->file('head_back_img'); //图片上传  
            }
            if (!empty($_FILES['main_back_img']['tmp_name'])) {
                $file2 = request()->file('main_back_img'); //图片上传
            }
            if ($file) {
                $file_path = \think\facade\Env::get('ROOT_PATH') . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'uploads';
                $img_path = DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;
                $img_info = $file->move($file_path);
                if ($img_info) {
                    $data['head_back_img'] = $img_path . $img_info->getSaveName();
                }
            }
            if ($file2) {
                $file_path2 = \think\facade\Env::get('ROOT_PATH') . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'uploads';
                $img_path2 = DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;
                $img_info2 = $file2->move($file_path2);
                if ($img_info2) {
                    $data['main_back_img'] = $img_path2 . $img_info2->getSaveName();
                }
            }
            if ($id) { //更新数据
                $where['id'] = $id;
                $x = $this->mod->Dosave($data, $where);
            } else { //添加数据
                $data['c_time'] = date('Y-m-d H:i:s');
                $x = $this->mod->Doadd($data);
            }
            $x and $this->success('操作成功', CONTROLLER_NAME . '/index', NULL, 1) or $this->error('操作失败');
        } else {
            return $this->adminTpl();
        }
    }

}
