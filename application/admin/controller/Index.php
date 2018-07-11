<?php

namespace app\admin\controller;

use app\Common\Controller\AdminBaseController;

class Index extends AdminBaseController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        return $this->adminTpl();
    }

}
