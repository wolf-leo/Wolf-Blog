<?php

namespace app\Common\Controller;

use think\Controller;

class BaseController extends Controller {

    public function __construct() {
        parent::__construct();
        include_once dirname(dirname(__FILE__)) . "/const.php";
        include_once dirname(dirname(__FILE__)) . "/define.php";
    }

}
