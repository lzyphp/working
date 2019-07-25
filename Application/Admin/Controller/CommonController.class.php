<?php
namespace Admin\Controller;
use Think\Controller;

class CommonController extends Controller{

	public function _initialize(){
		$id = session('id');
		//判断用户是否登录
		if (empty($id)) {
			$url = U('Public/login');
			echo "<script>top.location.href='$url'</script>";
			exit;
		}
	}
}