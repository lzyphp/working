<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/Public/Admin/css/base.css" />
    <link rel="stylesheet" href="/Public/Admin/css/info-reg.css" />
    <title>系统管理</title>
    <style type="text/css" media="screen">
    	.main p{ padding-left:15px; padding-top:15px; padding-bottom: 42px; border-bottom:1px solid #c1d3de; border-top:none;}
    	.main p span{ float:left; width:80px; text-align:left; font-weight:bold; font-size:14px; font-family:'宋体'; color:#000000;}
	   	.main p label{ float:left; width:30px; text-align:left;}
	   	.main p input[type="text"]{ width:164px; height:32px;}

		.main p a{ float:left; margin-left: 35px; text-align:center; border:none; border-radius:2px; font-size:14px;}
		.main p a.confirm{ width:88px; height:33px; line-height:33px; background:#68b86c; color:#fff; }
    </style>
</head>

<body>
<div class="title"><h2>图表统计</h2></div>
	<form action="" method="post">
		<div class="main">
		    <p class="short-input ue-clear">
		    	<span>时间段：</span>
		        <label>从</label>
		        <input name="begintime" type="text" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" />
		        <label style="padding-left: 10px;">到</label>
		        <input name="endtime" type="text" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd'})" />
		        <label style="width: 120px; text-align:right;">员工号：</label>
		        <input name="empno" type="text"  placeholder="员工号" />
		        <a href="javascript:;" class="confirm" id='btnSubmit'>统计</a>
		    </p>
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