<?php
namespace Admin\Controller;
use Think\Controller;

class DeptController extends CommonController{

    //展示
	public function showList(){

		$model = M('dept');
		$data = $model -> order('deptno asc') -> select();

		$this -> assign('data',$data);
		$this -> display();
	}

    //添加
	public function add(){

		if (IS_POST) {
			//处理表单提交
			//$post = I('post.');
			
			$model = D('dept');
			$data = $model -> create();  //不传参数默认接收post数据
			//判断验证结果
			if (!$data) {
				$this -> error($model -> getError());
				exit;
			}
			//写入数据
			if ($data['name']=='') {
				$data['name'] = '无';
			}
			$result = $model -> add();

			if ($result) {
				$this->success('添加成功',U('showList'),3);
			}else{
				$this->error('添加失败');
			}
		}else{
			$this -> display();
		}
	}

    //编辑
	public function edit(){

		$deptno = I('get.deptno');
		$model = M('dept');
		$data = $model -> find($deptno);

		if (IS_POST) {			
			$post = I('post.');
			if ($post['deptname'] == '' || $post['name'] == '') {
				$this->error('信息不能为空');exit;
			}
			$res = $model -> where("deptname = '$post[deptname]'") -> select();
			
			if ($res && ($data['deptname'] != $post['deptname'])) {
				$this->error('部门名称已存在',U('showList'),3);
			}else{
				$result = $model -> save($post);
				if ($result !== false) {
					$this->success('修改成功',U('showList'),3);
				}else{
					$this->error('修改失败');
				}
			}

		}else{
	        $this -> assign('data',$data);
			$this -> display();
		}
	}

    //删除
	public function del(){
		$deptno = I('get.deptno');
		$model = M('dept');
		$result = $model -> delete($deptno);

		if ($result) {
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}

	//空方法
	public function _empty(){
		$this -> display('Empty/error');
	}
}