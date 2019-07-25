<?php
namespace Admin\Model;
use Think\Model;

class EmpModel extends Model{
    // 自动验证定义
	protected $_validate        =   array(
		array('empno','number','员工编号必须是数字'),
		array('ename','require','员工姓名不能为空'),
		array('deptno','require','请选择部门编号'),
		array('hiredate','require','入职时间不能为空'),
		array('grade','require','等级不能为空'),
		array('grade','number','等级必须是数字'),
	); 
}