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
        $controller = CONTROLLER_NAME;
        $action = ACTION_NAME;
        $str = strtolower($controller . '/' . $action);
        foreach ($param as $key => $value) {
            if (strpos(strtolower($key), $str) !== FALSE) {
                unset($param[$key]);
            }
        }
        return ['query' => $param];
    }

}
