<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/Public/Admin/css/base.css" />
<link rel="stylesheet" href="/Public/Admin/css/info-reg.css" />
<title>单位考勤管理系统</title>
</head>

<body>
<div class="title"><h2>上下班时间设置</h2></div>
<form action="" method="post">
<div class="main">
    <p class="short-input ue-clear">
        <label>上班时间：</label>
        <input name="starttime" type="text" value="<?php echo ($data["starttime"]); ?>" placeholder="上班时间" onfocus="WdatePicker({dateFmt:'HH:mm:ss'})" />
    </p>
    <p class="short-input ue-clear">
        <label>下班时间：</label>
        <input name="offtime" type="text" value="<?php echo ($data["offtime"]); ?>" placeholder="下班时间" onfocus="WdatePicker({dateFmt:'HH:mm:ss'})" />
    </p>
</div>
<div class="btn ue-clear">
    <a href="javascript:;" class="confirm" id='btnSubmit'>保存</a>
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