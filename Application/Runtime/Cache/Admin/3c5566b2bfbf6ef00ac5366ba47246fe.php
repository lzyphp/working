<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/Public/Admin/css/base.css" />
	<link rel="stylesheet" href="/Public/Admin/css/login.css" />
	<title>单位考勤管理系统</title>
    <style type="text/css">
        .register{
            width: 160px;
            height: 25px;
            line-height: 25px;
            margin-left: 27px;
            margin-top: 5px;
            font-size: 14px;
        }
        a:hover{
            color: red;
        }
    </style>
</head>
<body>
	<div id="container">
        <form action="<?php echo U('checkLogin');?>" method="post">
    		<div id="bd">
    			<div class="login1">
                	<div class="login-top"><h1 class="logo"></h1></div>
                    <div class="login-input">
                    	<p class="user ue-clear">
                        	<label>用户名</label>
                            <input type="text" name="u_username" />
                        </p>
                        <p class="password ue-clear">
                        	<label>密&nbsp;&nbsp;&nbsp;码</label>
                            <input type="password" name="u_password" />
                        </p>
                        <p class="yzm ue-clear">
                        	<label>验证码</label>
                            <input type="text" name="captcha" maxlength="4" />
                            <cite><img src="/index.php/Admin/Public/captcha" onclick="this.src='/index.php/Admin/Public/captcha/t/'+Math.random()" /></cite>
                        </p>
                    </div>
                    <div class="login-btn ue-clear">                	
                        <a href="javascript:;" class="btn">登录</a>
                    </div>
                    <div class="register">还没有账号?&nbsp;<a href="<?php echo U('register');?>">点击注册</a></div>
                </div>
    		</div>
        </form>
	</div>
</body>
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript">
var height = $(window).height();
$("#container").height(height);
$("#bd").css("padding-top",height/2 - $("#bd").height()/2);

$(window).resize(function(){
	var height = $(window).height();
	$("#bd").css("padding-top",$(window).height()/2 - $("#bd").height()/2);
	$("#container").height(height);
	
});

$('#remember').focus(function(){
   $(this).blur();
});

$('#remember').click(function(e) {
	checkRemember($(this));
});

function checkRemember($this){
	if(!-[1,]){
		 if($this.prop("checked")){
			$this.parent().addClass('checked');
		}else{
			$this.parent().removeClass('checked');
		}
	}
}

//jQuery代码
$(function(){
    //给登录按钮绑定点击事件
    $('.btn').on('click',function(){
        //事件处理程序
        $('form').submit();
    });
});
</script>
</html>