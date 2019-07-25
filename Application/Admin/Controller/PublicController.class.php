<?php
//命名空间声明
namespace Admin\Controller;
//引入父类控制器
use Think\Controller;
//声明类并且继承父类
class PublicController extends Controller{

	//登录页面展示
	public function login(){
		//展示模版
		$this -> display();
	}

	//captcha方法
	public function captcha(){
		//配置
		$cfg = array(
			    'bg' => array(93,202,27),
			    //'useImgBg'  =>  true,           // 使用背景图片 
				'fontSize'  =>  12,              // 验证码字体大小(px)
		        'useCurve'  =>  false,           // 是否画混淆曲线
		        'useNoise'  =>  false,           // 是否添加杂点	
		        'length'    =>  4,               // 验证码位数
		        'imageH'	=>	39,
		        'imageW'	=>	90,	
		        'fontttf'   =>  '4.ttf',          // 验证码字体，不设置随机获取
			);
		//实例化验证码类
		$verify = new \Think\Verify($cfg);
		//输出验证码
		$verify -> entry();
	}

	//checkLogin
	public function checkLogin(){
		//接收数据
		$post = I('post.');
		$post['u_password'] = md5($post['u_password']);
		//验证验证码（不需要传参）
		$verify = new \Think\Verify();
		//验证
		$result = $verify -> check($post['captcha']);
		//判断验证码是否正确
		if($result){
			//验证码正确，继续处理用户名和密码
			$model = M('user');
			//删除验证码元素
			unset($post['captcha']);
			//查询
			$data = $model -> where($post) -> find();
			//判断是否存在用户
			if($data){
				//存在用户，用户信息持久化保存到session中，跳转到后台首页
				session('id',$data['id']);
				session('u_username',$data['u_username']);
				//跳转
				$this -> redirect('Index/index');
			}else{
				//不存在
				$this -> error('用户名或密码错误');
			}
		}else{
			//验证码不正确
			$this -> error('您输入的验证码错误');
		}
	}

	//注册
	public function register(){
		if (IS_POST) {
		    $post = I('post.');
			$model = D('user');
			$data = $model -> create();

			//判断验证结果
			if (!$data) {
				$this -> error($model -> getError());
				exit;
			}
			if ($data['u_password'] != $post['repassword']) {
				$this -> error('两次密码不一致');exit;
			}

			$data['u_password'] = md5($data['u_password']);

			$result = $model -> add($data);
			if ($result) {
				$this->success('注册成功',U('login'),3);
			}else{
				$this->error('注册失败');
			}
		}else{
			$this -> display();
		}		
	}

	//退出方法
	public function logout(){
		//清除session
		session(null);
		//跳转到登录页面
		$this -> success('退出成功',U('login'),3);
	}

	//空方法
	public function _empty(){
		$this -> display('Empty/error');
	}
}