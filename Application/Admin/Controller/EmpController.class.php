<?php
namespace Admin\Controller;
use Think\Controller;

class EmpController extends CommonController{

	public function showList(){

		$model = M('emp');
        //查询总的记录数
        $count = $model -> count();
        //实例化分页类：传递参数
        $page = new \Think\Page($count,5);  //每页显示5个
        //可选步骤，定义提示文字
		$page -> rollPage = 5;
		$page -> lastSuffix = false;
		$page -> setConfig('prev','上一页');
		$page -> setConfig('next','下一页');
		$page -> setConfig('last','末页');
		$page -> setConfig('first','首页');
        //使用show方法生成url
		$show = $page -> show();
		$data = $model -> limit($page -> firstRow,$page -> listRows) -> order('deptno,grade asc') -> select();

		$this -> assign('data',$data);
		$this -> assign('show',$show);
		$this -> display();
	}
    
    public function add(){
    	if (IS_POST) {
			$model = D('emp');
			$data = $model -> create();
			if (!$data) {
				$this -> error($model -> getError());
			    exit;
			}
    		$result = $model -> add();
    		if ($result) {
				$this->success('添加成功',U('showList'),3);
			}else{
				$this->error('添加失败');
			}    		
    	}else{
    		//查询部门信息
	    	$data = M('dept') -> field('deptno') -> select();
	        
	        $this -> assign('data',$data);
			$this -> display();
    	}
	}

	public function edit(){

		if (IS_POST) {			
			$post = I('post.');
			if ($post['ename'] == '' || $post['hiredate'] == '' || $post['grade'] == '') {
				$this->error('信息不能为空');exit;
			}
			$model = M('emp');
			$result = $model -> save($post);

			if ($result !== false) {
				$this->success('修改成功',U('showList'),3);
			}else{
				$this->error('修改失败');
			}

		}else{

			$empno = I('get.empno');
			$model = M('emp');
			$data = $model -> find($empno);
			$model = M('dept');
			$dat = $model -> field('deptno') ->select();

	        $this -> assign('data',$data);
	        $this -> assign('dat',$dat);
			$this -> display();
		}
	}

	public function del(){
		$empno = I('get.empno');
		$model = M('emp');
		$result = $model -> delete($empno);

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