<?php
namespace Admin\Model;
use Think\Model;

class DeptModel extends Model{
    // 自动验证定义
	protected $_validate        =   array(
		array('deptno','require','部门编号不能为空'),
		array('deptname','require','部门名称不能为空'),
		array('deptname','','部门已经存在',0,'unique'),
	); 
}