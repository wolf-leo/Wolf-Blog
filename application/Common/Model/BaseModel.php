<?php

namespace app\Common\Model;

use think\Model;

class BaseModel extends Model {

	public function __construct($data = []) {
		parent::__construct($data);
	}

}
