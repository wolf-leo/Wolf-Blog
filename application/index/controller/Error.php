<?php

namespace app\index\controller;

use app\Common\Controller\BlogBaseController;

class Error extends BlogBaseController {

    public function index() {
        return $this->jump404();
    }

    public function _empty() {
        return $this->jump404();
    }

}
