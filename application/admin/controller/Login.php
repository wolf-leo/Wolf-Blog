<?php

namespace app\admin\controller;

use app\Common\Controller\AdminBaseController;

class Login extends AdminBaseController {

    public function __construct() {
        parent::__construct(FALSE);
    }

    public function index() {
        return $this->fetch();
    }

    public function login() {
        if (IS_POST) {
            $username = input('post.username');
            $password = input('post.password');
            if ($username != 'admin' || $password != 'admin') {
                $ret = ['code' => 0, 'msg' => '帐号或密码错误'];
                return json($ret);
            }
            session('admin_uid', 1);
            $ret = ['code' => 1, 'msg' => ''];
            return json($ret);
        }
    }

    public function out() {
        session('admin_uid', NULL);
        $url = url("login/index");
        $this->redirect($url);
    }

}
