<?php

namespace app\admin\model;

use app\Common\Model\CommonModel;

class articleModel extends CommonModel {

    // 设置当前模型对应的完整数据表名称
    protected $table = 'article';
    protected $pk = 'id'; //主键

    public function __construct() {
        parent::__construct();
    }

    public $notes = array(//数值注释
        'type' => array(1 => '生活记事', 2 => '技术折腾'),
        'status' => array(1 => '正常', 2 => '禁用'),
    );

    //查询
    public function getList($where = '', $page = 1, $pageSize = 20, $order = '') {
        if (!$order) {
            $order[$this->pk] = "DESC";
        }
        $list = DbModel($this->table)->where($where)->page($page)->limit($pageSize)->order($order)->select();
        return $list;
    }

    public function getCount($where = array()) {
        $count = DbModel($this->table)->where($where)->count();
        return $count;
    }

    public function getField($where = "", $field = "*", $order = '', $limit = '') {
        if (!$order) {
            $order[$this->pk] = "DESC";
        }
        $list = DbModel($this->table)->where($where)->order($order)->limit($limit)->column($field);
        return $list;
    }

//读取
    public function getOne($id = '', $where = '') {
        if ($where) {
            $info = DbModel($this->table)->where($where)->find();
        } else {
            $info = isset($id) ? DbModel($this->table)->find($id) : NULL;
        }
        return $info;
    }

//更新
    public function Dosave($data, $where) {
        $ret = DbModel($this->table)->where($where)->strict(false)->update($data);
        return $ret;
    }

//增加
    public function Doadd($data) {
        // 启动事务
        \think\Db::startTrans();
        try {
            $id = DbModel($this->table)->strict(false)->insertGetId($data);
            // 提交事务
            \think\Db::commit();
        } catch (\Exception $e) {
            // 回滚事务
            $id = FALSE;
            \think\Db::rollback();
        }
        return $id;
    }

//删
    public function Dodel($id, $where) {
        if ($id) {
            $where['id'] = $id;
        }
        if (empty($where)) {
            return FALSE;
        }
        // 启动事务
        \think\Db::startTrans();
        try {
            $x = DbModel($this->table)->where($where)->delete();
            // 提交事务
            \think\Db::commit();
        } catch (\Exception $e) {
            // 回滚事务
            $x = FALSE;
            \think\Db::rollback();
        }
        return $x;
    }

}
