<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/Public/Admin/css/info-reg.css" />
<title>单位考勤管理系统</title>
<style type='text/css'>
	select {
		background: rgba(0, 0, 0, 0) url("/Public/Admin/images/inputbg.png") repeat-x scroll 0 0;
	    border: 1px solid #c5d6e0;
	    height: 28px;
	    outline: medium none;
	    padding: 0 8px;
	    width: 150px;
	}
	.main p input {
		float:none;
	}
</style>
</head>

<body>
<div class="title"><h2>信息修改</h2></div>
<form action="" method="post">
<div class="main">
    <p class="short-input ue-clear">
        <label>员工姓名：</label>
        <input name="ename" type="text" value="<?php echo ($data["ename"]); ?>" placeholder="员工姓名" />
        <input type="hidden" name="empno" value="<?php echo ($data["empno"]); ?>" />
    </p>
    <div class="short-input select ue-clear">
        <label>部门编号：</label>
        <select name="deptno">
            <?php if(is_array($dat)): $i = 0; $__LIST__ = $dat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vol["deptno"]); ?>" <?php if($vol["deptno"] == $data["deptno"] ): ?>selected="selected"<?php endif; ?>><?php echo ($vol["deptno"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
    </div>
    <p class="short-input ue-clear">
        <label>入职时间：</label>
        <input name="hiredate" type="text" value="<?php echo ($data["hiredate"]); ?>" placeholder="入职时间" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" />
    </p>
    <p class="short-input ue-clear">
        <label>等级：</label>
        <input name="grade" type="text" value="<?php echo ($data["grade"]); ?>" placeholder="等级" />
    </p>
</div>
<div class="btn ue-clear">
    <a href="javascript:;" class="confirm" id='btnSubmit'>确定</a>
    <a href="javascript:;" class="clear" id='btnReset'>重置</a>
</div>
</form>
</body>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript">
$(function(){
	$('#btnSubmit').on('click',function(){
		$('form').submit();
	});
	
	$('#btnReset').on('click',function(){
		$('form')[0].reset();
	});
});	

$(".select-title").on("click",function(){
	$(".select-list").toggle();
	return false;
});
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(".select-title").find("span").text(txt);
});

showRemind('input[type=text], textarea','placeholder');

</script>
</html>