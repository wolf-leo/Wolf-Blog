<?php

namespace app\Common\Model;

class CommonModel extends BaseModel {

    public function __construct() {
        parent::__construct();
    }

    public function _parwhere($where = array()) {
        if (empty($where)) {
            return array();
        }
        $ping = '';
        foreach ($where as $key => $value) {
            if (is_array($value)) {
                $ping .= implode(',', $value);
            }
        }
        return $ping;
    }

    public function _pageparam() {
        $param = request()->param() ?: [];
        $controller = strtolower(CONTROLLER_NAME) == 'index' ? null : strtolower(CONTROLLER_NAME);
        $action = strtolower(ACTION_NAME) == 'index' ? null : strtolower(ACTION_NAME);
        $module = strtolower(MODULE_NAME) == 'index' ? null : '/' . strtolower(MODULE_NAME);
        if (isset(array_keys($param)[0])) {
            unset($param[array_keys($param)[0]]);
        }
        return ['query' => $param, 'path' => $module . '/' . $controller . '/' . $action];
    }

}
