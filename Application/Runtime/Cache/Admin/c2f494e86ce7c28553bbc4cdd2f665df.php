<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/Public/Admin/css/info-mgt.css" />
<link rel="stylesheet" href="/Public/Admin/css/WdatePicker.css" />
<title>单位考勤管理系统</title>
<style type='text/css'>
	table tr .id{ width:63px; text-align: center;}
	table tr .name{ width:90px; padding-left:17px;}
	table tr .dept_id{ width:63px; padding-left:13px;}
	table tr .hiredate{ width:120px; padding-left:13px;}
	table tr .grade{ width:80px; padding-left:13px;}
	table tr .operate{ padding-left:13px;}
</style>
</head>

<body>
<div class="title"><h2>信息管理</h2></div>
<div class="table-operate ue-clear">
	<a href="<?php echo U('add');?>" class="add">添加</a>
    <a href="javascript:;" class="del">删除</a>
</div>
<div class="table-box">
	<table>
    	<thead>
        	<tr>
        		<th class="id"></th>
            	<th class="id">编号</th>
                <th class="name">姓名</th>
                <th class="dept_id">部门编号</th>
				<th class="hiredate">入职时间</th>
                <th class="grade">等级</th>
                <th class="operate">操作</th>
            </tr>
        </thead>
        <tbody>
        	<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr>
	        		<td class="id"><input type="checkbox" class="empno" value="<?php echo ($vol["empno"]); ?>"></td>
	            	<td class="id"><?php echo ($vol["empno"]); ?></td>
	                <td class="name"><?php echo ($vol["ename"]); ?></td>
	                <td class="dept_id"><?php echo ($vol["deptno"]); ?></td>
					<td class="hiredate"><?php echo ($vol["hiredate"]); ?></td>
					<td class="grade"><?php echo ($vol["grade"]); ?></td>
	                <td class="operate"><a href="/index.php/Admin/Emp/edit/empno/<?php echo ($vol["empno"]); ?>">编辑</a></td>
	            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<div class="pagination ue-clear">
	<div class="pagin-list">
		<?php echo ($show); ?>
	</div>
</div>
</body>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript">
$(".select-title").on("click",function(){
	$(".select-list").hide();
	$(this).siblings($(".select-list")).show();
	return false;
})
$(".select-list").on("click","li",function(){
	var txt = $(this).text();
	$(this).parent($(".select-list")).siblings($(".select-title")).find("span").text(txt);
})

$("tbody").find("tr:odd").css("backgroundColor","#eff6fa");

showRemind('input[type=text], textarea','placeholder');

$(function(){
    //给删除按钮绑定点击事件
    $('.del').on('click',function(){
        //事件处理程序
        var idObj = $(':checkbox:checked');  //获取选中checkbox
        var id = '';

        for (var i = 0; i < idObj.length; i++) {
            id += idObj[i].value + ',';
        }
        //去掉最后的逗号
        id = id.substring(0,id.length-1);

        window.location.href = '/index.php/Admin/Emp/del/empno/'+id;
    });
});
</script>
</html>