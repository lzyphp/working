<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){

    	$this -> display();
    }

    public function insign(){
		$get = I('get.');
        if (empty($get['empno'])) {
        	//$this -> error('请输入员工号');
        	echo "<span style='color:red;'>请输入员工号</span>";
        	exit;
        }

		$model = M('emp');
		$data = $model -> where('empno = \''.$get['empno'].'\'') -> find();

		if ($data) {
			$model1 = M('insign');
			$model2 = M('time');
			$res2 = $model2 -> find();

			$get['signdate'] = date('Y-m-d',time());
			$get['signtime'] = date('H:i:s',time());
			$time1 = '00:05:00';
			$time2 = '00:00:00';
			$time = strtotime($time1) - strtotime($time2);
			$t = strtotime($get['signtime']) - strtotime($res2['starttime']);
            $res1 = $model1 -> where('empno = \''.$get['empno'].'\' and signdate = \''.$get['signdate'].'\'') -> find();

            if ($res1) {
            	//$this -> success('您今天已签到',U('index'),3);
            	echo "<span style='color:red;'>您今天已签到</span>";
            }else{
            	if ($t > 0) {
					if ($t >= $time) {
	                	$get['status'] = '旷工';
	                }else{
	                	$get['status'] = '迟到';
	                }
				}else{
	            	$get['status'] = '到勤';
	            }

				$result = $model1 -> add($get);
				if ($result) {
					//$this -> success('签到成功',U('index'),3);
					echo "<span style='color:green;'>签到成功</span>";
				}else{
					//$this -> error('签到失败');
					echo "<span style='color:red;'>签到失败</span>";
				}
            }			
		}else{
			//$this -> error('员工号不存在');
			echo "<span style='color:red;'>员工号不存在</span>";
		}
    }

    public function offsign(){
    	$get = I('get.');
        if (empty($get['empno'])) {
        	//$this -> error('请输入员工号');
        	echo "<span style='color:red;'>请输入员工号</span>";
        	exit;
        }

		$model = M('emp');
		$data = $model -> where('empno = \''.$get['empno'].'\'') -> find();

		if ($data) {
			$model1 = M('offsign');
			$model2 = M('time');
			$model3 = M('insign');
			$res2 = $model2 -> find();

			$get['signdate'] = date('Y-m-d',time());
			$get['signtime'] = date('H:i:s',time());
			$time1 = '00:05:00';
			$time2 = '00:00:00';
			$time = strtotime($time1) - strtotime($time2);
			$t = strtotime($res2['offtime']) - strtotime($get['signtime']);

			$res1 = $model1 -> where('empno = \''.$get['empno'].'\' and signdate = \''.$get['signdate'].'\'') -> find();
			$res3 = $model3 -> where('empno = \''.$get['empno'].'\' and signdate = \''.$get['signdate'].'\'') -> find();
			if ($res3) {
				if ($res1) {
	            	//$this -> success('您今天已签退',U('index'),3);
	            	echo "<span style='color:red;'>您今天已签退</span>";
	            }else{
					if ($t > 0) {
						if ($t >= $time) {
		                	$get['status'] = '旷工';
		                }else{
		                	$get['status'] = '早退';
		                }
					}else{
		            	$get['status'] = '到勤';
		            }
		            
					$result = $model1 -> add($get);
					if ($result) {
						//$this -> success('签退成功',U('index'),3);
						echo "<span style='color:green;'>签退成功</span>";
					}else{
						//$this -> error('签退失败');
						echo "<span style='color:red;'>签退失败</span>";
					}
				}
			}else{
				//$this -> error('请先签到');
				echo "<span style='color:red;'>今天还没签到</span>";
			}
		}else{
			//$this -> error('员工号不存在');
			echo "<span style='color:red;'>员工号不存在</span>";
		}
    }
}