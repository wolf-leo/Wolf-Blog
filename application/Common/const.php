<?php

/*
 * 集成某些Thinkphp3.2 常用常量
 */

define('IS_POST', $this->request->isPost());
define('IS_AJAX', $this->request->isAjax());
define('IS_GET', $this->request->isGet());
define('CONTROLLER_NAME', $this->request->controller());
define('ACTION_NAME', $this->request->action());
define('MODULE_NAME', $this->request->module());
