<?php
namespace Admin\Model;
use Think\Model;

class UserModel extends Model{
    // 自动验证定义
	protected $_validate        =   array(
		array('u_username','require','用户名不能为空'),
		array('u_password','require','密码不能为空'),
		array('u_username','','用户名已经存在',0,'unique'),
	); 
}