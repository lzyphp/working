<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/Public/Admin/css/info-mgt.css" />
<link rel="stylesheet" href="/Public/Admin/css/WdatePicker.css" />
<title>单位考勤管理系统</title>
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
                <th class="num"></th>
            	<th class="num">编号</th>
                <th class="name">部门名称</th>
                <th class="process">负责人</th>
                <th class="operate">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><tr>
                    <td class="num"><input type="checkbox" class="deptno" value="<?php echo ($vol["deptno"]); ?>"></td>
                	<td class="num"><?php echo ($vol["deptno"]); ?></td>
                    <td class="name"><?php echo ($vol["deptname"]); ?></td>
                    <td class="process"><?php echo ($vol["name"]); ?></td>
                    <td class="operate"><a href="/index.php/Admin/Dept/edit/deptno/<?php echo ($vol["deptno"]); ?>">编辑</a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>

</body>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript" src="/Public/Admin/js/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.pagination.js"></script>
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

$('.pagination').pagination(100,{
	callback: function(page){
		alert(page);	
	},
	display_msg: true,
	setPageNo: true
});

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

        window.location.href = '/index.php/Admin/Dept/del/deptno/'+id;
    });
});
</script>
</html>