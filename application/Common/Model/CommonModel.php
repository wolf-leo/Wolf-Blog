<?php

namespace app\Common\Model;

class CommonModel extends BaseModel {

	public function __construct($data = []) {
		parent::__construct($data);
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

}
