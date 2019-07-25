<?php
namespace Admin\Controller;
use Think\Controller;

class SystemController extends CommonController{

	public function index(){
		if (IS_POST) {
			$model = M('time')->find();
			$update = $model;
			$model['starttime']=I('post.starttime');
			$model['offtime']=I('post.offtime');
			if($update){
				M('time')->where('starttime=\''.$update['starttime'].'\' and offtime=\''.$update['offtime'].'\'')->save($model);
				$this->success('修改成功',U('index'),3);
			}
			else{
				M('time')->add($model);
				$this->success('新增成功',U('index'),3);
			}
    	}else{
    		$model = M('time');
    		$data = $model -> find();

    		$this -> assign('data',$data);
    		$this -> display();
    	}
		
	}

	public function stat(){
		if (IS_POST) {
			$post = I('post.');
			if ($post['empno'] == '' || $post['begintime'] == '' || $post['endtime'] == '') {
				$this -> error('时间段或员工号不能为空');
			}
			$model1 = M('insign');
			$model2 = M('offsign');
			$model3 = M('emp');

			$data1 = $model1 -> field('status,count(*) as count') -> where('empno = \''.$post['empno'].'\' and signdate >= \''.$post['begintime'].'\' and signdate <= \''.$post['endtime'].'\'') -> group('status') -> select();
			$data2 = $model2 -> field('status,count(*) as count') -> where('empno=\''.$post['empno'].'\' and signdate >= \''.$post['begintime'].'\' and signdate <= \''.$post['endtime'].'\'') -> group('status') -> select();
			$data3 = $model3 -> where('empno = \''.$post['empno'].'\'') -> find();
			if (!$data3) {
				$this -> error('员工不存在');
			}
            
            //数组合并
			$data = array_merge($data1,$data2);  //键名为数字不会覆盖
            
            //合并二维数组相同项,数量则相加
			foreach($data as $k=>$v){
			    if(!isset($item[$v['status']])){
			        $item[$v['status']]=$v;
			    }else{
			        $item[$v['status']]['count'] += $v['count'];
			    } 
			}

            //拼接数据
            $str = '[';
            foreach ($item as $key => $value) {
            	$str .= "['" . $value['status'] . "'," . $value['count'] ."],";
            }

            $name = $data3['ename'];
            //去除最后的逗号
            $str = rtrim($str,',') . ']';            

            $this -> assign('str',$str);
            $this -> assign('post',$post);
            $this -> assign('name',$name);
			$this -> display('chart');
		}else{
			$this -> display();
		}		
	}

	//空方法
	public function _empty(){
		$this -> display('Empty/error');
	}

}